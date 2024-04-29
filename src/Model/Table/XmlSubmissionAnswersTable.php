<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmlSubmissionAnswers Model
 *
 * @property \App\Model\Table\XmlCriteriasTable&\Cake\ORM\Association\BelongsTo $XmlCriterias
 * @property \App\Model\Table\XmlCriteriaAnswersTable&\Cake\ORM\Association\BelongsTo $XmlCriteriaAnswers
 *
 * @method \App\Model\Entity\XmlSubmissionAnswer newEmptyEntity()
 * @method \App\Model\Entity\XmlSubmissionAnswer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlSubmissionAnswer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmlSubmissionAnswersTable extends Table
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

        $this->setTable('xml_submission_answers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmlCriterias', [
            'foreignKey' => 'criteria_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('XmlCriteriaAnswers', [
            'foreignKey' => 'criteria_answer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('XmlSubmissions', [
            'foreignKey' => 'xml_submission_id',
            'joinType' => 'INNER',
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
            ->requirePresence('criteria_id', 'create')
            ->notEmptyString('criteria_id');

        $validator
            ->requirePresence('criteria_answer_id', 'create')
            ->notEmptyString('criteria_answer_id');
        $validator
            ->requirePresence('xml_submission_id', 'create')
            ->notEmptyString('xml_submission_id');

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
        $rules->add($rules->existsIn('criteria_answer_id', 'XmlCriteriaAnswers'), ['errorField' => 'criteria_answer_id']);

        return $rules;
    }
}
