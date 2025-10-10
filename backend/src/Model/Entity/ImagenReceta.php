<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ImagenReceta Entity
 *
 * @property int $id_imagen
 * @property int $id_receta
 * @property string $url_small
 * @property string $url_medium
 * @property string $url_grande
 */
class ImagenReceta extends Entity
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
        'id_receta' => true,
        'url_small' => true,
        'url_medium' => true,
        'url_grande' => true,
    ];
}
