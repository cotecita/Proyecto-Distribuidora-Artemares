<h1><?= h($title) ?></h1>
<div class="container mt-5">
    
    <div class="links mt-4">
        <a href="<?= $this->Url->build(['controller' => 'Categoria', 'action' => 'index']) ?>" class="btn btn-primary"> Categorías</a>
        <a href="<?= $this->Url->build(['controller' => 'Producto', 'action' => 'index']) ?>" class="btn btn-primary"> Productos</a>
        <a href="<?= $this->Url->build(['controller' => 'Receta', 'action' => 'index']) ?>" class="btn btn-success"> Recetas</a>
        <a href="<?= $this->Url->build(['controller' => 'Pedido', 'action' => 'index']) ?>" class="btn btn-warning"> Pedidos</a>
    </div>

    <footer class="mt-5 text-muted">
        <small>Sistema de administración &copy; <?= date('Y') ?></small>
    </footer>
</div>

<style>
    .container {
        text-align: center;
        font-family: Arial, sans-serif;
    }
    .btn {
        display: inline-block;
        margin: 10px;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        color: white;
    }
    .btn-primary { background-color: #007bff; }
    .btn-success { background-color: #28a745; }
    .btn-warning { background-color: #ffc107; color: black; }
</style>