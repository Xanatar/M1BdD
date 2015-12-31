<?php
$this->assign('title', 'Evénements');
?>
<article class="actions">
    <?php if($authUser && $authUser['role'] === 'admin'): ?>
        <?= $this->Html->link('Nouveau', ['controller' => 'events', 'action' => 'add'], ['class' => 'button small']) ?>
    <?php endif; ?>
</article>
<article>
    <ul class="event-list">
        <?php foreach ($events as $event): ?>
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
