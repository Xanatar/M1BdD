<?php
$this->assign('title', 'Jeu : ' . h($game->title));
?>
<article class="actions">
    <?php if($authUser && $authUser['role'] === 'admin'): ?>
        <?= $this->Html->link('Modifier', ['controller' => 'games', 'action' => 'edit', $game->id], ['class' => 'button small']) ?>
        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $game->id], ['class' => 'button small alert', 'confirm' => __('Êtes-vous sûr de vouloir supprimer {0} ?', $game->title)]) ?>
    <?php endif; ?>
</article>
<article class="main-content view">
    <h2 class="view-title"><?= h($game->title) ?></h2>
    <p class="view-description"><?= h($game->description) ?></p>
    <div class="view-data-sup">
        <strong>Âges : </strong><?php if($game->age_min === null && $game->age_max === null) echo __('Tous'); else { if($game->age_min !== null) echo __('à partir de {0} ans ', $this->Number->format($game->age_min)); if($game->age_max !== null) echo __('jusqu\'à {0} ans', $this->Number->format($game->age_max)); } ?>
        <br>
        <strong>Nombre de joueurs : </strong>minimum : <?= $this->Number->format($game->nb_min) ?>, maximum : <?= $this->Number->format($game->nb_max) ?>
    </div>
    <strong>Evénements associés :</strong>
    <ul class="event-list">
        <?php foreach ($game->events as $event): ?>
            <li class="event-list-item">
                <div class="event-date"><?= $this->element('calendar-day', ['date' => $event->start, 'onclick' => $this->Url->build(['controller' => 'events', 'action' => 'view', $event->id])]) ?></div>
                <div class="event-data">
                    <?= $this->Html->link($event->title, ['controller' => 'events', 'action' => 'view', $event->id], ['class' => 'event-title']) ?>
                    <div class="event-data-content">
                        <p class="event-description"><?= $this->Text->truncate($event->description, 150) ?></p>
                        <div class="event-data-sup">
                            <div class="event-players" title="<?= count($event->users) ?> joueurs participants pour <?= $this->Number->format($event->nb_max) ?> places"><i class="fa fa-users fa-fw"></i><?= $this->Number->format($event->nb_min) ?> - <?= $this->Number->format($event->nb_max) ?> (<?= count($event->users) ?>)</div>
                            <div class="event-duration" title="Durée de l'évènement"><i class="fa fa-clock-o fa-fw"></i><?= $event->end->diffForHumans($event->start) ?></div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</article>
