<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categoria Model
 *
 * @method \App\Model\Entity\Categoria newEmptyEntity()
 * @method \App\Model\Entity\Categoria newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Categoria> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Categoria get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Categoria findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Categoria patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Categoria> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Categoria|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Categoria saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Categoria>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Categoria>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Categoria>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Categoria> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Categoria>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Categoria>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Categoria>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Categoria> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CategoriaTable extends Table
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

        $this->setTable('categoria');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id_categoria');
        $this->setEntityClass('App\Model\Entity\Categoria');
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
            ->scalar('nombre')
            ->maxLength('nombre', 50)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        return $validator;
    }
}
