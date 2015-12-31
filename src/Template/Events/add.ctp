<?php
$this->assign('title', 'Nouvel événement');
?>
<article class="main-content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Nouvel événement') ?></legend>
        <?php
            echo $this->Form->input('title', ['label' => __('Titre')]);
            echo $this->Form->input('description');
            echo $this->Form->input('start', ['label' => __('Date de début')]);
            echo $this->Form->input('end', ['label' => __('Date de fin')]);
            echo $this->Form->input('nb_min', ['label' => __('Nombre de participants minimum')]);
            echo $this->Form->input('nb_max', ['label' => __('Nombre de places')]);
            echo $this->Form->input('age_min', ['label' => __('Age minimum requis')]);
            echo $this->Form->input('age_max', ['label' => __('Age maximum')]);
            echo $this->Form->input('games._ids', ['label' => __('Jeux'), 'multiple' => 'checkbox']); // @see http://book.cakephp.org/3.0/fr/views/helpers/form.html#creation-d-elements-de-formulaire
        ?>
    </fieldset>
    <div class="actions">
        <?= $this->Form->button(__('Créer'), ['class' => 'button success']) ?>
    </div>
    <?= $this->Form->end() ?>
</article>
