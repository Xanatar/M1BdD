<?php
$this->assign('title', $h1);
?>
<article class="main-content">
    <?= $this->Form->create($user) ?>
    <?= $this->Form->input('username', ['label' => __('Pseudonyme')]) ?>
    <?= $this->Form->input('password', ['label' => __('Mot de passe')]) ?>
    <div class="actions">
        <?= $this->Form->submit(__('Connecter'), ['class' => 'button success']) ?>
    </div>
    <?= $this->Form->end() ?>
    <?= $this->Html->link(__('Pas encore de compte ?'), ['controller' => 'users', 'action' => 'add']) ?>
</article>
