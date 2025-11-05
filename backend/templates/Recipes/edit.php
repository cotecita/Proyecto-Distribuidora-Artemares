<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recipe->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Recipes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="recipes form content">
            <?= $this->Form->create($recipe, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Recipe') ?></legend>
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
                ?>
                
                <!--para agregar/Actualizar imagen-->
                <?php    
                    if (!empty($recipe->recipe_image)): ?>
                        <div style="margin-bottom:10px;">
                            <strong>Imagen actual:</strong><br>
                            <img src="data:<?= h($recipe->recipe_image->mime_type_medium) ?>;base64,<?= base64_encode(stream_get_contents($recipe->recipe_image->image_medium)) ?>" 
                                alt="Imagen del producto" style="max-width:200px; border-radius:10px;">
                        </div>
                    <?php endif; 
                ?>
                <?php
                    echo $this->Form->control('image_file', [
                        'type' => 'file',
                        'label' => 'Cambiar imagen del producto',
                    ]);

                    // Checkbox para quitar imagen existente
                    if (!empty($recipe->recipe_image)) {
                        echo $this->Form->control('remove_image', [
                            'type' => 'checkbox',
                            'label' => 'Quitar imagen actual',
                        ]);
                    }
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
