<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\NutritionalInformation> $nutritionalInformations
 */
?>
<div class="nutritionalInformations index content">
    <?= $this->Html->link(__('New Nutritional Information'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Nutritional Informations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('measurement') ?></th>
                    <th><?= $this->Paginator->sort('calories') ?></th>
                    <th><?= $this->Paginator->sort('protein') ?></th>
                    <th><?= $this->Paginator->sort('total_fat') ?></th>
                    <th><?= $this->Paginator->sort('carbohydrates') ?></th>
                    <th><?= $this->Paginator->sort('sodium') ?></th>
                    <th><?= $this->Paginator->sort('cholesterol') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
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
                        <?= $this->Html->link(__('View'), ['action' => 'view', $nutritionalInformation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nutritionalInformation->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
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