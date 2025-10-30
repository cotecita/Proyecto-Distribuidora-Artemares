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
    <title><?= $cakeDescription ?>: <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!-- Navbar principal -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= $this->Url->build('/products') ?>">Artemares</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build('/products') ?>">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build('/categories') ?>">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build('/recipes') ?>">Recetas</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build('/orders') ?>">Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build('/nutritional-informations') ?>">Info Nutricional</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build('/administrators') ?>">Administrador</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor principal -->
    <main class="container mt-4">
        <?= $this->Flash->render() ?> <!-- Mensajes de éxito/error -->
        <?= $this->fetch('content') ?> <!-- Aquí se renderizan las vistas específicas -->
    </main>

    <!-- Footer simple -->
    <footer class="bg-light text-center py-3 mt-4">
        &copy; <?= date('Y') ?> Distribuidora Artemares. Todos los derechos reservados.
    </footer>

    <!-- Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
