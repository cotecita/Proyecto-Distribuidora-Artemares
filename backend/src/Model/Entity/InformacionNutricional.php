<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InformacionNutricional Entity
 *
 * @property int $id_info
 * @property int $id_producto
 * @property string|null $medicion
 * @property string|null $calorias
 * @property string|null $proteinas
 * @property string|null $grasas_totales
 * @property string|null $carbohidratos
 * @property string|null $sodio
 * @property string|null $colesterol
 */
class InformacionNutricional extends Entity
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
        'id_producto' => true,
        'medicion' => true,
        'calorias' => true,
        'proteinas' => true,
        'grasas_totales' => true,
        'carbohidratos' => true,
        'sodio' => true,
        'colesterol' => true,
    ];
}
