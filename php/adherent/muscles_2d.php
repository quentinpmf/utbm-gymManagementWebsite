<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <?php
        include "../login/connectToBDD/conn.php";
        //include '../../includes/checkIfRole/checkIfAdherent.php'; //TODO QUENTIN
        include '../../includes/config.php';
    ?>

    <header id="header" id="home">
        <?php include '../../includes/banner.php'; ?>
        <?php include '../../includes/menu_distant.php'; ?>

        <style>
            b{
                color:white;
            }
        </style>
    </header>

    <body>
        <section class="section-gap-other-pages">
            <div class="title text-center">

                <h1 style="margin-top: 70px" class="mb-10">Modèle 2D</h1>

                <table style="color:white; border-collapse: separate; border-spacing: 5px;" align="center">
                    <tr>
                        <td width="30%" class="tg-us36" rowspan="3">
                            <img id="Image-Maps-Com-image-maps-2018-06-22-161714" src="http://www.image-maps.com/m/private/0/rqjgkcqm2fekib4shqc975i8k5_muscleman.jpg" border="0" width="312" height="329" orgWidth="312" orgHeight="329" usemap="#image-maps-2018-06-22-161714" alt="" />
                            <map name="image-maps-2018-06-22-161714" id="ImageMapsCom-image-maps-2018-06-22-161714">
                                <area shape="rect" coords="310,327,312,329" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
                                <area alt="Epaules" title="Epaules" href="muscles_2d.php?muscle_choisi=epaules" shape="poly" coords="224,106,207,92,193,96,193,105,209,124,220,136,229,143,232,129,232,116" style="outline:none;" target="_self"     />
                                <area alt="Pectoraux" title="Pectoraux" href="muscles_2d.php?muscle_choisi=pectoraux" shape="poly" coords="208,116,205,138,198,148,186,152,174,150,168,148,160,148,150,149,140,150,132,150,120,151,114,148,108,136,108,128,108,121,107,112,109,107,117,102,126,100,136,96,144,96,154,96,168,98,175,96,188,102,198,108" style="outline:none;" target="_self"     />
                                <area alt="Abdominaux" title="Abdominaux" href="muscles_2d.php?muscle_choisi=abdominaux" shape="poly" coords="132,152,132,172,133,188,134,206,134,220,137,236,141,251,144,263,152,269,167,270,171,259,180,224,179,152,161,148,152,148" style="outline:none;" target="_self"     />
                                <area alt="Trapèzes" title="Trapèzes" href="muscles_2d.php?muscle_choisi=trapezes" shape="poly" coords="173,76,196,94,173,97" style="outline:none;" target="_self"     />
                                <area alt="Trapèzes" title="Trapèzes" href="muscles_2d.php?muscle_choisi=trapezes" shape="poly" coords="140,80,140,96,120,95" style="outline:none;" target="_self"     />
                                <area alt="Biceps" title="Biceps" href="muscles_2d.php?muscle_choisi=biceps" shape="poly" coords="204,125,229,142,240,175,238,192,226,186,208,140" style="outline:none;" target="_self"     />
                                <area alt="Epaules" title="Epaules" href="muscles_2d.php?muscle_choisi=epaules" shape="poly" coords="128,100,108,95,90,103,84,125,84,142,108,132,105,113" style="outline:none;" target="_self"     />
                                <area alt="Biceps" title="Biceps" href="muscles_2d.php?muscle_choisi=biceps" shape="poly" coords="106,126,84,143,73,176,77,189,88,186,100,163,105,146" style="outline:none;" target="_self"     />
                                <area alt="Avant bras" title="Avant bras" href="muscles_2d.php?muscle_choisi=avant_bras" shape="poly" coords="242,177,236,192,220,187,230,217,244,232,260,255,276,248,258,202,250,189" style="outline:none;" target="_self"     />
                                <area alt="Avant bras" title="Avant bras" href="muscles_2d.php?muscle_choisi=avant_bras" shape="poly" coords="74,176,76,194,97,186,90,205,78,224,66,243,57,257,40,249,60,199,65,190" style="outline:none;" target="_self"     />
                                <area alt="Obliques" title="Obliques" href="muscles_2d.php?muscle_choisi=obliques" shape="poly" coords="202,232,196,195,205,169,205,156,188,153,184,175,185,210,184,241" style="outline:none;" target="_self"     />
                                <area alt="Obliques" title="Obliques" href="muscles_2d.php?muscle_choisi=obliques" shape="poly" coords="136,252,112,232,119,200,116,176,116,168,122,160,130,156,132,194,131,216" style="outline:none;" target="_self"     />
                                <area alt="Quadriceps" title="Quadriceps" href="muscles_2d.php?muscle_choisi=quadriceps" shape="poly" coords="215,328,170,328,167,301,175,268,189,246,202,269,213,287" style="outline:none;" target="_self"     />
                                <area alt="Quadriceps" title="Quadriceps" href="muscles_2d.php?muscle_choisi=quadriceps" shape="poly" coords="146,328,102,328,101,293,104,266,112,254,117,245,130,270,140,292,143,310" style="outline:none;" target="_self"     />
                            </map>
                        </td>
                        <td width="30%" class="tg-us36" rowspan="3">
                            <img id="Image-Maps-Com-image-maps-2018-06-22-162825" src="http://www.image-maps.com/m/private/0/rqjgkcqm2fekib4shqc975i8k5_muscleman_back.jpg" border="0" width="316" height="330" orgWidth="316" orgHeight="330" usemap="#image-maps-2018-06-22-162825" alt="" />
                            <map name="image-maps-2018-06-22-162825" id="ImageMapsCom-image-maps-2018-06-22-162825">
                                <area shape="rect" coords="314,328,316,330" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
                                <area alt="Fessier" title="Fessier" href="muscles_2d.php?muscle_choisi=fessier" shape="poly" coords="109,227,135,225,156,241,156,252,163,243,176,230,189,226,200,231,204,253,208,274,205,290,194,303,167,307,157,296,156,286,152,297,141,302,124,302,111,300,97,287,104,267,107,252,108,236" style="outline:none;" target="_self"     />
                                <area alt="Triceps" title="Triceps" href="muscles_2d.php?muscle_choisi=triceps" shape="poly" coords="212,121,237,142,244,168,252,188,240,198,232,202,227,198,220,179,215,165,208,152,211,136" style="outline:none;" target="_self"     />
                                <area alt="Triceps" title="Triceps" href="muscles_2d.php?muscle_choisi=triceps" shape="poly" coords="100,120,105,152,98,164,91,187,86,196,77,187,66,181,65,174,69,160,74,148,78,134,87,128,92,125" style="outline:none;" target="_self"     />
                                <area alt="Trapèzes" title="Trapèzes" href="muscles_2d.php?muscle_choisi=trapezes" shape="poly" coords="172,55,174,68,187,78,201,84,215,89,203,94,184,93,173,95,166,91,166,78,168,64" style="outline:none;" target="_self"     />
                                <area alt="Trapèzes" title="Trapèzes" href="muscles_2d.php?muscle_choisi=trapezes" shape="poly" coords="152,51,149,70,144,81,144,90,127,90,112,87,104,88,117,84,131,78,136,75,137,62,140,60,143,58" style="outline:none;" target="_self"     />
                                <area alt="Epaules" title="Epaules" href="muscles_2d.php?muscle_choisi=epaules" shape="poly" coords="98,90,112,92,124,92,109,102,101,108,99,118,93,127,82,132,76,132,78,117,80,108,87,100,93,94" style="outline:none;" target="_self"     />
                                <area alt="Epaules" title="Epaules" href="muscles_2d.php?muscle_choisi=epaules" shape="poly" coords="216,92,229,100,237,118,234,133,222,128,217,123,213,111,206,104,190,95,194,92,204,93" style="outline:none;" target="_self"     />
                                <area alt="Grand dorsal" title="Grand dorsal" href="muscles_2d.php?muscle_choisi=grand_dorsal" shape="poly" coords="177,131,211,136,207,157,201,183,198,197,188,212,184,221,175,200,174,179,167,178,161,168,164,155" style="outline:none;" target="_self"     />
                                <area alt="Grand dorsal" title="Grand dorsal" href="muscles_2d.php?muscle_choisi=grand_dorsal" shape="poly" coords="102,134,132,134,155,171,142,190,137,207,136,218,131,221,120,206,116,193,113,172,109,155,106,148" style="outline:none;" target="_self"     />
                                <area alt="Lombaires" title="Lombaires" href="muscles_2d.php?muscle_choisi=lombaires" shape="poly" coords="157,173,173,195,178,216,176,228,164,238,152,234,140,230,132,224,134,208,141,192,150,187" style="outline:none;" target="_self"     />
                                <area alt="Ischios" title="Ischios" href="muscles_2d.php?muscle_choisi=ischios" shape="poly" coords="211,328,164,328,160,313,162,301,185,306,194,306,204,310,213,308" style="outline:none;" target="_self"     />
                                <area alt="Ischios" title="Ischios" href="muscles_2d.php?muscle_choisi=ischios" shape="poly" coords="97,328,147,328,152,311,152,303,140,305,124,307,109,305,101,316,96,319" style="outline:none;" target="_self"     />
                                <area alt="Trapèzes" title="Trapèzes" href="muscles_2d.php?muscle_choisi=trapezes" shape="poly" coords="130,94,192,93,182,121,175,142,166,152,156,157,147,156,139,144,132,122,129,100,124,96,124,92" style="outline:none;" target="_self"     />
                                <area alt="Avant bras" title="Avant bras" href="muscles_2d.php?muscle_choisi=avant_bras" shape="poly" coords="228,200,257,188,262,220,268,238,266,251,257,248,247,237,242,227" style="outline:none;" target="_self"     />
                                <area alt="Avant bras" title="Avant bras" href="muscles_2d.php?muscle_choisi=avant_bras" shape="poly" coords="60,182,84,196,73,216,64,232,56,244,47,240,41,237,41,224,50,199,63,188" style="outline:none;" target="_self"     />
                            </map>
                        </td>
                        <td width="40%" height="10%" style="background-color:#B93640" class="tg-us36">
                            <b>
                                <?php if($_GET)
                                     {
                                         if(isset($_GET['muscle_choisi']) && !empty($_GET['muscle_choisi']))
                                         {
                                             switch($_GET['muscle_choisi'])
                                             {
                                                 case 'epaules':
                                                     echo("Epaules");
                                                     break;
                                                 case 'pectoraux':
                                                     echo("Pectoraux");
                                                     break;
                                                 case 'abdominaux':
                                                     echo("Abdominaux");
                                                     break;
                                                 case 'trapezes':
                                                     echo("Trapèzes");
                                                     break;
                                                 case 'biceps':
                                                     echo("Biceps");
                                                     break;
                                                 case 'avant_bras':
                                                     echo("Avant bras");
                                                     break;
                                                 case 'obliques':
                                                     echo("Obliques");
                                                     break;
                                                 case 'quadriceps':
                                                     echo("Quadriceps");
                                                     break;
                                                 case 'fessier':
                                                     echo("Fessier");
                                                     break;
                                                 case 'grand_dorsal':
                                                     echo("Grand dorsal");
                                                     break;
                                                 case 'petit_rond':
                                                     echo("Petit rond");
                                                     break;
                                                 case 'triceps':
                                                     echo("Triceps");
                                                     break;
                                                 case 'lombaires':
                                                     echo("Lombaires");
                                                     break;
                                                 case 'ischios':
                                                     echo("Ischios");
                                                     break;
                                             }
                                         }
                                     }
                                     else
                                     {
                                         echo('Ø');
                                     }
                                ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#A8A8A8" height="30%" class="tg-yw4l">
                            <?php
                                if($_GET)
                                {
                                    switch($_GET['muscle_choisi'])
                                    {
                                        case 'epaules':
                                            echo("Les muscles des épaules (deltoïdes) sont constitués de 3 portions principales : le faisceau latéral des épaules, qui donne la carrure, la portion antérieure (souvent en avance), et la portion postérieure (souvent en retard).");
                                            break;
                                        case 'pectoraux':
                                            echo("Les pectoraux sont un groupe musculaire de la poitrine comprenant 2 muscles : le petit et le grand pectoral. Il s'agit des muscles les plus symboliques des pratiquants de la musculation. Pas de physique équilibré sans des pectoraux saillants");
                                            break;
                                        case 'abdominaux':
                                            echo("Les abdominaux sont composés de plusieurs muscles, qui permettent de protéger les viscères, de contrôler la pression intra-abdominale, de tenir debout, de faciliter la respiration, de servir de relais entre le haut et le bas du corps et de permettre de faire des mouvements du tronc.");
                                            break;
                                        case 'trapezes':
                                            echo("Les trapèzes permettent de hausser les épaules, ou de ramener les omoplates en arrière. Les développer permet d'obtenir un aspect massif et puissant du haut du corps, et certaines formes de travail peuvent aussi améliorer la force dans le haut du corps.");
                                            break;
                                        case 'biceps':
                                            echo("Les biceps sont un groupe musculaire composé de 4 muscles : la courte et la longue portion du biceps, le brachial antérieur et le coraco-brachial. Certains permettent la rotation et la flexion du bras, alors que d'autres ne permettent que la flexion.");
                                            break;
                                        case 'avant_bras':
                                            echo("Les avant-bras sont composés d'une myriade de muscle, on distinguera principalement les fléchisseurs de la main qui se situent en dessous, et les extenseurs de la main au dessus. Le brachio-radial (aussi appelé long supinateur) quant à lui est essentiel pour mettre en valeur la masse du biceps comme de l'avant-bras et se place entre le milieu de l'avant-bras et la base du biceps.");
                                            break;
                                        case 'triceps':
                                            echo("Le muscle triceps brachial est divisé en trois faisceaux, comme son nom l'indique : la longue portion, le vaste interne, et le vaste externe, qui est la portion la plus visible sur le bras, donc celle à développer en priorité.");
                                            break;
                                        case 'obliques':
                                            echo("Les muscles de la sangle abdominale qui sont synonymes de la taille fine, de l'absence des poignées d'amour, les obliques sont responsables de la stabilité du buste.");
                                            break;
                                        case 'quadriceps':
                                            echo("Dans cette page, un rappel sur l'anatomie des quadriceps mais aussi un point sur la morphologie et le squat, car tout le monde n'a pas le physique permettant de faire du squat sans danger.");
                                            break;
                                        case 'fessier':
                                            echo("Le groupe musculaire des fessiers est composé de 3 muscles distincts, placés les uns au dessus des autres. Ces muscles sont principalement utilisés dès que les ischios sont sollicités, et que le corps a besoin de plus de force et de plus de puissance.");
                                            break;
                                        case 'grand_dorsal':
                                            echo("Le grand dorsal se compose de nombreux muscles, mais tous ne sont pas apparents. Ce groupe musculaire des dorsaux a pour rôle de baisser les bras, de relever les épaules, et plus globalement de stabiliser tous les mouvements du buste");
                                            break;
                                        case 'lombaires':
                                            echo("Les lombaires un rôle essentiel dans la bonne santé du dos, car ils participent au gainage et donc soutiennent la colonne vertébrale lors des exercices de musculation mettant une pression sur vos disques … c'est-à-dire globalement tous les exercices de base, donc tous les exercices les plus efficaces pour prendre de la masse musculaire.");
                                            break;
                                        case 'ischios':
                                            echo("Les ischio-jambiers sont composés de plusieurs muscles. Ce groupe est souvent un point faible, car peu de sportifs les entrainent suffisamment. Voici des conseils pour muscler vos ischios correctement.");
                                            break;
                                    }
                                }
                                else
                                {
                                    echo('Ø');
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#3B5FAB" height="60%" class="tg-yw4l">

                            <?php
                                if($_GET)
                                {
                                    switch($_GET['muscle_choisi'])
                                    {
                                    case 'epaules':
                                    ?>
                                        <table border="2">
                                            <tr style='width:100% ;height:100%'>
                                                <td width="33%"><img width="100%" src="../../img/exercices/epaules/1.jpg"</td>
                                                <td width="33%"><img width="100%" src="../../img/exercices/epaules/2.jpg"</td>
                                                <td width="33%"><img width="100%" src="../../img/exercices/epaules/3.jpg"</td>
                                            </tr>
                                            <tr>
                                                <td>Développé militaire debout barre</td>
                                                <td>Rowing vertical barre</td>
                                                <td>Elévations latérales avec haltères</td>
                                            </tr>
                                        </table>
                                    <?php
                                        break;
                                        case 'pectoraux':
                                    ?>
                                    <table border="2">
                                        <tr style='width:100% ;height:100%'>
                                            <td width="33%"><img width="100%" src="../../img/exercices/pectoraux/1.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/pectoraux/2.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/pectoraux/3.jpg"</td>
                                        </tr>
                                        <tr>
                                            <td>Développé couché</td>
                                            <td>Développé incliné avec haltères</td>
                                            <td>Dips</td>
                                        </tr>
                                    </table>
                                    <?php
                                            break;
                                        case 'obliques':
                                            echo("En cours de rédaction");
                                            break;
                                        case 'abdominaux':
                                    ?>
                                    <table border="2">
                                        <tr style='width:100% ;height:100%'>
                                            <td width="33%"><img width="100%" src="../../img/exercices/abdominaux/1.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/abdominaux/2.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/abdominaux/3.jpg"</td>
                                        </tr>
                                        <tr>
                                            <td>Crunchs pieds au sol</td>
                                            <td>Relevé de jambes à l'espalier</td>
                                            <td>Dragon Flag</td>
                                        </tr>
                                    </table>
                                    <?php
                                            break;
                                        case 'trapezes':
                                    ?>
                                    <table border="2">
                                        <tr style='width:100% ;height:100%'>
                                            <td width="33%"><img width="100%" src="../../img/exercices/trapezes/1.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/trapezes/2.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/trapezes/3.jpg"</td>
                                        </tr>
                                        <tr>
                                            <td>Shrug devant barre</td>
                                            <td>Tirage menton prise sérée barre</td>
                                            <td>Shrug derriere barre droite</td>
                                        </tr>
                                    </table>
                                    <?php
                                            break;
                                        case 'biceps':
                                    ?>
                                    <table border="2">
                                        <tr style='width:100% ;height:100%'>
                                            <td width="33%"><img width="100%" src="../../img/exercices/biceps/1.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/biceps/2.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/biceps/3.jpg"</td>
                                        </tr>
                                        <tr>
                                            <td>Curl barre supination</td>
                                            <td>Curl en rotation</td>
                                            <td>Curl incliné avec haltères en supination</td>
                                        </tr>
                                    </table>
                                    <?php
                                            break;
                                        case 'avant_bras':
                                    ?>
                                    <table border="2">
                                        <tr style='width:100% ;height:100%'>
                                            <td width="33%"><img width="100%" src="../../img/exercices/avant_bras/1.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/avant_bras/2.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/avant_bras/3.jpg"</td>
                                        </tr>
                                        <tr>
                                            <td>Curl barre pronation</td>
                                            <td>Extensions poignets barre sur banc plat</td>
                                            <td>Curl barre pronation à la poulie basse</td></td>
                                        </tr>
                                    </table>
                                    <?php
                                            break;
                                        case 'quadriceps':
                                    ?>
                                    <table border="2">
                                        <tr style='width:100% ;height:100%'>
                                            <td width="33%"><img width="100%" src="../../img/exercices/quadriceps/1.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/quadriceps/2.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/quadriceps/3.jpg"</td>
                                        </tr>
                                        <tr>
                                            <td>Squat barre</td>
                                            <td>Presse à cuisses</td>
                                            <td>Leg extension</td></td>
                                        </tr>
                                    </table>
                                    <?php
                                            break;
                                        case 'fessier':
                                    ?>
                                    <table border="2">
                                        <tr style='width:100% ;height:100%'>
                                            <td width="33%"><img width="100%" src="../../img/exercices/fessier/1.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/fessier/2.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/fessier/3.jpg"</td>
                                        </tr>
                                        <tr>
                                            <td>Fentes avant à la barre</td>
                                            <td>Relevé de bassin au sol</td>
                                            <td>Abducteurs à la machine</td>
                                        </tr>
                                    </table>
                                    <?php
                                            break;
                                        case 'grand_dorsal':
                                    ?>
                                    <table border="2">
                                        <tr style='width:100% ;height:100%'>
                                            <td width="33%"><img width="100%" src="../../img/exercices/dos/1.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/dos/2.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/dos/3.jpg"</td>
                                        </tr>
                                        <tr>
                                            <td>Rowing horizontal barre droite supination</td>
                                            <td>Soulevé de terre</td>
                                            <td>Tirage horizontal supination</td></td>
                                        </tr>
                                    </table>
                                    <?php
                                            break;
                                        case 'triceps':
                                    ?>
                                    <table border="2">
                                        <tr style='width:100% ;height:100%'>
                                            <td width="33%"><img width="100%" src="../../img/exercices/triceps/1.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/triceps/2.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/triceps/3.jpg"</td>
                                        </tr>
                                        <tr>
                                            <td>Barre front avec triceps bomber</td>
                                            <td>Barre front avec barre EZ</td>
                                            <td>Extension triceps poulie haute pronation</td>
                                        </tr>
                                    </table>
                                    <?php
                                            break;
                                        case 'lombaires':
                                            ?>
                                            <table border="2">
                                                <tr style='width:100% ;height:100%'>
                                                    <td width="33%"><img width="100%" src="../../img/exercices/lombaires/1.jpg"</td>
                                                    <td width="33%"><img width="100%" src="../../img/exercices/lombaires/2.jpg"</td>
                                                    <td width="33%"><img width="100%" src="../../img/exercices/lombaires/3.jpg"</td>
                                                </tr>
                                                <tr>
                                                    <td>Extensions à la chaise avec enroulement</td>
                                                    <td>Extensions lombaires au tirage horizontal</td>
                                                    <td>Good morning bras tendus</td>
                                                </tr>
                                            </table>
                                            <?php
                                            break;
                                        case 'ischios':
                                    ?>
                                    <table border="2">
                                        <tr style='width:100% ;height:100%'>
                                            <td width="33%"><img width="100%" src="../../img/exercices/ischios/1.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/ischios/2.jpg"</td>
                                            <td width="33%"><img width="100%" src="../../img/exercices/ischios/3.jpg"</td>
                                        </tr>
                                        <tr>
                                            <td>Soulevé de terre jambes tendues</td>
                                            <td>Leg curl</td>
                                            <td>Good morning barre</td>
                                        </tr>
                                    </table>
                                    <?php
                                            break;
                                        }
                                }
                                else
                                {
                                    echo('Ø');
                                }
                            ?>
                        </td>
                    </tr>
                </table>

            </div>
        </section>
    </body>

</html>



