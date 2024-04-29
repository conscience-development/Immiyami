<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmlCriterias Model
 *
 * @property \App\Model\Table\XmlQualificationsTable&\Cake\ORM\Association\BelongsTo $XmlQualifications
 *
 * @method \App\Model\Entity\XmlCriteria newEmptyEntity()
 * @method \App\Model\Entity\XmlCriteria newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\XmlCriteria[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmlCriteria get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmlCriteria findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\XmlCriteria patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmlCriteria[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmlCriteria|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlCriteria saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlCriteria[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlCriteria[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlCriteria[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlCriteria[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmlCriteriasTable extends Table
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

        $this->setTable('xml_criterias');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmlQualifications', [
            'foreignKey' => 'xml_qualification_id',
        ]);
		$this->hasMany('XmlCriteriaAnswers', [
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
            ->scalar('useForSuggestions')
            ->notEmptyString('useForSuggestions');

        $validator
            ->scalar('maxpoint')
            ->maxLength('maxpoint', 255)
            ->allowEmptyString('maxpoint');

        $validator
            ->scalar('question')
            ->requirePresence('question', 'create')
            ->notEmptyString('question');
        $validator
            ->scalar('help_link');

        $validator
            ->allowEmptyString('xml_qualification_id');

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
        $rules->add($rules->existsIn('xml_qualification_id', 'XmlQualifications'), ['errorField' => 'xml_qualification_id']);

        return $rules;
    }
}
