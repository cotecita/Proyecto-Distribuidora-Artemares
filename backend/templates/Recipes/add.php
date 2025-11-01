<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="recipes form content">
            <?= $this->Form->create($recipe, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Recipe') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('ingredients');
                    #echo $this->Form->control('products._ids', ['options' => $products]);
                    echo $this->Form->control('products._ids', [
                        'multiple' => 'checkbox',
                        'options' => $products,
                        'label' => 'Productos relacionados',
                    ]);

                    // campo para la imagen
                    echo $this->Form->control('image_file', [
                        'type' => 'file',
                        'label' => 'Imagen del producto',
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
