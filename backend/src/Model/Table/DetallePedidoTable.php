<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetallePedido Model
 *
 * @method \App\Model\Entity\DetallePedido newEmptyEntity()
 * @method \App\Model\Entity\DetallePedido newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DetallePedido> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetallePedido get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DetallePedido findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DetallePedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DetallePedido> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetallePedido|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DetallePedido saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DetallePedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetallePedido>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetallePedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetallePedido> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetallePedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetallePedido>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetallePedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetallePedido> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DetallePedidoTable extends Table
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

        $this->setTable('detalle_pedido');
        $this->setDisplayField('id_detalle');
        $this->setPrimaryKey('id_detalle');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id_pedido')
            ->requirePresence('id_pedido', 'create')
            ->notEmptyString('id_pedido');

        $validator
            ->integer('id_producto')
            ->requirePresence('id_producto', 'create')
            ->notEmptyString('id_producto');

        $validator
            ->integer('cantidad')
            ->requirePresence('cantidad', 'create')
            ->notEmptyString('cantidad');

        return $validator;
    }
}
