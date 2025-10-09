<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecetaProducto Model
 *
 * @method \App\Model\Entity\RecetaProducto newEmptyEntity()
 * @method \App\Model\Entity\RecetaProducto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\RecetaProducto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RecetaProducto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\RecetaProducto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\RecetaProducto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\RecetaProducto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RecetaProducto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\RecetaProducto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\RecetaProducto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecetaProducto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RecetaProducto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecetaProducto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RecetaProducto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecetaProducto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RecetaProducto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecetaProducto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RecetaProductoTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('receta_producto');
        $this->setDisplayField(['id_receta', 'id_producto']);
        $this->setPrimaryKey(['id_receta', 'id_producto']);
    }
}
