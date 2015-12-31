<?php
$this->assign('title', 'Nouveau jeu');
?>
<article class="main-content">
    <?= $this->Form->create($game) ?>
    <fieldset>
        <legend><?= __('Nouveau jeu') ?></legend>
        <?php
            echo $this->Form->input('title', ['label' => __('Titre')]);
            echo $this->Form->input('description');
            echo $this->Form->input('nb_min', ['label' => __('Nombre de joueurs minimum')]);
            echo $this->Form->input('nb_max', ['label' => __('Nombre de joueurs maximum')]);
            echo $this->Form->input('age_min', ['label' => __('Age minimum requis')]);
            echo $this->Form->input('age_max', ['label' => __('Age maximum')]);
            //echo $this->Form->input('categories._ids', ['options' => $categories]);
        ?>
    </fieldset>
    <div class="actions">
        <?= $this->Form->button(__('Créer'), ['class' => 'button success']) ?>
    </div>
    <?= $this->Form->end() ?>
</article>
