<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events index large-9 medium-8 columns content">
    <h3><?= __('Events') ?></h3>
    <?= ''//debug($events->toArray()) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Nombre de joueurs</th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr onclick="location.href = <?= $this->Url->build(['controller' => 'events', 'action' => 'view', $event->id]) ?>">
                <td><?= h($event->title) ?></td>
                <td><?= $this->Text->truncate($event->description, 100) ?></td>
                <td><?= h($event->start) ?></td>
                <td><?= h($event->end) ?></td>
                <td><?= $this->Number->format($event->nb_min) ?>/<?= $this->Number->format($event->nb_max) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $event->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $event->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
