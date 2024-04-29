<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmlCriteriaAnswers Model
 *
 * @property \App\Model\Table\XmlCriteriasTable&\Cake\ORM\Association\BelongsTo $XmlCriterias
 *
 * @method \App\Model\Entity\XmlCriteriaAnswer newEmptyEntity()
 * @method \App\Model\Entity\XmlCriteriaAnswer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlCriteriaAnswer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmlCriteriaAnswersTable extends Table
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

        $this->setTable('xml_criteria_answers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmlCriterias', [
            'foreignKey' => 'criteria_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->scalar('tagname')
            ->maxLength('tagname', 255)
            ->allowEmptyString('tagname');

        $validator
            ->scalar('answer')
            ->allowEmptyString('answer');

        $validator
            ->scalar('point')
            ->maxLength('point', 255)
            ->allowEmptyString('point');

        $validator
            ->allowEmptyString('criteria_id');

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
        $rules->add($rules->existsIn('criteria_id', 'XmlCriterias'), ['errorField' => 'criteria_id']);

        return $rules;
    }
}
