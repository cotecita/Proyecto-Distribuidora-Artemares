<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ImagenReceta Model
 *
 * @method \App\Model\Entity\ImagenRecetum newEmptyEntity()
 * @method \App\Model\Entity\ImagenRecetum newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ImagenRecetum> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ImagenRecetum get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ImagenRecetum findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ImagenRecetum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ImagenRecetum> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ImagenRecetum|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ImagenRecetum saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ImagenRecetum>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagenRecetum>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagenRecetum>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagenRecetum> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagenRecetum>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagenRecetum>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagenRecetum>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagenRecetum> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ImagenRecetaTable extends Table
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

        $this->setTable('imagen_receta');
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
            ->integer('id_receta')
            ->requirePresence('id_receta', 'create')
            ->notEmptyString('id_receta');

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
