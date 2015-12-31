<?php
$this->assign('title', 'Evénement : ' . h($event->title));
?>
<article class="actions">
    <?php if($authUser): ?>
        <?php
        $test = false;
        foreach($event->users as $u) {
            if($u['id'] == $authUser['id']) $test = true;
        }
        if($test): ?>
            <?= $this->Form->postLink(__('Se désinscrire'), ['action' => 'unjoin', $event->id], ['class' => 'button small alert', 'confirm' => __('Êtes-vous sûr de vouloir vous désinscrire de {0} ?', $event->title)]) ?>
        <?php else: ?>
            <?= $this->Form->postLink(__('S\'inscrire'), ['action' => 'join', $event->id], ['class' => 'button small success', 'confirm' => __('Êtes-vous sûr de vouloir vous inscrire à {0} ?', $event->title)]) ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($authUser && $authUser['role'] === 'admin'): ?>
        <?= $this->Html->link('Modifier', ['controller' => 'events', 'action' => 'edit', $event->id], ['class' => 'button small']) ?>
        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $event->id], ['class' => 'button small alert', 'confirm' => __('Êtes-vous sûr de vouloir supprimer {0} ?', $event->title)]) ?>
    <?php endif; ?>
</article>
<article class="main-content view">
    <h2 class="view-title"><?= h($event->title) ?></h2>
    <div class="view-date"><?= $this->element('calendar-day', ['date' => $event->start]) ?></div>
    <p class="view-description"><?= h($event->description) ?></p>
    <div class="view-data-sup">
        <strong>Fin de l'événement : </strong><?= $event->end->i18nFormat('dd/MM/yyyy HH:mm') ?>
        <br>
        <strong>Âges : </strong><?php if($event->age_min === null && $event->age_max === null) echo __('Tous'); else { if($event->age_min !== null) echo __('à partir de {0} ans ', $this->Number->format($event->age_min)); if($event->age_max !== null) echo __('jusqu\'à {0} ans', $this->Number->format($event->age_max)); } ?>
        <br>
        <strong>Nombre de places : </strong>minimum : <?= $this->Number->format($event->nb_min) ?>, maximum : <?= $this->Number->format($event->nb_max) ?>
        <br>
        <strong>Nombre de participants : </strong><?= count($event->users) ?> :
        <ul>
        <?php foreach($event->users as $user): ?>
            <li>
                <?= $user->username ?>
                <?php if($authUser && $authUser['role'] === 'admin'): ?>
                    <?= $this->Form->postLink('<i class="fa fa-times" style="color:red;"></i>', ['action' => 'unjoin', $event->id, $user->id], ['escape' => false, 'title' => 'Désinscrire', 'confirm' => __('Êtes-vous sûr de vouloir désinscrire {0} de {1} ?',$user->username , $event->title)]) ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
        <br>
        <strong>Liste des jeux : </strong>
        <ul>
        <?php foreach($event->games as $game): ?>
            <li><?= $this->Html->link($game->title, ['controller' => 'games', 'action' => 'view', $game->id]) ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
</article>