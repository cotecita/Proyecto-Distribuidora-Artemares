<?php
/**
 * Plantilla base para Distribuidora Artemares
 * Incluye menú principal y contenedor de contenido
 */

$cakeDescription = 'Distribuidora Artemares';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?> | Artemares</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')) ?>

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f6f9fc;
            overflow-x: hidden;
            font-family: "Inter", sans-serif;
        }

        /* Fija el scrollbar para que no desaparezca con modales */
        body.modal-open {
            overflow-y: scroll !important;
            padding-right: 0 !important;
        }

        .sidebar {
            width: 250px;
            background-color: #07152b;
            color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 1.5rem 0.9rem;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .sidebar .logo img {
            width: 85%;
            max-height: 75px;
            filter: drop-shadow(0 0 8px rgba(0, 174, 255, 0.4));
        }

        .sidebar .nav-link {
            color: #d0d8e6;
            border-radius: 10px;
            padding: 0.7rem 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s ease-in-out;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(0, 174, 255, 0.1);
            color: #fff;
        }

        .sidebar .nav-link.active {
            background: linear-gradient(90deg, #009dff, #36b5ff);
            color: #fff;
            box-shadow: inset 2px 0 0 #00aaff, 0 0 8px rgba(0, 170, 255, 0.3);
        }

        .topbar {
            height: 65px;
            background: #fff;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: fixed;
            left: 250px;
            right: 0;
            top: 0;
            z-index: 100;
        }

        .main-content {
            margin-left: 250px;
            padding: 90px 2rem 2rem;
            width: calc(100% - 250px);
        }

        footer {
            text-align: center;
            padding: 1.5rem;
            color: #7b8ba3;
            font-size: 0.9rem;
            margin-top: 4rem;
        }
    </style>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <?= $this->Html->image('Logosinfondo.png', ['alt' => 'Artemares']) ?>
        </div>

        <nav>
            <?php $controller = $this->request->getParam('controller'); ?>

            <?= $this->Html->link('<i class="bi bi-box"></i> Productos',
                ['controller' => 'Products', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link' . ($controller === 'Products' ? ' active' : '')]) ?>

            <?= $this->Html->link('<i class="bi bi-tags"></i> Categorías',
                ['controller' => 'Categories', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link' . ($controller === 'Categories' ? ' active' : '')]) ?>

            <?= $this->Html->link('<i class="bi bi-journal-text"></i> Recetas',
                ['controller' => 'Recipes', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link' . ($controller === 'Recipes' ? ' active' : '')]) ?>

            <?= $this->Html->link('<i class="bi bi-cart4"></i> Pedidos',
                ['controller' => 'Orders', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link' . ($controller === 'Orders' ? ' active' : '')]) ?>

            <?= $this->Html->link('<i class="bi bi-info-circle"></i> Info Nutricional',
                ['controller' => 'NutritionalInformations', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link' . ($controller === 'NutritionalInformations' ? ' active' : '')]) ?>

            <?= $this->Html->link('<i class="bi bi-person-gear"></i> Administrador',
                ['controller' => 'Administrators', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link' . ($controller === 'Administrators' ? ' active' : '')]) ?>
        </nav>
    </aside>

    <!-- Topbar -->
    <header class="topbar">
        <h6>Panel de Administración</h6>
        <div>
            <span class="me-3"><i class="bi bi-person-circle"></i> Admin</span>
            <a href="#" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Salir
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <footer>
            © <?= date('Y') ?> Artemares — Todos los derechos reservados
        </footer>
    </main>

    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle me-2"></i> Confirmar eliminación</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <p class="mb-0 fs-5">¿Estás seguro de eliminar este elemento?</p>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="confirmOkBtn" class="btn btn-danger px-4">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script de confirmación -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
        const okBtn = document.getElementById('confirmOkBtn');
        let deleteUrl = null;

        // Interceptar los enlaces de eliminación
        document.querySelectorAll('.delete-link').forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                deleteUrl = link.getAttribute('href');
                modal.show();
            });
        });

        // Enviar formulario POST manualmente
        okBtn.addEventListener('click', () => {
            if (deleteUrl) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;

                const csrf = document.querySelector('meta[name="csrfToken"]');
                if (csrf) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = '_csrfToken';
                    input.value = csrf.getAttribute('content');
                    form.appendChild(input);
                }

                document.body.appendChild(form);
                form.submit();
                deleteUrl = null;
            }
            modal.hide();
        });

        // Evita que Bootstrap mueva el contenido por el scrollbar
        const modalEl = document.getElementById('confirmModal');
        modalEl.addEventListener('show.bs.modal', () => {
            document.body.style.paddingRight = '0px';
        });
        modalEl.addEventListener('hidden.bs.modal', () => {
            document.body.style.paddingRight = '0px';
        });
    });
    </script>

</body>
</html>

