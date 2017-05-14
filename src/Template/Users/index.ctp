<?php
$this->assign('title', 'Membres');
?>
<article class="actions">
</article>
<article class="main-content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('username', 'Pseudonyme') ?></th>
                <th><?= $this->Paginator->sort('lastname', 'Nom') ?></th>
                <th><?= $this->Paginator->sort('firstname', 'Prénom') ?></th>
                <th><?= $this->Paginator->sort('birthday', 'Date de naissance') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Html->link($user->username, ['controller' => 'users', 'action' => 'view', $user->id], ['escape' => false]) ?></td>
                <td><?= h($user->lastname) ?></td>
                <td><?= h($user->firstname) ?></td>
                <td><?= $user->birthday->i18nFormat('dd/MM/yyyy') ?></td>
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
