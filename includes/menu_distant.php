<div class="container">
    <div class="row align-items-center justify-content-center d-flex">
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="../../index.php#home">Accueil</a></li>
                <li><a href="../../index.php#actus">Actualités</a></li>
                <li><a href="../../index.php#cours">Cours</a></li>
                <li><a href="../../index.php#planning">Planning</a></li>
                <li><a href="../../index.php#coachs">Coachs</a></li>
                <li><a href="../../index.php#plans">Plans</a></li>

                <?php
                if($_SESSION)
                {
                    switch($_SESSION['UserRole'])
                    {
                        case 1: //adhérent
                            ?>
                            <li class="menu-has-children"><a href="" style="color:#66b266">Mon espace adhérent</a>
                                <ul>
                                    <li class="menu-active"><a href="../adherent/home.php">Mes informations</a></li>
                                    <li><a href="../adherent/cours.php">Mes cours</a></li>
                                    <li><a href="../adherent/factures.php">Mes factures</a></li>
                                </ul>
                            </li>
                            <?php

                            break;
                        case 2: //coach
                            ?>
                            <li class="menu-has-children"><a href="" style="color:#66b266">Mon espace coach</a>
                                <ul>
                                    <li><a href="../generic.html">Generic</a></li>
                                    <li><a href="../elements.html">Elements</a></li>
                                </ul>
                            </li>
                            <?php
                            break;
                        case 3: //comptable
                            ?>
                            <li class="menu-has-children"><a href="" style="color:#66b266">Mon espace comptable</a>
                                <ul>
                                    <li class="menu-active"><a href="../comptable/factures_en_attente.php">Factures en attente</a></li>
                                    <li class="menu-active"><a href="../comptable/factures_validees.php">Factures validées</a></li>
                                </ul>
                            </li>
                            <?php
                            break;
                        case 4: //webmaster - admin
                            ?>
                            <li class="menu-has-children"><a href="" style="color:#66b266">Mon espace administrateur</a>
                                <ul>
                                    <li class="menu-active"><a href="../admin/factures.php">Factures</a></li>
                                    <li class="menu-active"><a href="../admin/actualites_accueil.php">Actualités</a></li>
                                    <li class="menu-active"><a href="../admin/connect_en_tant_que.php">Connexion en tant que</a></li>
                                </ul>

                            </li>
                            <?php
                            break;
                        case 5: //pdg
                            ?>
                            <li class="menu-has-children"><a href="" style="color:#66b266">Mon espace PDG</a>
                                <ul>
                                    <li><a href="../generic.html">Generic</a></li>
                                    <li><a href="../elements.html">Elements</a></li>
                                </ul>
                            </li>
                            <?php
                            break;
                    }
                }
                ?>

            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</div>