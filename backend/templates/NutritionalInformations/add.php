<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NutritionalInformation $nutritionalInformation
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Nutritional Informations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nutritionalInformations form content">
            <?= $this->Form->create($nutritionalInformation) ?>
            <fieldset>
                <legend><?= __('Add Nutritional Information') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('measurement');
                    echo $this->Form->control('calories');
                    echo $this->Form->control('protein');
                    echo $this->Form->control('total_fat');
                    echo $this->Form->control('carbohydrates');
                    echo $this->Form->control('sodium');
                    echo $this->Form->control('cholesterol');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
