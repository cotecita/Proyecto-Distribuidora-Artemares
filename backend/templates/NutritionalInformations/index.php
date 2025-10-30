<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\NutritionalInformation> $nutritionalInformations
 */
?>
<div class="nutritionalInformations index content">
    <?= $this->Html->link(__('Añadir Información Nutricional'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Información Nutricional') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id', ['label' => 'Producto']) ?></th>
                    <th><?= $this->Paginator->sort('measurement', ['label' => 'Medición']) ?></th>
                    <th><?= $this->Paginator->sort('calories', ['label' => 'Calorías']) ?></th>
                    <th><?= $this->Paginator->sort('protein', ['label' => 'Proteína']) ?></th>
                    <th><?= $this->Paginator->sort('total_fat', ['label' => 'Grasas Totales']) ?></th>
                    <th><?= $this->Paginator->sort('carbohydrates', ['label' => 'Carbohidratos']) ?></th>
                    <th><?= $this->Paginator->sort('sodium', ['label' => 'Sodio']) ?></th>
                    <th><?= $this->Paginator->sort('cholesterol', ['label' => 'Colesterol']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Creada']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Modificada']) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nutritionalInformations as $nutritionalInformation): ?>
                <tr>
                    <td><?= $this->Number->format($nutritionalInformation->id) ?></td>
                    <td><?= $nutritionalInformation->hasValue('product') ? $this->Html->link($nutritionalInformation->product->name, ['controller' => 'Products', 'action' => 'view', $nutritionalInformation->product->id]) : '' ?></td>
                    <td><?= h($nutritionalInformation->measurement) ?></td>
                    <td><?= $nutritionalInformation->calories === null ? '' : $this->Number->format($nutritionalInformation->calories) ?></td>
                    <td><?= $nutritionalInformation->protein === null ? '' : $this->Number->format($nutritionalInformation->protein) ?></td>
                    <td><?= $nutritionalInformation->total_fat === null ? '' : $this->Number->format($nutritionalInformation->total_fat) ?></td>
                    <td><?= $nutritionalInformation->carbohydrates === null ? '' : $this->Number->format($nutritionalInformation->carbohydrates) ?></td>
                    <td><?= $nutritionalInformation->sodium === null ? '' : $this->Number->format($nutritionalInformation->sodium) ?></td>
                    <td><?= $nutritionalInformation->cholesterol === null ? '' : $this->Number->format($nutritionalInformation->cholesterol) ?></td>
                    <td><?= h($nutritionalInformation->created) ?></td>
                    <td><?= h($nutritionalInformation->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $nutritionalInformation->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $nutritionalInformation->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $nutritionalInformation->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $nutritionalInformation->id),
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