<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmlQualifications Model
 *
 * @property \App\Model\Table\XmlVisatypesTable&\Cake\ORM\Association\BelongsTo $XmlVisatypes
 * @property \App\Model\Table\XmlCriteriasTable&\Cake\ORM\Association\HasMany $XmlCriterias
 * @property \App\Model\Table\XmlQualifPointsTable&\Cake\ORM\Association\HasMany $XmlQualifPoints
 * @property \App\Model\Table\XmlSubmissionsTable&\Cake\ORM\Association\HasMany $XmlSubmissions
 *
 * @method \App\Model\Entity\XmlQualification newEmptyEntity()
 * @method \App\Model\Entity\XmlQualification newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\XmlQualification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmlQualification get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmlQualification findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\XmlQualification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmlQualification[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmlQualification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlQualification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlQualification[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlQualification[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlQualification[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlQualification[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmlQualificationsTable extends Table
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

        $this->setTable('xml_qualifications');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmlVisatypes', [
            'foreignKey' => 'xml_visatype_id',
        ]);
        $this->hasMany('XmlCriterias', [
            'foreignKey' => 'xml_qualification_id',
        ]);
        $this->hasMany('XmlQualifPoints', [
            'foreignKey' => 'xml_qualification_id',
        ]);
        $this->hasMany('XmlSubmissions', [
            'foreignKey' => 'xml_qualification_id',
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
            ->allowEmptyString('xml_visatype_id');

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
        $rules->add($rules->existsIn('xml_visatype_id', 'XmlVisatypes'), ['errorField' => 'xml_visatype_id']);

        return $rules;
    }
}
