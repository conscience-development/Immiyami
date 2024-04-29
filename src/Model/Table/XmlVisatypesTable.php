<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmlVisatypes Model
 *
 * @property \App\Model\Table\XmlCountriesTable&\Cake\ORM\Association\BelongsTo $XmlCountries
 * @property \App\Model\Table\XmlQualificationsTable&\Cake\ORM\Association\HasMany $XmlQualifications
 *
 * @method \App\Model\Entity\XmlVisatype newEmptyEntity()
 * @method \App\Model\Entity\XmlVisatype newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\XmlVisatype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmlVisatype get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmlVisatype findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\XmlVisatype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmlVisatype[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmlVisatype|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlVisatype saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlVisatype[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlVisatype[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlVisatype[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlVisatype[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmlVisatypesTable extends Table
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

        $this->setTable('xml_visatypes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmlCountries', [
            'foreignKey' => 'xml_country_id',
        ]);
        $this->hasMany('XmlQualifications', [
            'foreignKey' => 'xml_visatype_id',
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
            ->allowEmptyString('xml_country_id');

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
        $rules->add($rules->existsIn('xml_country_id', 'XmlCountries'), ['errorField' => 'xml_country_id']);

        return $rules;
    }
}
