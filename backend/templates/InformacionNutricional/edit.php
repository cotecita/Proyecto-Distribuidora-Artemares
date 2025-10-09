<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformacionNutricional $informacionNutricional
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $informacionNutricional->id_info],
                ['confirm' => __('Are you sure you want to delete # {0}?', $informacionNutricional->id_info), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Informacion Nutricional'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="informacionNutricional form content">
            <?= $this->Form->create($informacionNutricional) ?>
            <fieldset>
                <legend><?= __('Edit Informacion Nutricional') ?></legend>
                <?php
                    echo $this->Form->control('id_producto');
                    echo $this->Form->control('medicion');
                    echo $this->Form->control('calorias');
                    echo $this->Form->control('proteinas');
                    echo $this->Form->control('grasas_totales');
                    echo $this->Form->control('carbohidratos');
                    echo $this->Form->control('sodio');
                    echo $this->Form->control('colesterol');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
