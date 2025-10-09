<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InformacionNutricional> $informacionNutricional
 */
?>
<div class="informacionNutricional index content">
    <?= $this->Html->link(__('New Informacion Nutricional'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Informacion Nutricional') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_info') ?></th>
                    <th><?= $this->Paginator->sort('id_producto') ?></th>
                    <th><?= $this->Paginator->sort('medicion') ?></th>
                    <th><?= $this->Paginator->sort('calorias') ?></th>
                    <th><?= $this->Paginator->sort('proteinas') ?></th>
                    <th><?= $this->Paginator->sort('grasas_totales') ?></th>
                    <th><?= $this->Paginator->sort('carbohidratos') ?></th>
                    <th><?= $this->Paginator->sort('sodio') ?></th>
                    <th><?= $this->Paginator->sort('colesterol') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacionNutricional as $informacionNutricional): ?>
                <tr>
                    <td><?= $this->Number->format($informacionNutricional->id_info) ?></td>
                    <td><?= $this->Number->format($informacionNutricional->id_producto) ?></td>
                    <td><?= h($informacionNutricional->medicion) ?></td>
                    <td><?= $informacionNutricional->calorias === null ? '' : $this->Number->format($informacionNutricional->calorias) ?></td>
                    <td><?= $informacionNutricional->proteinas === null ? '' : $this->Number->format($informacionNutricional->proteinas) ?></td>
                    <td><?= $informacionNutricional->grasas_totales === null ? '' : $this->Number->format($informacionNutricional->grasas_totales) ?></td>
                    <td><?= $informacionNutricional->carbohidratos === null ? '' : $this->Number->format($informacionNutricional->carbohidratos) ?></td>
                    <td><?= $informacionNutricional->sodio === null ? '' : $this->Number->format($informacionNutricional->sodio) ?></td>
                    <td><?= $informacionNutricional->colesterol === null ? '' : $this->Number->format($informacionNutricional->colesterol) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $informacionNutricional->id_info]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $informacionNutricional->id_info]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $informacionNutricional->id_info],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $informacionNutricional->id_info),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>