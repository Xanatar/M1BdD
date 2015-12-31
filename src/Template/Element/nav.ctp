<?php
$nav = [
    'home' => [
        'url' => '/',
        'txt' => 'Accueil',
    ],
    'events' => [
        'url' => ['controller' => 'events', 'action' => 'index'],
        'txt' => 'Événements',
    ],
    'games' => [
        'url' => ['controller' => 'games', 'action' => 'index'],
        'txt' => 'Jeux',
    ],
    'members' => [
        'url' => ['controller' => 'users', 'action' => 'index'],
        'txt' => 'Membres',
    ],
    'info' => [
        'url' => ['controller' => 'pages', 'action' => 'info'],
        'txt' => 'Informations',
    ],
];

if(!$authUser) {
    $nav['login'] = [
        'url' => ['controller' => 'users', 'action' => 'login'],
        'txt' => 'Connexion',
    ];
} else {
    $nav['user'] = [
        'url' => ['controller' => 'users', 'action' => 'view', $authUser['id']],
        'txt' => $authUser['username'],
    ];
    $nav['logout'] = [
        'url' => ['controller' => 'users', 'action' => 'logout'],
        'txt' => '<i class="fa fa-power-off" title="Deconnexion"></i>',
    ];
}
?>
<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
            <h1><a href=""><?= $this->fetch('title') ?></a></h1>
        </li>
    </ul>
    <section class="top-bar-section">
        <ul class="right">
            <?php foreach($nav as $id => $n): ?>
                <li><?= $this->Html->link($n['txt'], $n['url'], ['id' => $id, 'escape' => false]) ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</nav>