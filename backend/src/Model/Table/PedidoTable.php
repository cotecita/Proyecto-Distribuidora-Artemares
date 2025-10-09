<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedido Model
 *
 * @method \App\Model\Entity\Pedido newEmptyEntity()
 * @method \App\Model\Entity\Pedido newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pedido> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pedido get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pedido findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pedido> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pedido saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pedido>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pedido> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pedido>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pedido>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pedido> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PedidoTable extends Table
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

        $this->setTable('pedido');
        $this->setDisplayField('estado');
        $this->setPrimaryKey('id_pedido');
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
            ->dateTime('fecha')
            ->allowEmptyDateTime('fecha');

        $validator
            ->scalar('estado')
            ->notEmptyString('estado');

        return $validator;
    }
}
