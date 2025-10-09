<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetallePedido Entity
 *
 * @property int $id_detalle
 * @property int $id_pedido
 * @property int $id_producto
 * @property int $cantidad
 */
class DetallePedido extends Entity
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
        'id_pedido' => true,
        'id_producto' => true,
        'cantidad' => true,
    ];
}
