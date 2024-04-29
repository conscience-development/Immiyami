<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActivityLogs Model
 *
 * @property \App\Model\Table\ScopesTable&\Cake\ORM\Association\BelongsTo $Scopes
 * @property \App\Model\Table\IssuersTable&\Cake\ORM\Association\BelongsTo $Issuers
 * @property \App\Model\Table\ObjectsTable&\Cake\ORM\Association\BelongsTo $Objects
 *
 * @method \App\Model\Entity\ActivityLog newEmptyEntity()
 * @method \App\Model\Entity\ActivityLog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ActivityLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActivityLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActivityLog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ActivityLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActivityLog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActivityLog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivityLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivityLog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ActivityLog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ActivityLog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ActivityLog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ActivityLogsTable extends Table
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

        $this->setTable('activity_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
                'fields' => ['scope_model','issuer_model','object_model','level','action','data'],
            ])
            ->add('foo', 'Search.Callback', [
                'callback' => function (\Cake\ORM\Query $query, array $args, \Search\Model\Filter\Base $filter) {
                    // Modify $query as required
                }
            ]);

        $this->belongsTo('Scopes', [
            'foreignKey' => 'scope_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Issuers', [
            'foreignKey' => 'issuer_id',
        ]);
        $this->belongsTo('Objects', [
            'foreignKey' => 'object_id',
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
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->scalar('scope_model')
            ->maxLength('scope_model', 128)
            ->requirePresence('scope_model', 'create')
            ->notEmptyString('scope_model');

        $validator
            ->scalar('scope_id')
            ->maxLength('scope_id', 64)
            ->requirePresence('scope_id', 'create')
            ->notEmptyString('scope_id');

        $validator
            ->scalar('issuer_model')
            ->maxLength('issuer_model', 128)
            ->allowEmptyString('issuer_model');

        $validator
            ->scalar('issuer_id')
            ->maxLength('issuer_id', 64)
            ->allowEmptyString('issuer_id');

        $validator
            ->scalar('object_model')
            ->maxLength('object_model', 128)
            ->allowEmptyString('object_model');

        $validator
            ->scalar('object_id')
            ->maxLength('object_id', 64)
            ->allowEmptyString('object_id');

        $validator
            ->scalar('level')
            ->maxLength('level', 16)
            ->requirePresence('level', 'create')
            ->notEmptyString('level');

        $validator
            ->scalar('action')
            ->maxLength('action', 64)
            ->allowEmptyString('action');

        $validator
            ->scalar('message')
            ->allowEmptyString('message');

        $validator
            ->scalar('data')
            ->allowEmptyString('data');

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
        $rules->add($rules->existsIn('scope_id', 'Scopes'), ['errorField' => 'scope_id']);
        $rules->add($rules->existsIn('issuer_id', 'Issuers'), ['errorField' => 'issuer_id']);
        $rules->add($rules->existsIn('object_id', 'Objects'), ['errorField' => 'object_id']);

        return $rules;
    }
}
