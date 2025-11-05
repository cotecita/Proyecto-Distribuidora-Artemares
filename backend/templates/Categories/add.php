<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <!--h4 class="heading"><?= __('Actions') ?></h4>-->
            <!--<?= $this->Html->link(__('Lista de Categorías'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>  -->
        </div>
    </aside>
    <div class="column column-80">
        <div class="categories form content">
            <?= $this->Form->create($category) ?>
            <fieldset>
                <legend><?= __('Añadir Categoría') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nombre']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
