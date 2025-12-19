<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CashBalance $cashBalance
 * @var float $expectedAmount
 */
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Cuadratura de caja diaria</h5>
                </div>

                <div class="card-body">

                    <div class="alert alert-info">
                        <strong>Monto total  de ventas diarias:</strong>
                        <?= $this->Number->currency($expectedAmount, 'CLP') ?>
                    </div>

                    <?= $this->Form->create($cashBalance) ?>

                    <div class="mb-3">
                        <?= $this->Form->control('actual_amount', [
                            'label' => 'Monto actual en caja',
                            'type' => 'number',
                            'step' => '0.01',
                            'required' => true,
                            'class' => 'form-control'
                        ]) ?>
                    </div>

                    <div class="mb-3">
                        <?= $this->Form->control('balance_date', [
                            'label' => 'Fecha',
                            'type' => 'date',
                            'required' => true,
                            'class' => 'form-control'
                        ]) ?>
                    </div>

                    <div class="mb-3">
                        <?= $this->Form->control('description', [
                            'label' => 'Descripción',
                            'type' => 'textarea',
                            'rows' => 3,
                            'class' => 'form-control'
                        ]) ?>
                    </div>

                    <div class="d-grid">
                        <?= $this->Form->button(__('Guardar'), [
                            'class' => 'btn btn-success'
                        ]) ?>
                    </div>

                    <?= $this->Form->end() ?>
                </div>
            </div>

        </div>
    </div>
</div>
