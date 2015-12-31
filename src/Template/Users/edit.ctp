
<?php
$this->assign('title', 'Modifier le compte');
?>
<article class="main-content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend>Identifiants</legend>
        <?= $this->Form->input('username', ['label' => __('Pseudonyme')]) ?>
        <?= $this->Form->input('password', ['label' => __('Mot de passe')]) ?>
        <?= $this->Form->input('password_confirm', ['label' => __('Confirmation du mot de passe'), 'type' => 'password', 'required' => true]) ?>
    </fieldset>
    <fieldset>
        <legend>Informations supplémentaires</legend>
        <?= $this->Form->input('email', ['label' => __('Adresse email')]) ?>
        <?= $this->Form->input('firstname', ['label' => __('Prénom')]) ?>
        <?= $this->Form->input('lastname', ['label' => __('Nom')]) ?>
        <?= $this->Form->input('birthday', ['label' => __('Date de naissance'), 'type' => 'date', 'minYear' => 1910, 'maxYear' => date('Y')]) ?>
    </fieldset>
    <div class="actions">
        <?= $this->Form->submit(__('Enregistrer'), ['class' => 'button success']) ?>
    </div>
    <?= $this->Form->end() ?>
</article>
