<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
    <?php include 'includes/config.php';
    include "php/login/connectToBDD/conn.php";?>
</head>

    <body>
<header id="header" id="home">
        <?php session_start(); ?>
        <?php include 'includes/banner.php'; ?>
        <?php include 'includes/menu.php'; ?>
        <?php include 'includes/calendar/calendar.php';?>
</header>

        <!-- start banner Area -->
        <section class="banner-area relative" id="home">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row fullscreen d-flex align-items-center justify-content-start">
                    <div class="banner-content col-lg-12 col-md-12">
                        <h1 class="text-uppercase">
                            Fitness Club
                        </h1>
                        <p class="text-white text-uppercase pt-140 pb-170">
                            Rejoignez-nous : <br><br>
                            Du Lundi au Samedi de 06h à 20h
                            <br>
                            Le Dimanche de 08h à 12h
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner Area -->

        <!-- Start feature Area ACTUALITES -->
        <section class="feature-area" id="actus">
            <div class="container-fluid">

                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-20 col-lg-9">
                        <div class="title text-center">
                            <h1 style="color:white" class="mb-10">Les dernières actualités</h1>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center">
                    <?php
                    $req = $bdd->query("SELECT date_creation,titre,image,description,id FROM actualites WHERE publie = 1 ORDER BY date_creation desc LIMIT 3");
                    while($data = $req->fetch())
                    {
                        echo '<div class="col-lg-2">';
                            echo '<a href="php/accueil/actualites_affichage.php?id=' . $data['id'] . '">';
                                echo '<img class="cubeActuAccueil img-fluid" src = "img/actualites/' . $data['image'] .'" alt = "">';
                            echo '</a>';
                        echo '</div >';
                        echo '<div class="col-lg-2 imgActualites" >';
                            echo '<a href="php/accueil/actualites_affichage.php?id=' . $data['id'] . '">';
                                echo '<div class="dateActualites" >' . substr($data['date_creation'],0,10) . '</div >';
                                echo '<h1>' . utf8_encode($data['titre']) . '</h1 >';

                                if(strlen($data['description']) > 100)
                                {
                                    $suite = "...";
                                }
                                else
                                {
                                    $suite = "";
                                }

                                echo '<div class="texteActualites" style="color: white;" >' . utf8_encode(substr($data['description'], 0, 100)) . $suite . '</div >';
                            echo '</a>';
                        echo '</div >';
                    }
                    ?>
                    <a href="php/accueil/actualites_liste.php"><button style="margin-top : 40px; background-color:#3B5FAB;color:#FFFFFF;padding:10px 0 10px 0;font:Bold 13px Arial;width:150px;border-radius:2px;border:none" value="toutes_les_actus">Toutes les actus</button></a>
                </div>
            </div>
        </section>
        <!-- End feature Area ACTUALITES -->

        <!-- Start top-course Area -->
        <section class="team-area section-gap" id="cours">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-20 col-lg-9">
                        <div class="title text-center">
                            <h1 class="mb-10">Nos cours ouverts aux adhérents</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-course">
                            <div class="thumb">
                                <img class="img-fluid" src="img/c1.jpg" alt="">
                            </div>
                            <span class="course-status">Course</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-course">
                            <div class="thumb">
                                <img class="img-fluid" src="img/c2.jpg" alt="">
                            </div>
                            <span class="course-status">CrossFit</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-course">
                            <div class="thumb">
                                <img class="img-fluid" src="img/c3.jpg" alt="">
                            </div>
                            <span class="course-status">Remise en forme</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-course">
                            <div class="thumb">
                                <img class="img-fluid" src="img/c4.jpg" alt="">
                            </div>
                            <span class="course-status">Yoga</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-course">
                            <div class="thumb">
                                <img class="img-fluid" src="img/c5.jpg" alt="">
                            </div>
                            <span class="course-status">Force</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End top-course Area -->

        <!-- Start schedule Area -->
        <section class="schedule-area section-gap border-black" id="schedule">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="text-black mb-10">Calendrier de la semaine</h1>
                    </div>
                </div>
            </div>
            <div id="calendar" style="padding-left:300px;padding-right:300px;">
            </div>
        </section>
        <!-- End schedule Area -->

        <!-- Start team Area -->
        <section class="team-area section-gap border-black" id="coachs">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-20 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">Nos coachs</h1>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center d-flex align-items-center">
                    <div class="col-md-3 single-team">
                        <div class="thumb">
                            <img class="img-fluid" src="img/t1.jpg" alt="">
                            <div class="align-items-center justify-content-center d-flex">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="meta-text mt-30 text-center">
                            <h4>Ethel Davis</h4>
                            <p>Course</p>
                        </div>
                    </div>
                    <div class="col-md-3 single-team">
                        <div class="thumb">
                            <img class="img-fluid" src="img/t2.jpg" alt="">
                            <div class="align-items-center justify-content-center d-flex">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="meta-text mt-30 text-center">
                            <h4>Rodney Cooper</h4>
                            <p>Force</p>
                        </div>
                    </div>
                    <div class="col-md-3 single-team">
                        <div class="thumb">
                            <img class="img-fluid" src="img/t3.jpg" alt="">
                            <div class="align-items-center justify-content-center d-flex">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="meta-text mt-30 text-center">
                            <h4>Dora Walker</h4>
                            <p>Yoga</p>
                        </div>
                    </div>
                    <div class="col-md-3 single-team">
                        <div class="thumb">
                            <img class="img-fluid" src="img/t4.jpg" alt="">
                            <div class="align-items-center justify-content-center d-flex">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="meta-text mt-30 text-center">
                            <h4>Paul Keller</h4>
                            <p>Remise en forme</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End team Area -->

        <!-- Start price Area -->
        <section class="price-area pt-20 pb-20 border-black" id="plans">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-20 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">Choisissez le plan qui vous correspond !</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-price">
                            <div class="top-sec d-flex justify-content-between">
                                <div class="top-left">
                                    <h4>Etudiant</h4>
                                    <p>Pour <br>les petits budgets</p>
                                </div>
                                <div class="top-right">
                                    <h1>199€</h1>
                                </div>
                            </div>
                            <div class="end-sec">
                                <ul>
                                    <li style="color:green">Accès au club entre 8H et 20H</li>
                                    <li style="color:green">Accès aux cours collectifs</li>
                                    <li style="color:green">Accès aux cours personnalisés</li>
                                    <li style="color:red"><s>Programme diététique personnalisé</s></li>
                                    <li style="color:red"><s>Accès au parking privé</s></li>
                                    <li style="color:red"><s>Accès au sauna</s></li>
                                </ul>
                                <a href="php/adherent/abonnement.php?abonnement=Etudiant"><button class="primary-btn price-btn mt-20">Acheter<span class="lnr lnr-arrow-right"></span></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-price">
                            <div class="top-sec d-flex justify-content-between">
                                <div class="top-left">
                                    <h4>Normal</h4>
                                    <p>Pour les <br>plus grands sportifs</p>
                                </div>
                                <div class="top-right">
                                    <h1>€399</h1>
                                </div>
                            </div>
                            <div class="end-sec">
                                <ul>
                                    <li style="color:green">Accès au club entre 6H et 22H</li>
                                    <li style="color:green">Accès aux cours collectifs</li>
                                    <li style="color:green">Accès aux cours personnalisés</li>
                                    <li style="color:green">Programme diététique personnalisé</li>
                                    <li style="color:green">Accès au parking privé</li>
                                    <li style="color:red"><s>Accès au sauna</s></li>

                                </ul>
                                <a href="php/adherent/abonnement.php?abonnement=Normal"><button class="primary-btn price-btn mt-20">Acheter<span class="lnr lnr-arrow-right"></span></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-price">
                            <div class="top-sec d-flex justify-content-between">
                                <div class="top-left">
                                    <h4>Elite</h4>
                                    <p>Pour les <br>plus grands sportifs</p>
                                </div>
                                <div class="top-right">
                                    <h1>499€</h1>
                                </div>
                            </div>
                            <div class="end-sec">
                                <ul>
                                    <li style="color:green">Accès au club entre 6H et 22H</li>
                                    <li style="color:green">Accès aux cours collectifs</li>
                                    <li style="color:green">Accès aux cours personnalisés</li>
                                    <li style="color:green">Programme diététique personnalisé</li>
                                    <li style="color:green">Accès au parking privé</li>
                                    <li style="color:green">Accès au sauna</li>
                                </ul>
                                <a href="php/adherent/abonnement.php?abonnement=Elite"><button class="primary-btn price-btn mt-20">Acheter<span class="lnr lnr-arrow-right"></span></button></a>
                            </div>
                        </div>
                    </div>

        </div>
    </div>
