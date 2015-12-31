<?php
$this->assign('title', 'Jeux');
?>
<article class="actions">
    <?php if($authUser && $authUser['role'] === 'admin'): ?>
        <?= $this->Html->link('Nouveau', ['controller' => 'games', 'action' => 'add'], ['class' => 'button small']) ?>
    <?php endif; ?>
</article>
<article class="main-content">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('nb_min') ?></th>
                <th><?= $this->Paginator->sort('nb_max') ?></th>
                <th><?= $this->Paginator->sort('age_min') ?></th>
                <th><?= $this->Paginator->sort('age_max') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game): ?>
            <tr>
                <td><?= $this->Html->link($game->title, ['controller' => 'games', 'action' => 'view', $game->id]) ?></td>
                <td><?= $this->Number->format($game->nb_min) ?></td>
                <td><?= $this->Number->format($game->nb_max) ?></td>
                <td><?= $this->Number->format($game->age_min) ?></td>
                <td><?= $this->Number->format($game->age_max) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</article>
