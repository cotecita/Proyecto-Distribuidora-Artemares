<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ImagenProducto Model
 *
 * @method \App\Model\Entity\ImagenProducto newEmptyEntity()
 * @method \App\Model\Entity\ImagenProducto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ImagenProducto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ImagenProducto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ImagenProducto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ImagenProducto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ImagenProducto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ImagenProducto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ImagenProducto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ImagenProducto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagenProducto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagenProducto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagenProducto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagenProducto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagenProducto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagenProducto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagenProducto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ImagenProductoTable extends Table
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

        $this->setTable('imagen_producto');
        $this->setDisplayField('url_small');
        $this->setPrimaryKey('id_imagen');
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
            ->notEmptyString('id_producto');

        $validator
            ->scalar('url_small')
            ->maxLength('url_small', 255)
            ->requirePresence('url_small', 'create')
            ->notEmptyString('url_small');

        $validator
            ->scalar('url_medium')
            ->maxLength('url_medium', 255)
            ->requirePresence('url_medium', 'create')
            ->notEmptyString('url_medium');

        $validator
            ->scalar('url_grande')
            ->maxLength('url_grande', 255)
            ->requirePresence('url_grande', 'create')
            ->notEmptyString('url_grande');

        return $validator;
    }
}
