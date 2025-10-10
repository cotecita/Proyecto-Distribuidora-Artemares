<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Receta Entity
 *
 * @property int $id_receta
 * @property string $nombre
 * @property string|null $descripcion
 * @property string|null $ingredientes
 *
 * @property \App\Model\Entity\Producto[] $producto
 */
class Receta extends Entity
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
        'ingredientes' => true,
        'producto' => true,
    ];
}
