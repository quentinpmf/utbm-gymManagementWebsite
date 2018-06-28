<?php
include "../login/connectToBDD/conn.php";
include '../../includes/config.php';
?>

    <header id="header" id="home">
        <?php session_start(); ?>
        <?php include '../../includes/banner.php'; ?>
        <?php include '../../includes/menu_distant.php'; ?>
    </header>

<body>
    <section class="section-gap-other-pages">
        <div class="title text-center">

            <h1 style="margin-top: 80px" class="mb-10">Actualités</h1>

            <div class="container">
                <div class="row">
                    <?php
                    $req = $bdd->query("SELECT date_creation
                                                         ,titre
                                                         ,image
                                                         ,description
                                                         ,id
                                                   FROM actualites
                                                   WHERE publie = 1
                                                   ORDER BY date_creation desc");

                    while($data = $req->fetch())
                    {
                    ?>
                    <div class="col-sm-4" style="width: 90%; height: 42%; padding-bottom: 20px;">
                        <a href="actualites_affichage.php?id= <?php echo $data['id'] ?>">
                            <table style="border: 1px solid black; font-family: Gotham XNarrow SSm A,Sans-Serif; width: 100%; height: 100%">
                                <tr style='height: 50px;'>
                                    <td>
                                        <h1 style="text-align: center;"><?php echo utf8_encode($data['titre']); ?></h1>
                                    </td>
                                </tr>
                                <tr style='height: 200px;'>
                                    <td>
                                        <img src="../../img/actualites/<?php echo $data['image'] ?>" style="max-width: 100%; max-height: 200px; min-width: 50%; min-height: 100px; display: block; margin-left: auto; margin-right: auto;"/>
                                    </td>
                                </tr>
                                <tr style='height: auto'>
                                    <td>
                                        <p><?php echo utf8_encode(substr($data['description'], 0, 200)); ?>...</p>
                                    </td>
                                </tr>
                                <tr style='height: 25px;'>
                                    <td>
                                        <h6 align="right" style="font-size: 0.65em; text-align: right;"><?php echo $data['date_creation'] ?></h6>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>