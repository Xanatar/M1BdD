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
</article>
