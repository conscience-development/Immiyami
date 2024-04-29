<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmlQualifPoints Model
 *
 * @property \App\Model\Table\XmlQualificationsTable&\Cake\ORM\Association\BelongsTo $XmlQualifications
 *
 * @method \App\Model\Entity\XmlQualifPoint newEmptyEntity()
 * @method \App\Model\Entity\XmlQualifPoint newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\XmlQualifPoint[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmlQualifPoint get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmlQualifPoint findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\XmlQualifPoint patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmlQualifPoint[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmlQualifPoint|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlQualifPoint saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlQualifPoint[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlQualifPoint[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlQualifPoint[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlQualifPoint[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmlQualifPointsTable extends Table
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

        $this->setTable('xml_qualif_points');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmlQualifications', [
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
            ->scalar('color')
            ->maxLength('color', 255)
            ->allowEmptyString('color');

        $validator
            ->scalar('points')
            ->maxLength('points', 255)
            ->allowEmptyString('points');

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
