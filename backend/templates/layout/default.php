<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?= $this->fetch('title') ?> | Panel Administrador - Artemares
    </title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos personalizados opcionales -->
    <style>
        body {
            background-color: #F7FAFC;
            font-family: "Segoe UI", sans-serif;
            color: #212529;
        }

        /* === SIDEBAR === */
        .sidebar {
            min-height: 100vh;
            background-color: #0E1B2B; /* azul marino oscuro */
        }

        .navbar-brand img {
            filter: drop-shadow(0 0 6px rgba(0, 159, 227, 0.5));
        }

        .sidebar a {
            color: #E9EEF2;
            text-decoration: none;
            display: block;
            padding: 12px 18px;
            border-radius: 6px;
            margin: 4px 0;
            transition: 0.25s;
        }

        .sidebar a:not(.navbar-brand):hover,
        .sidebar a:not(.navbar-brand).active {
            background: linear-gradient(90deg, #009FE3 0%, #4CC3FF 100%);
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 159, 227, 0.4);
        }

        /* === NAVBAR SUPERIOR === */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
        }

        .navbar-text {
            color: #4a5568;
        }

        /* === BOTONES === */
        .btn-primary {
            background: linear-gradient(90deg, #009FE3 0%, #4CC3FF 100%);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #0088c7 0%, #36b2f9 100%);
        }

        /* === TABLAS === */
        .table thead {
            background: linear-gradient(90deg, #009FE3 0%, #4CC3FF 100%);
            color: white;
        }

        main {
            padding: 2rem;
        }
    </style>



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar lateral -->
        <nav class="sidebar d-flex flex-column p-3">
            <div class="navbar-brand d-flex justify-content-center mb-5 mt-3 user-select-none" style="cursor: default;">
                <?= $this->Html->image('Logosinfondo.png', [
                    'alt' => 'Artemares',
                    'style' => '
                        max-height: 40px;
                        width: auto;
                        object-fit: contain;
                        pointer-events: none;
                        user-select: none;
                    '
                ]) ?>
            </div>

            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']) ?>" 
               class="<?= $this->request->getParam('controller') === 'Products' ? 'active' : '' ?>">
               <i class="bi bi-box-seam me-2"></i>Productos
            </a>

            <a href="<?= $this->Url->build(['controller' => 'Categories', 'action' => 'index']) ?>" 
               class="<?= $this->request->getParam('controller') === 'Categories' ? 'active' : '' ?>">
               <i class="bi bi-tags me-2"></i>Categorías
            </a>

            <a href="<?= $this->Url->build(['controller' => 'Recipes', 'action' => 'index']) ?>" 
               class="<?= $this->request->getParam('controller') === 'Recipes' ? 'active' : '' ?>">
               <i class="bi bi-journal-text me-2"></i>Recetas
            </a>

            <a href="<?= $this->Url->build(['controller' => 'Orders', 'action' => 'index']) ?>" 
               class="<?= $this->request->getParam('controller') === 'Orders' ? 'active' : '' ?>">
               <i class="bi bi-cart-check me-2"></i>Pedidos
            </a>

            <a href="<?= $this->Url->build(['controller' => 'NutritionalInformations', 'action' => 'index']) ?>" 
               class="<?= $this->request->getParam('controller') === 'NutritionalInformations' ? 'active' : '' ?>">
               <i class="bi bi-info-circle me-2"></i>Info Nutricional
            </a>

            <a href="<?= $this->Url->build(['controller' => 'Administrators', 'action' => 'index']) ?>" 
               class="<?= $this->request->getParam('controller') === 'Administrators' ? 'active' : '' ?>">
               <i class="bi bi-person-gear me-2"></i>Administrador
            </a>
        </nav>

        <!-- Contenido principal -->
        <div class="flex-grow-1">
            <!-- Navbar superior -->
            <nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">
                <div class="container-fluid">
                    <span class="navbar-text text-muted">
                        <i class="bi bi-speedometer2 me-2"></i>Panel de Administración
                    </span>
                    <div class="d-flex align-items-center">
                        <span class="text-secondary me-3">
                            <i class="bi bi-person-circle me-1"></i>Admin
                        </span>
                        <?= $this->Form->postLink(
                            '<i class="bi bi-box-arrow-right"></i> Salir',
                            ['controller' => 'Administrators', 'action' => 'logout'],
                            [
                                'class' => 'btn btn-outline-danger btn-sm',
                                'escape' => false, // para que el ícono se renderice como HTML
                                'confirm' => '¿Seguro que quieres cerrar sesión?'
                            ]
                        ) ?>

                    </div>
                </div>
            </nav>

            <!-- Contenedor del contenido renderizado -->
            <main>
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </main>
        </div>
    </div>
</body>
</html>
