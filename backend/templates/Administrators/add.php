<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrator $administrator
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <!--<h4 class="heading"><?= __('Actions') ?></h4>-->
            <?= $this->Html->link(__('Lista de Administradores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="administrators form content">
            <?= $this->Form->create($administrator) ?>
            <fieldset>
                <legend><?= __('Añadir Administrador') ?></legend>
                <?php
                    echo $this->Form->control('username', ['label' => 'Usuario']);
                    echo $this->Form->control('password', ['label' => 'Contraseña']);
                    echo $this->Form->control('email', ['label' => 'Correo']);
                    echo $this->Form->control('full_name', ['label' => 'Nombre']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
