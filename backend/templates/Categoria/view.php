<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorium $categorium
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Categorium'), ['action' => 'edit', $categorium->id_categoria], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Categorium'), ['action' => 'delete', $categorium->id_categoria], ['confirm' => __('Are you sure you want to delete # {0}?', $categorium->id_categoria), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categoria'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Categorium'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="categoria view content">
            <h3><?= h($categorium->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($categorium->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Categoria') ?></th>
                    <td><?= $this->Number->format($categorium->id_categoria) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>