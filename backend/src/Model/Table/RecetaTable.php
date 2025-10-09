<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Receta Model
 *
 * @property \App\Model\Table\ProductoTable&\Cake\ORM\Association\BelongsToMany $Producto
 *
 * @method \App\Model\Entity\Recetum newEmptyEntity()
 * @method \App\Model\Entity\Recetum newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Recetum> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recetum get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Recetum findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Recetum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Recetum> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recetum|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Recetum saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Recetum>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recetum>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recetum>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recetum> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recetum>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recetum>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recetum>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recetum> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RecetaTable extends Table
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

        $this->setTable('receta');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id_receta');

        $this->belongsToMany('Producto', [
            'foreignKey' => 'recetum_id',
            'targetForeignKey' => 'producto_id',
            'joinTable' => 'receta_producto',
        ]);
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
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('descripcion')
            ->allowEmptyString('descripcion');

        $validator
            ->scalar('ingredientes')
            ->allowEmptyString('ingredientes');

        return $validator;
    }
}
