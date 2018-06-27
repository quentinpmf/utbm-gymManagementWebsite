<?php
header( 'content-type: text/html; charset=utf-8' );
$connexion = mysqli_connect('localhost', 'root', 'root');
$db = mysqli_select_db($connexion, 'projetta70');

$nb_visites = file_get_contents('data/pagesvues.txt');
$nb_visites++;
file_put_contents('data/pagesvues.txt', $nb_visites);
echo 'Nombre de pages vues : <strong>' . $nb_visites . '</strong><br/>';

//Nombre de visites par jour
//ETAPE 1 - Affichage du nombre de visites d'aujourd'hui
$url = $_SERVER['REQUEST_URI'];
if(preg_match("%projetTA70\/(.+)?$%",$url,$matches)) $end=$matches[1];

$retour_count = mysqli_query($connexion, "SELECT COUNT(*) AS nbre_entrees FROM visites_jour WHERE date=CURRENT_DATE() AND id_page='$end'");//On compte le nombre d'entrées pour aujourd'hui
$donnees_count = mysqli_fetch_assoc($retour_count);
echo 'Pages vues aujourd\'hui : <strong>';


if ($donnees_count['nbre_entrees'] == 0) //Si la date d'aujourd'hui n'a pas encore été enregistrée (première visite de la journée)
{
    mysqli_query($connexion, "INSERT INTO visites_jour(visites, date, id_page) VALUES (1, CURRENT_DATE(), '$end');"); //On rentre la date d'aujourd'hui et on marque 1 comme nombre de visites.
    echo '1'; //On affiche une visite car c'est la première visite de la journée
} else { //Si la date a déjà été enregistrée
    $retour = mysqli_query($connexion, "SELECT visites FROM visites_jour WHERE date=CURRENT_DATE() AND id_page='$end'"); //On sélectionne l'entrée qui correspond à notre date
    $donnees = mysqli_fetch_assoc($retour);
    $visites = $donnees['visites'] + 1;
    mysqli_query($connexion, "UPDATE visites_jour SET visites = visites + 1 WHERE date=CURRENT_DATE() AND id_page='$end'"); //Update dans la base de données
    echo $visites;
}

echo '</strong></br/>';

//ETAPE 2 - Record des connectés par jour

$retour_max = mysqli_query($connexion, 'SELECT visites, date FROM visites_jour ORDER BY visites DESC LIMIT 0, 1'); //On sélectionne l'entrée qui a le nombre visite le plus important
$donnees_max = mysqli_fetch_assoc($retour_max);
echo 'Record : <strong>' . $donnees_max['visites'] . '</strong> établi le <strong>' . $donnees_max['date'] . '</strong><br/>'; //On l'affiche ainsi que la date à laquelle le record a été établi

//ETAPE 3 - Moyenne du nombre de visites par jour

$total_visites = 0; //Nombre de visites
/*(pour éviter les bugs on ne prendra pas le nombre du premier exercice,
mais celui-ci reste utile pour être affiché sur toutes les pages car il est plus rapide,
contrairement à $total_visites dont on ne se servira que pour la page de stats)*/

$total_jours = 0;//Nombre de jours enregistrés dans la base

$total_visites = mysqli_fetch_assoc(mysqli_query($connexion, 'SELECT SUM(visites) FROM visites_jour AS total_visites'));
$total_visites = $total_visites['SUM(visites)'];

$total_jours = mysqli_fetch_assoc(mysqli_query($connexion, 'SELECT COUNT(*) FROM visites_jour AS total_jours'));
$total_jours = $total_jours['COUNT(*)'];

$moyenne = $total_visites / $total_jours; //on fait la moyenne
echo 'Moyenne : <strong>' . round($moyenne) . '</strong> visiteurs par jour<br/>';