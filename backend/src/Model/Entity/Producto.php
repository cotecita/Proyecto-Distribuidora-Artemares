<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producto Entity
 *
 * @property int $id_producto
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $precio
 * @property int $stock
 * @property string $cantidad_formato
 * @property string $formato
 * @property int $id_categoria
 *
 * @property \App\Model\Entity\Receta[] $receta
 */
class Producto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nombre' => true,
        'descripcion' => true,
        'precio' => true,
        'stock' => true,
        'cantidad_formato' => true,
        'formato' => true,
        'id_categoria' => true,
        'receta' => true,
    ];
}
