<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ControllerFunc Model
 *
 * @property \App\Model\Table\AccessTable&\Cake\ORM\Association\HasMany $Access
 *
 * @method \App\Model\Entity\ControllerFunc newEmptyEntity()
 * @method \App\Model\Entity\ControllerFunc newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ControllerFunc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ControllerFunc get($primaryKey, $options = [])
 * @method \App\Model\Entity\ControllerFunc findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ControllerFunc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ControllerFunc[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ControllerFunc|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ControllerFunc saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ControllerFunc[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ControllerFunc[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ControllerFunc[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ControllerFunc[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ControllerFuncTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('controller_func');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Access', [
            'foreignKey' => 'controller_func_id',
        ]);
        $this->addBehavior('Elastic/ActivityLogger.Logger', [
            'scope' => [
                'ControllerFunc',
                'Access',
            ],
        ]);
        
        
        $this->addBehavior('Search.Search');
        
        $this->searchManager()
            ->value('id')
            // Here we will alias the 'q' query param to search the `Articles.title`
            // field and the `Articles.content` field, using a LIKE match, with `%`
            // both before and after.
            ->add('q', 'Search.Like', [
                'before' => true,
                'after' => true,
                'fieldMode' => 'OR',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'fields' => ['controller', 'func'],
            ])
            ->add('foo', 'Search.Callback', [
                'callback' => function (\Cake\ORM\Query $query, array $args, \Search\Model\Filter\Base $filter) {
                    // Modify $query as required
                }
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
            ->scalar('controller')
            ->maxLength('controller', 255)
            ->notEmptyString('controller');

        $validator
            ->scalar('func')
            ->maxLength('func', 255)
            ->notEmptyString('func');

        return $validator;
    }
}