</section>
<!-- End price Area -->

        <!-- start footer Area -->
        <footer class="footer-area section-gap border-black">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>A propos de nous</h4>
                            <p>Notre salle de sport est situé à Belfort. Elle vous propose de nombreuses activités et il est possible de choisir l'abonnement par an ou par mois.</p>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Nous contacter</h4>
                            <p>Tous les jours sauf le dimanche directement à la salle de sport, ainsi que par téléphone au </p>
                            <p class="number">
                                03 29 32 47 58 <br>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Newsletter</h4>
                            <p>Vous pouvez nous faire confiance. Nous envoyons uniquement des offres interessantes, pas de spam.</p>
                            <div class="d-flex flex-row" id="mc_embed_signup">


                                  <form class="navbar-form" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
                                    <div class="input-group add-on">
                                        <input class="form-control" name="EMAIL" placeholder="Adresse email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adresse email'" required="" type="email">
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                        </div>
                                      <div class="input-group-btn">
                                        <button class="genric-btn"><span class="lnr lnr-arrow-right"></span></button>
                                      </div>
                                    </div>
                                      <div class="info mt-20"></div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom row">
                    <p class="footer-text m-0 col-lg-6">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Projet TA70 | Template made <i class="icon-heart3" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                    <div class="footer-social col-lg-6">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->
    </body>
</html>



