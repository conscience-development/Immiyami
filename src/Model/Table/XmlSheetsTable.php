<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmlSheets Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\XmlCountriesTable&\Cake\ORM\Association\HasMany $XmlCountries
 * @property \App\Model\Table\XmlSubmissionsTable&\Cake\ORM\Association\HasMany $XmlSubmissions
 *
 * @method \App\Model\Entity\XmlSheet newEmptyEntity()
 * @method \App\Model\Entity\XmlSheet newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\XmlSheet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmlSheet get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmlSheet findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\XmlSheet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmlSheet[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmlSheet|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlSheet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmlSheet[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlSheet[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlSheet[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\XmlSheet[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmlSheetsTable extends Table
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

        $this->setTable('xml_sheets');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('XmlCountries', [
            'foreignKey' => 'xml_sheet_id',
        ]);
        $this->hasMany('XmlSubmissions', [
            'foreignKey' => 'xml_sheet_id',
        ]);
        
        $this->addBehavior('Elastic/ActivityLogger.Logger', [
            'scope' => [
                'XmlCountries',
                'XmlSubmissions',
                'Users',
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
                'fields' => ['name', 'version'],
            ])
            ->add('foo', 'Search.Callback', [
                'callback' => function (\Cake\ORM\Query $query, array $args, \Search\Model\Filter\Base $filter) {
                    // Modify $query as required
                }
            ]);
            $this->addBehavior('Proffer.Proffer', [
				'file' => [	// The name of your upload field
					'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
					'dir' => 'file_dir'
				]
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
            ->notEmptyString('name');

        $validator
            ->scalar('version')
            ->maxLength('version', 255)
            ->notEmptyString('version');

        $validator
            //~ ->scalar('file')
            //~ ->maxLength('file', 255)
            ->allowEmptyFile('file');

        $validator
            //~ ->scalar('file_dir')
            //~ ->maxLength('file_dir', 255)
            ->allowEmptyFile('file_dir');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->allowEmptyString('user_id');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
