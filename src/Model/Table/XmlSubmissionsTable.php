<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmlSubmissions Model
 *
 * @property \App\Model\Table\XmlSheetsTable&\Cake\ORM\Association\BelongsTo $XmlSheets
 * @property \App\Model\Table\XmlCountriesTable&\Cake\ORM\Association\BelongsTo $XmlCountries
 * @property \App\Model\Table\XmlVisatypesTable&\Cake\ORM\Association\BelongsTo $XmlVisatypes
 * @property \App\Model\Table\XmlQualificationsTable&\Cake\ORM\Association\BelongsTo $XmlQualifications
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\XmlSubmission newEmptyEntity()
 * @method \App\Model\Entity\XmlSubmission newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\XmlSubmission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmlSubmission get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmlSubmission findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\XmlSubmission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmlSubmission[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmlSubmission|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlSubmission saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlSubmission[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlSubmission[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlSubmission[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlSubmission[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmlSubmissionsTable extends Table
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

        $this->setTable('xml_submissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmlSheets', [
            'foreignKey' => 'xml_sheet_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('XmlCountries', [
            'foreignKey' => 'xml_country_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('XmlVisatypes', [
            'foreignKey' => 'xml_vsatype_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('XmlQualifications', [
            'foreignKey' => 'xml_qualification_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('XmlSubmissionAnswers', [
            'foreignKey' => 'xml_submission_id',
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
            ->requirePresence('xml_sheet_id', 'create')
            ->notEmptyString('xml_sheet_id');

        $validator
            ->requirePresence('xml_country_id', 'create')
            ->notEmptyString('xml_country_id');

        $validator
            ->requirePresence('xml_vsatype_id', 'create')
            ->notEmptyString('xml_vsatype_id');

        $validator
            ->requirePresence('xml_qualification_id', 'create')
            ->notEmptyString('xml_qualification_id');

        $validator
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

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
        $rules->add($rules->existsIn('xml_sheet_id', 'XmlSheets'), ['errorField' => 'xml_sheet_id']);
        $rules->add($rules->existsIn('xml_country_id', 'XmlCountries'), ['errorField' => 'xml_country_id']);
        $rules->add($rules->existsIn('xml_vsatype_id', 'XmlVisatypes'), ['errorField' => 'xml_vsatype_id']);
        $rules->add($rules->existsIn('xml_qualification_id', 'XmlQualifications'), ['errorField' => 'xml_qualification_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
