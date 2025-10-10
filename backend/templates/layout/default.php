<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        /* Menú superior fijo */
        nav.top-nav {
            background-color: #1e293b;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav.top-nav a {
            color: #f8fafc;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        nav.top-nav a:hover {
            color: #38bdf8;
        }

        nav.top-nav .brand {
            font-size: 1.3rem;
            font-weight: bold;
        }

        main.main {
            margin-top: 80px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            color: #94a3b8;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <nav class="top-nav">
        <div class="brand">
            <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index']) ?>">Artemares</a>
        </div>
        <div class="links">
            <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index']) ?>">Inicio</a>
            <a href="<?= $this->Url->build(['controller' => 'Producto', 'action' => 'index']) ?>">Productos</a>
            <a href="<?= $this->Url->build(['controller' => 'Receta', 'action' => 'index']) ?>">Recetas</a>
            <a href="<?= $this->Url->build(['controller' => 'Pedido', 'action' => 'index']) ?>">Pedidos</a>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
