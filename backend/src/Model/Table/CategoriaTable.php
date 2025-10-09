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
 * @method \App\Model\Entity\Categorium newEmptyEntity()
 * @method \App\Model\Entity\Categorium newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Categorium> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Categorium get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Categorium findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Categorium patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Categorium> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Categorium|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Categorium saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Categorium>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Categorium>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Categorium>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Categorium> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Categorium>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Categorium>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Categorium>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Categorium> deleteManyOrFail(iterable $entities, array $options = [])
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
