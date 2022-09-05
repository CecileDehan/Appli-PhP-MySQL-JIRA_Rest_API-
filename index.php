<!doctype html>

<html lang="fr" data-fr-scheme="system">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="theme-color" content="#000091"><!-- Défini la couleur de thème du navigateur (Safari/Android) -->
        <link rel="apple-touch-icon" href="node_modules\@gouvfr\dsfr\dist\favicon\apple-touch-icon.png">
        <link rel="icon" href="node_modules\@gouvfr\dsfr\dist\favicon\favicon.svg" type="image/svg+xml">
        <link rel="shortcut icon" href="node_modules\@gouvfr\dsfr\dist\favicon\favicon.ico" type="image/x-icon">
        <link rel="manifest" href="node_modules\@gouvfr\dsfr\dist\favicon\manifest.webmanifest" crossorigin="use-credentials">
        <link href="node_modules\@gouvfr\dsfr\dist\dsfr.min.css" rel="stylesheet">
        <link href="node_modules\@gouvfr\dsfr\dist\utility\utility.min.css" rel="stylesheet">
        <link href="./css/pagination.css" rel="stylesheet">
        <link href="node_modules\@gouvfr\dsfr\dist\utility\icons\icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

        <style>
            
            
        </style>
        <title>SAM-VERSION</title>
    </head>



    <body>

        <header role="banner" class="fr-header">
            <div class="fr-header__body">
                <div class="fr-container">
                    <div class="fr-header__body-row">
                        <div class="fr-header__brand fr-enlarge-link">
                            <div class="fr-header__brand-top">
                                <div class="fr-header__logo">
                                    <p class="fr-logo">
                                        Ministère
                                        <br>de
                                        <br>l'éducation
                                        <br>nationale
                                        <br>et de
                                        <br>la jeunesse
                                    </p>
                                </div>
                                <div class="fr-header__navbar">
                                    <button class="fr-btn--search fr-btn" data-fr-opened="false" aria-controls="modal-474" id="button-475" title="Rechercher">
                                        Rechercher
                                    </button>
                                    <button class="fr-btn--menu fr-btn" data-fr-opened="false" aria-controls="modal-476" aria-haspopup="menu" id="button-477" title="Menu">
                                        Menu
                                    </button>
                                </div>
                            </div>
                            <div class="fr-header__service">
                                <a href="/" title="Accueil - [À MODIFIER - Nom du site / service] - Nom de l’entité (ministère, secrétariat d‘état, gouvernement)">
                                    <p class="fr-header__service-title">
                                        Espace de gestion d'application SIRH
                                    </p>
                                </a>
                                <p class="fr-header__service-tagline">Service de modernisation des SIRH pour l'éducation (Semsirh)</p>
                            </div>
                        </div>
                        <div class="fr-header__tools">
                            <div class="fr-header__tools-links">
                                <ul class="fr-btns-group">
                                    <li>
                                        <a class="fr-btn fr-icon-lock-line" href="./login.php">
                                            Se connecter
                                        </a>
                                    </li>
                                    <!-- <li>
                                            <a class="fr-btn fr-icon-account-line" href="[url - à modifier]">
                                                S’enregistrer
                                            </a>
                                        </li> -->
                                </ul>
                            </div>
                            <div class="fr-header__search fr-modal" id="modal-474">
                                <div class="fr-container fr-container-lg--fluid">
                                    <button class="fr-btn--close fr-btn" aria-controls="modal-474" title="Fermer">
                                        Fermer
                                    </button>
                                    <div class="fr-search-bar" id="search-473" role="search">
                                        <label class="fr-label" for="search-473-input">
                                            Rechercher
                                        </label>
                                        <input class="fr-input" placeholder="Rechercher" type="search" id="search-473-input" name="search-473-input">
                                        <button class="fr-btn" title="Rechercher">
                                            Rechercher
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fr-header__menu fr-modal" id="modal-476" aria-labelledby="button-477">
                <div class="fr-container">
                    <button class="fr-btn--close fr-btn" aria-controls="modal-476" title="Fermer">
                        Fermer
                    </button>
                    <div class="fr-header__menu-links">
                    </div>
                    <nav class="fr-nav" id="navigation-478" role="navigation" aria-label="Menu principal">
                        <ul class="fr-nav__list">
                            <li class="fr-nav__item">
                                <a class="fr-nav__link" href="./index.php" target="_self">Acceuil</a>
                            </li>


                            <?php include('config.php');
                            mysqli_select_db($con, "database");
                            if (empty($_COOKIE['userid'])) {

                                $userid = 10;
                            } else {

                                $userid = $_COOKIE['userid'];
                            }

                            $type = mysqli_query($con, "SELECT access_level FROM registration WHERE id ='$userid  ' ");

                            $row = $type->fetch_assoc();
                            $ACL = $row['access_level'];

                            if ($ACL >= 40) { ?>

                                <li class="fr-nav__item">
                                    <a class="fr-nav__link" href="./ajout_version.php" target="_self">Ajout d'une version</a>
                                </li>




                            <?php }  ?>


                            <li class="fr-nav__item">
                                <a class="fr-nav__link" href="./get_all_version.php" target="_self">Extraction des versions JIRA</a>
                            </li>
                            <!-- <li class="fr-nav__item">
                                <a class="fr-nav__link" href="./delete_version.php" target="_self">Supp JIRA</a>
                            </li> -->
                            <li class="fr-nav__item">
                                <a class="fr-nav__link" href="./profil.php" target="_self">Paramètres</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="bandeau_header">
                <img src="./bandeau_header.png" style="width: 100%; height:auto;border: 0 !important; margin-top:10px">
            </div>
        </header>

        <div class="fr-container">

            <button style="margin-top:0.5rem;" class="fr-btn" onclick='window.location.reload(true);'>Reset filter</button>
            
            <input class="fr-input" placeholder="Rechercher" type="search" id="search" name="search">
            
            
            <script>
                    $(document).ready(function() {
                        $("#search").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                    $(document).ready(function() {
                        $('#table-id').ddTableFilter();
                    })
            </script>

            <!-- TABLE -->
            <div class="fr-table">
                
                <table id="table-id">
                    <thead>
                        <tr>
                            <th class="fr-btn" index=0> Applications ⮟</th>
                            <div class="filter"></div>
                            <th class="fr-btn" index=1>Versions ⮟</th>
                            <div class="filter"></div>
                            <th class="fr-btn" index=2>Pôle de dev ⮟</th>
                            <div class="filter"></div>
                            <th class="fr-btn" index=3>Equipe de dev ⮟</th>
                            <div class="filter"></div>
                            <th class="fr-btn" index=4>Date de livraison ⮟</th>
                            <div class="filter"></div>
                            <th class="fr-btn" index=5>Date d'homologation ⮟</th>
                            <div class="filter"></div>
                            <th class="fr-btn" index=6>Date de mise en production ⮟</th>
                            <div class="filter"></div>
                            <th class="fr-btn" index=7>FIV </th>
                            <th class="fr-btn" index=8>Etat ⮟</th>
                            <div class="filter"></div>
                            <?php include('config.php');
                            mysqli_select_db($con, "database");
                            if (empty($_COOKIE['userid'])) {

                                $userid = 10;
                            } else {

                                $userid = $_COOKIE['userid'];
                            }

                            $type = mysqli_query($con, "SELECT access_level FROM registration WHERE id ='$userid  ' ");

                            $row = $type->fetch_assoc();
                            $ACL = $row['access_level'];

                            if ($ACL >= 40) { ?>

                                <th class="fr-btn" index=9 scope="col">Modifier</th>



                            <?php }
                            if ($ACL >= 55) { ?>

                                <th class="fr-btn" index=10 scope="col">JIRA</th>



                            <?php }  ?>


                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php include('config.php');
                        mysqli_select_db($con, "database");
                        $results = mysqli_query($con, "SELECT * FROM data_version");

                        if (empty($_COOKIE['userid'])) {

                            $userid = 10;
                        } else {

                            $userid = $_COOKIE['userid'];
                        }

                        $type = mysqli_query($con, "SELECT access_level FROM registration WHERE id ='$userid  ' ");

                        $row = $type->fetch_assoc();
                        $ACL = $row['access_level'];

                        while ($row = mysqli_fetch_array($results)) {
                        ?>
                            <tr>

                                <td><?php echo $row['App'] ?></td>
                                <td><?php echo $row['Version'] ?></td>
                                <td><?php echo $row['PoleDev'] ?></td>
                                <td><?php echo $row['EquipeDev'] ?></td>
                                <td>
                                    <?php

                                    $date = $row['Livraison'];
                                    $dt = DateTime::createFromFormat('Y-m-d', $date);
                                    echo $dt->format('d-m-Y');
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($row['Homologation'] != '') {
                                        $date = $row['Homologation'];
                                        $dt = DateTime::createFromFormat('Y-m-d', $date);
                                        echo $dt->format('d-m-Y');
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    $date = $row['Production'];
                                    $dt = DateTime::createFromFormat('Y-m-d', $date);
                                    echo $dt->format('d-m-Y');
                                    ?>
                                </td>

                                <?php
                                if ($row['FIV'] != '') { ?>
                                    <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;text-align:center">
                                        <a href="<?php echo $row['FIV'] ?>" id="link" style="text-decoration : none !important;" target="_blank"></a>
                                    </td>

                                <?php } else { ?>
                                    <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;text-align:center">

                                    </td>

                                <?php } ?>
                                <td><?php echo $row['Etat'] ?></td>




                                <?php

                                if ($ACL >= 40) { ?>

                                    <td style="text-align:center ;text-decoration:none;">
                                        <a href="./modify.php?modif=<?php echo $row['Version'] ?>"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                    </td>



                                <?php }
                                if ($ACL >= 55) { ?>


                                    <td style="text-align:center ; ">
                                        <a href="./create_version_jira.php?id=<?php echo $row['id_version'] ?>" id="link">Création <br><i class="fa fa-arrow-right fa-lg" aria-hidden="true"> </i>
                                        </a>
                                        <br>
                                        <a href="./update_version_jira.php?id=<?php echo $row['id_version'] ?>" id="link">Update <br><i class="fa fa-pencil fa-lg" aria-hidden="true"> </i>
                                        </a>
                                    </td>



                                <?php }  ?>




                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>

                </table>
                    
            </div>


            <nav role="navigation" class="fr-pagination" aria-label="Pagination">
                <ul class="fr-pagination__list">
                    <script>
                        $(document).ready(function() {
                            $('#table-id').after('<div id="nav"></div>');
                            var rowsShown = 10;
                            var rowsTotal = $('#table-id tbody tr').length;

                            var numPages = rowsTotal / rowsShown;
                            for (i = 0; i < numPages; i++) {
                                var pageNum = i + 1;

                                $('#nav').append('<a class="fr-pagination__link "  href = "#" rel = "' + i + '" > ' + pageNum + ' </a>');



                            };



                            $('#table-id tbody tr').hide();
                            $('#table-id tbody tr').slice(0, rowsShown).show();
                            $('#nav a:first').addClass('active');
                            $('#nav a').bind('click', function() {

                                $('#nav a').removeClass('active');
                                $(this).addClass('active');
                                var currPage = $(this).attr('rel');
                                var startItem = currPage * rowsShown;
                                var endItem = startItem + rowsShown;
                                $('#table-id tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
                                css('display', 'table-row').animate({
                                    opacity: 1
                                }, 300);
                            });

                        });
                    </script>
                </ul>
            </nav>

        </div>
    

        <footer class="fr-footer" role="contentinfo" id="footer">
            <div class="fr-container">
                <div class="fr-footer__body">
                    <div class="fr-footer__brand fr-enlarge-link">
                        <a href="/" title="Retour à l’accueil du site - Nom de l’entité (ministère, secrétariat d‘état, gouvernement)">
                            <p class="fr-logo">
                                Ministère
                                <br>de
                                <br>l'éducation
                                <br>nationale
                                <br>et de
                                <br>la jeunesse
                            </p>
                        </a>
                    </div>
                    <div class="fr-footer__content">
                        <p class="fr-footer__content-desc">
                            Cet espace de gestion des versions d'application est mis à jour par le Semsirh. <br>Le Semsirh est un service à compétence nationale du ministère de l’éducation nationale, de la jeunesse et des sports, pilotant la modernisation des SIRH du ministère.
                        </p>
                        <ul class="fr-footer__content-list">
                            <li class="fr-footer__content-item">
                                <a class="fr-footer__content-link" target="_blank" href="https://legifrance.gouv.fr">legifrance.gouv.fr</a>
                            </li>
                            <li class="fr-footer__content-item">
                                <a class="fr-footer__content-link" target="_blank" href="https://gouvernement.fr">gouvernement.fr</a>
                            </li>
                            <li class="fr-footer__content-item">
                                <a class="fr-footer__content-link" target="_blank" href="https://service-public.fr">service-public.fr</a>
                            </li>
                            <li class="fr-footer__content-item">
                                <a class="fr-footer__content-link" target="_blank" href="https://data.gouv.fr">data.gouv.fr</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="fr-footer__bottom">
                    <ul class="fr-footer__bottom-list">
                        <li class="fr-footer__bottom-item">
                            <a class="fr-footer__bottom-link" href="/liens">Sites utiles</a>
                        </li>
                        <li class="fr-footer__bottom-item">
                            <a class="fr-footer__bottom-link" href="https://www.education.gouv.fr/">education.gouv.fr</a>
                        </li>
                        <li class="fr-footer__bottom-item">
                            <a class="fr-footer__bottom-link" href="https://adfs-sfer.pleiade.education.fr/adfs/ls/?wa=wsignin1.0&amp;wtrealm=urn%3Apleiade%3Aadfs&amp;wctx=https%3A//www.pleiade.education.fr/_layouts/Authenticate.aspx%3FSource%3D%252F">Pléiades</a>
                        </li>
                        <li class="fr-footer__bottom-item">
                            <a class="fr-footer__bottom-link" href="https://sirhmen.atlassian.net/wiki/spaces/PSA/overview">Semsirh</a>
                        </li>
                        <li class="fr-footer__bottom-item">
                            <button class="fr-footer__bottom-link fr-fi-theme-fill fr-link--icon-left" aria-controls="fr-theme-modal" data-fr-opened="false">Paramètres d'affichage</button>

                            <dialog id="fr-theme-modal" class="fr-modal" role="dialog" aria-labelledby="fr-theme-modal-title">
                                <div class="fr-container fr-container--fluid fr-container-md">
                                    <div class="fr-grid-row fr-grid-row--center">
                                        <div class="fr-col-12 fr-col-md-6 fr-col-lg-4">
                                            <div class="fr-modal__body">
                                                <div class="fr-modal__header">
                                                    <button class="fr-link--close fr-link" aria-controls="fr-theme-modal">Fermer</button>
                                                </div>
                                                <div class="fr-modal__content">
                                                    <h1 id="fr-theme-modal-title" class="fr-modal__title">
                                                        Paramètres d’affichage
                                                    </h1>
                                                    <div id="fr-display" class="fr-form-group fr-display">
                                                        <div class="fr-form-group">
                                                            <fieldset class="fr-fieldset">
                                                                <legend class="fr-fieldset__legend fr-text--regular" id='-legend'>
                                                                    Choisissez un thème pour personnaliser l’apparence du site.
                                                                </legend>
                                                                <div class="fr-fieldset__content">
                                                                    <div class="fr-radio-group fr-radio-rich">
                                                                        <input value="light" type="radio" id="fr-radios-theme-light" name="fr-radios-theme">
                                                                        <label class="fr-label" for="fr-radios-theme-light">Thème clair
                                                                        </label>
                                                                        <div class="fr-radio-rich__img" data-fr-inject-svg>
                                                                            <img src="node_modules\@gouvfr\dsfr\dist\artwork\light.svg" alt="" />
                                                                            <!-- L’alternative de l’image (attribut alt) doit rester vide car l’image est illustrative et ne doit pas être restituée aux technologies d’assistance -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="fr-radio-group fr-radio-rich">
                                                                        <input value="dark" type="radio" id="fr-radios-theme-dark" name="fr-radios-theme">
                                                                        <label class="fr-label" for="fr-radios-theme-dark">Thème sombre
                                                                        </label>
                                                                        <div class="fr-radio-rich__img" data-fr-inject-svg>
                                                                            <img src="node_modules\@gouvfr\dsfr\dist\artwork\dark.svg" alt="" />
                                                                            <!-- L’alternative de l’image (attribut alt) doit rester vide car l’image est illustrative et ne doit pas être restituée aux technologies d’assistance -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="fr-radio-group fr-radio-rich">
                                                                        <input value="system" type="radio" id="fr-radios-theme-system" name="fr-radios-theme">
                                                                        <label class="fr-label" for="fr-radios-theme-system">Système
                                                                            <span class="fr-hint-text">Utilise les paramètres système.</span>
                                                                        </label>
                                                                        <div class="fr-radio-rich__img" data-fr-inject-svg>
                                                                            <img src="node_modules\@gouvfr\dsfr\dist\artwork\system.svg" alt="" />
                                                                            <!-- L’alternative de l’image (attribut alt) doit rester vide car l’image est illustrative et ne doit pas être restituée aux technologies d’assistance -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </li>
                    </ul>
                    <div class="fr-footer__bottom-copy">
                        <p>Sauf mention contraire, tous les contenus de ce site sont sous <a href="https://github.com/etalab/licence-ouverte/blob/master/LO.md" target="_blank">licence etalab-2.0</a>
                        </p>
                    </div>
                </div>
            </div>

        </footer>


        <!-- Script en version es6 module et nomodule pour les navigateurs le ne supportant pas -->
        <script type="module" src="node_modules\@gouvfr\dsfr\dist\dsfr.module.min.js"></script>
        <script type="text/javascript" nomodule src="node_modules\@gouvfr\dsfr\dist\dsfr.nomodule.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="./Simple-jQuery-Dropdown-Table-Filter-Plugin-ddtf-js/ddtf.js"></script>




    </body>


</html>