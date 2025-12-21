<?php
/**
 * Vista: Editar Categoría
 * Usa el elemento form_card.php estilo Artemares
 */
?>

<?= $this->element('form_card', [
    'form' => $this->Form,
    'entity' => $cashBalance,
    'fields' => ['actual_amount', 'description'],
    'title' => 'Editar Cuadratura de caja',
    'icon' => 'bi-pencil-square',
    'actionLabel' => 'Actualizar',
]) ?>