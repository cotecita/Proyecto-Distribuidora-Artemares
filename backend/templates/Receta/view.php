<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Receta $receta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Receta'), ['action' => 'edit', $receta->id_receta], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Receta'), ['action' => 'delete', $receta->id_receta], ['confirm' => __('Are you sure you want to delete # {0}?', $receta->id_receta), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Receta'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Receta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="receta view content">
            <h3><?= h($receta->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($receta->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Receta') ?></th>
                    <td><?= $this->Number->format($receta->id_receta) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($receta->descripcion)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Ingredientes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($receta->ingredientes)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Producto') ?></h4>
                <?php if (!empty($receta->producto)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id Producto') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Precio') ?></th>
                            <th><?= __('Stock') ?></th>
                            <th><?= __('Cantidad Formato') ?></th>
                            <th><?= __('Formato') ?></th>
                            <th><?= __('Id Categoria') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($receta->producto as $producto) : ?>
                        <tr>
                            <td><?= h($producto->id_producto) ?></td>
                            <td><?= h($producto->nombre) ?></td>
                            <td><?= h($producto->descripcion) ?></td>
                            <td><?= h($producto->precio) ?></td>
                            <td><?= h($producto->stock) ?></td>
                            <td><?= h($producto->cantidad_formato) ?></td>
                            <td><?= h($producto->formato) ?></td>
                            <td><?= h($producto->id_categoria) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Producto', 'action' => 'view', $producto->id_producto]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Producto', 'action' => 'edit', $producto->id_producto]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Producto', 'action' => 'delete', $producto->id_producto],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $producto->id_producto),
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