<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Producto'), ['action' => 'edit', $producto->id_producto], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Producto'), ['action' => 'delete', $producto->id_producto], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id_producto), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Producto'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Producto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="producto view content">
            <h3><?= h($producto->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($producto->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Formato') ?></th>
                    <td><?= h($producto->formato) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Producto') ?></th>
                    <td><?= $this->Number->format($producto->id_producto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $this->Number->format($producto->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock') ?></th>
                    <td><?= $this->Number->format($producto->stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad Formato') ?></th>
                    <td><?= $this->Number->format($producto->cantidad_formato) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Categoria') ?></th>
                    <td><?= $this->Number->format($producto->id_categoria) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($producto->descripcion)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Receta') ?></h4>
                <?php if (!empty($producto->receta)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id Receta') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Ingredientes') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($producto->receta as $recetum) : ?>
                        <tr>
                            <td><?= h($recetum->id_receta) ?></td>
                            <td><?= h($recetum->nombre) ?></td>
                            <td><?= h($recetum->descripcion) ?></td>
                            <td><?= h($recetum->ingredientes) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Receta', 'action' => 'view', $recetum->id_receta]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Receta', 'action' => 'edit', $recetum->id_receta]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Receta', 'action' => 'delete', $recetum->id_receta],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $recetum->id_receta),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>