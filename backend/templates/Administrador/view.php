<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Administrador'), ['action' => 'edit', $administrador->id_admin], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Administrador'), ['action' => 'delete', $administrador->id_admin], ['confirm' => __('Are you sure you want to delete # {0}?', $administrador->id_admin), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Administrador'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Administrador'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="administrador view content">
            <h3><?= h($administrador->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($administrador->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($administrador->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre Completo') ?></th>
                    <td><?= h($administrador->nombre_completo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Admin') ?></th>
                    <td><?= $this->Number->format($administrador->id_admin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($administrador->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>