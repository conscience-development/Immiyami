<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmlCountries Model
 *
 * @property \App\Model\Table\XmlSheetsTable&\Cake\ORM\Association\BelongsTo $XmlSheets
 * @property \App\Model\Table\XmlSubmissionsTable&\Cake\ORM\Association\HasMany $XmlSubmissions
 * @property \App\Model\Table\XmlVisatypesTable&\Cake\ORM\Association\HasMany $XmlVisatypes
 *
 * @method \App\Model\Entity\XmlCountry newEmptyEntity()
 * @method \App\Model\Entity\XmlCountry newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\XmlCountry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmlCountry get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmlCountry findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\XmlCountry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmlCountry[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmlCountry|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlCountry saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlCountry[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlCountry[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlCountry[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlCountry[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmlCountriesTable extends Table
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

        $this->setTable('xml_countries');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmlSheets', [
            'foreignKey' => 'xml_sheet_id',
        ]);
        $this->hasMany('XmlSubmissions', [
            'foreignKey' => 'xml_country_id',
        ]);
        $this->hasMany('XmlVisatypes', [
            'foreignKey' => 'xml_country_id',
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
            ->allowEmptyString('xml_sheet_id');

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

        return $rules;
    }
}
