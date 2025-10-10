<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Receta $receta
 * @var string[]|\Cake\Collection\CollectionInterface $producto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $receta->id_receta],
                ['confirm' => __('Are you sure you want to delete # {0}?', $receta->id_receta), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Receta'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="receta form content">
            <?= $this->Form->create($receta) ?>
            <fieldset>
                <legend><?= __('Edit Receta') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('ingredientes');
                    echo $this->Form->control('producto._ids', ['options' => $producto]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
