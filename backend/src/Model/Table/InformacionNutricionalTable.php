<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InformacionNutricional Model
 *
 * @method \App\Model\Entity\InformacionNutricional newEmptyEntity()
 * @method \App\Model\Entity\InformacionNutricional newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\InformacionNutricional> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InformacionNutricional get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\InformacionNutricional findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\InformacionNutricional patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\InformacionNutricional> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InformacionNutricional|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\InformacionNutricional saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\InformacionNutricional>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformacionNutricional>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InformacionNutricional>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformacionNutricional> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InformacionNutricional>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformacionNutricional>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InformacionNutricional>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformacionNutricional> deleteManyOrFail(iterable $entities, array $options = [])
 */
class InformacionNutricionalTable extends Table
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

        $this->setTable('informacion_nutricional');
        $this->setDisplayField('id_info');
        $this->setPrimaryKey('id_info');
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
            ->integer('id_producto')
            ->requirePresence('id_producto', 'create')
            ->notEmptyString('id_producto')
            ->add('id_producto', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('medicion')
            ->maxLength('medicion', 100)
            ->allowEmptyString('medicion');

        $validator
            ->decimal('calorias')
            ->allowEmptyString('calorias');

        $validator
            ->decimal('proteinas')
            ->allowEmptyString('proteinas');

        $validator
            ->decimal('grasas_totales')
            ->allowEmptyString('grasas_totales');

        $validator
            ->decimal('carbohidratos')
            ->allowEmptyString('carbohidratos');

        $validator
            ->decimal('sodio')
            ->allowEmptyString('sodio');

        $validator
            ->decimal('colesterol')
            ->allowEmptyString('colesterol');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['id_producto']), ['errorField' => 'id_producto']);

        return $rules;
    }
}
