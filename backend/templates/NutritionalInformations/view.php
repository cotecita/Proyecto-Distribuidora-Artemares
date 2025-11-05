<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NutritionalInformation $nutritionalInformation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Nutritional Information'), ['action' => 'edit', $nutritionalInformation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Nutritional Information'), ['action' => 'delete', $nutritionalInformation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nutritionalInformation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Nutritional Informations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Nutritional Information'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="nutritionalInformations view content">
            <h3><?= h($nutritionalInformation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $nutritionalInformation->hasValue('product') ? $this->Html->link($nutritionalInformation->product->name, ['controller' => 'Products', 'action' => 'view', $nutritionalInformation->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Measurement') ?></th>
                    <td><?= h($nutritionalInformation->measurement) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($nutritionalInformation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Calories') ?></th>
                    <td><?= $nutritionalInformation->calories === null ? '' : $this->Number->format($nutritionalInformation->calories) ?></td>
                </tr>
                <tr>
                    <th><?= __('Protein') ?></th>
                    <td><?= $nutritionalInformation->protein === null ? '' : $this->Number->format($nutritionalInformation->protein) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Fat') ?></th>
                    <td><?= $nutritionalInformation->total_fat === null ? '' : $this->Number->format($nutritionalInformation->total_fat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Carbohydrates') ?></th>
                    <td><?= $nutritionalInformation->carbohydrates === null ? '' : $this->Number->format($nutritionalInformation->carbohydrates) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sodium') ?></th>
                    <td><?= $nutritionalInformation->sodium === null ? '' : $this->Number->format($nutritionalInformation->sodium) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cholesterol') ?></th>
                    <td><?= $nutritionalInformation->cholesterol === null ? '' : $this->Number->format($nutritionalInformation->cholesterol) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($nutritionalInformation->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($nutritionalInformation->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>