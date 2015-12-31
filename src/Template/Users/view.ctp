<?php
$this->assign('title', 'Membre : ' . $user->username);
?>
<article class="actions">
    <?php if($authUser && $authUser['role'] === 'admin'): ?>
        <?= $this->Form->postLink('Supprimer', ['controller' => 'users', 'action' => 'delete', $user->id], ['class' => 'button small alert', 'confirme' => __('Êtes vous sûr de vouloir supprimer le membre {0} ?', $user->username)]) ?>
        <?php if($user->role !== 'admin'): ?>
            <?= $this->Form->postLink('Rendre admin', ['controller' => 'users', 'action' => 'promote', $user->id], ['class' => 'button small success', 'confirme' => __('Êtes vous sûr de vouloir rendre admin le membre {0} ?', $user->username)]) ?>
        <?php else: ?>
            <?= $this->Form->postLink('Enlever admin', ['controller' => 'users', 'action' => 'demote', $user->id], ['class' => 'button small alert', 'confirme' => __('Êtes vous sûr de vouloir enlever le droits d\'admin au membre {0} ?', $user->username)]) ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($authUser && $authUser['id'] === $user->id): ?>
        <?= $this->Html->link('Modifier', ['controller' => 'users', 'action' => 'edit', $user->id], ['class' => 'button small']) ?>
    <?php endif; ?>
</article>
<article class="main-content view">
    <h2 class="view-title"><?= $user->username ?></h2>
    <div class="view-data-sup">
        <strong>Nom : </strong><?= h($user->lastname) ?>
        <br>
        <strong>Prénom : </strong><?= h($user->firstname) ?>
        <br>
        <strong>Anniversaire : </strong><?= $this->element('calendar-day', ['date' => $user->birthday, 'time' => false]) ?>
    </div>
</article>
