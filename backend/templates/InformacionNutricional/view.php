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
            <?= $this->Html->link(__('Edit Informacion Nutricional'), ['action' => 'edit', $informacionNutricional->id_info], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Informacion Nutricional'), ['action' => 'delete', $informacionNutricional->id_info], ['confirm' => __('Are you sure you want to delete # {0}?', $informacionNutricional->id_info), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Informacion Nutricional'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Informacion Nutricional'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="informacionNutricional view content">
            <h3><?= h($informacionNutricional->id_info) ?></h3>
            <table>
                <tr>
                    <th><?= __('Medicion') ?></th>
                    <td><?= h($informacionNutricional->medicion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Info') ?></th>
                    <td><?= $this->Number->format($informacionNutricional->id_info) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Producto') ?></th>
                    <td><?= $this->Number->format($informacionNutricional->id_producto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Calorias') ?></th>
                    <td><?= $informacionNutricional->calorias === null ? '' : $this->Number->format($informacionNutricional->calorias) ?></td>
                </tr>
                <tr>
                    <th><?= __('Proteinas') ?></th>
                    <td><?= $informacionNutricional->proteinas === null ? '' : $this->Number->format($informacionNutricional->proteinas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Grasas Totales') ?></th>
                    <td><?= $informacionNutricional->grasas_totales === null ? '' : $this->Number->format($informacionNutricional->grasas_totales) ?></td>
                </tr>
                <tr>
                    <th><?= __('Carbohidratos') ?></th>
                    <td><?= $informacionNutricional->carbohidratos === null ? '' : $this->Number->format($informacionNutricional->carbohidratos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sodio') ?></th>
                    <td><?= $informacionNutricional->sodio === null ? '' : $this->Number->format($informacionNutricional->sodio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Colesterol') ?></th>
                    <td><?= $informacionNutricional->colesterol === null ? '' : $this->Number->format($informacionNutricional->colesterol) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>