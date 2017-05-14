<?php
/*echo $this->Html->css('home', ['inline' => false]);*/
$this->assign('title', $h1);
$this->Html->css(['bootstrap', 'carousel'], ['block' => 'css']);
$this->Html->script(['http://code.jquery.com/jquery-1.11.0.min.js', 'http://code.jquery.com/jquery-migrate-1.2.1.min.js', 'bootstrap.min'], ['block' => 'script']);
use Cake\Core\Configure;
?>
<article class="marketing main-content">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-slide-to="0" data-target="#myCarousel" class="active"></li>
            <li data-slide-to="1" data-target="#myCarousel"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide" alt="First slide" src="img/slide.jpg">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Prochain événement</h1>
                        <p>
                            <?= h($next->title) ?>
                        </p>
                        <p>
                            <?= $this->Html->link(__('Plus d\'infos'), ['controller' => 'events', 'action' => 'view', $next->id], ['class' => ['btn btn-lg btn-primary']]) ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="next-slide" alt="Next slide" src="img/slide2.jpg">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Dernier événement</h1>
                        <p>
                            <?= h($previous->title) ?>
                        </p>
                        <p>
                            <?= $this->Html->link(__('Plus d\'infos'), ['controller' => 'events', 'action' => 'view', $previous->id], ['class' => ['btn btn-lg btn-primary']]) ?>
                        </p>
                    </div>
                </div>
            </div>

            <a class="left carousel-control" data-slide="prev" role="button" href="#myCarousel">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="right carousel-control" data-slide="next" role="button" href="#myCarousel">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="col-lg-4">
        <?= $this->Html->image('puzzle.jpg', ['alt' => 'Puzzle', 'class' => 'img-circle']) ?>
        <h2>Une équipe conviviale</h2>
        <p>Notre association est composée de bénévoles passionnés de jeux de société qui se feront un plaisir de vous faire découvrir des jeux cultes comme des nouveautés dans une ambiance détendue et enjouée !</p>
        <p class="row-link"><?= $this->Html->link(__('Nous rejoindre !'), ['controller' => 'users', 'action' => 'add'], ['class' => ['btn btn-default']]) ?></p>
    </div>
    <div class="col-lg-4">
        <?= $this->Html->image('salle_jeux2.jpg', ['alt' => 'Salle de jeu', 'class' => 'img-circle']) ?>
        <h2>Un local agréable</h2>
        <p>La mairie de Mulhouse met à notre disposition une fois par semaine une salle fraîchement rénovée pouvant accueillir jusqu'à 50 personnes pour des soirées toujours très appréciées !</p>
        <p class="row-link"><?= $this->Html->link(__('Où ça ?'), ['controller' => 'pages', 'action' => 'info'], ['class' => ['btn btn-default']]) ?></p>
    </div>
    <div class="col-lg-4">
        <?= $this->Html->image('table_jeux.jpg', ['alt' => 'Table de jeu', 'class' => 'img-circle']) ?>
        <h2>Des soirées à thème</h2>
        <p>De retro aux jeux de réflexion en passant par les jeux de rôles, nous changeons de thème à chaque soirée et vous proposons de voter pour les jeux qui vous intéressent !</p>
        <p class="row-link"><?= $this->Html->link(__('Plus d\'infos'), ['controller' => 'events', 'action' => 'index'], ['class' => ['btn btn-default']]) ?></p>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Qui sommes-nous au juste ?</h2>
            <p class="lead">Depuis janvier 2011, notre équipe dynamique organise vos soirées jeux de société à Mulhouse ! Initialement composée de 8 membres fondateurs et d'une dizaine d'adhérents, nous avons sû attirer des gens de tout âge au fil des années et sommes maintenant environ 200 membres au total.</p>
        </div>
        <div class="col-md-5">
            <?= $this->Html->image('oldies.jpg', ['alt' => 'Vieux jeux', 'class' => 'featurette-image img-responsive center-block']) ?>
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
            <h2 class="featurette-heading">Diverses animations tout au long de l'année et pour tous les âges !</h2>
            <p class="lead">Nous organisons fréquemment des soirées jeux dans différentes thématiques, en soirée mais également certaines après-midi le week-end et pendant les vacances scolaires pour permettre aux plus jeunes de profiter également de nos animations. </p>
        </div>
        <div class="col-md-5 col-md-pull-7">
            <?= $this->Html->image('table_jeux2.jpg', ['alt' => 'Table de jeux', 'class' => 'featurette-image img-responsive center-block']) ?>
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Une grande variété de jeux !</h2>
            <p class="lead">Nous fournissons les jeux dont l'association dispose mais également ceux que certains de nos membres mettent gracieusement à notre disposition. Cela nous permet donc de vous proposer un grand panel de choix de jeux au sein même de chaque thématique ainsi que des événements toujours variés !</p>
        </div>
        <div class="col-md-5">
            <?= $this->Html->image('jeux_divers.jpg', ['alt' => 'Jeux divers', 'class' => 'featurette-image img-responsive center-block']) ?>
        </div>
    </div>
</article>