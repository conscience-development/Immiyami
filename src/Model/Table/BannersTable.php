<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Banners Model
 *
 * @property \App\Model\Table\BannerTypesTable&\Cake\ORM\Association\BelongsTo $BannerTypes
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Banner newEmptyEntity()
 * @method \App\Model\Entity\Banner newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Banner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Banner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Banner findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Banner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Banner[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Banner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Banner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Banner[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Banner[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Banner[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Banner[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BannersTable extends Table
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

        $this->setTable('banners');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Proffer.Proffer', [
			'photo' => [	// The name of your upload field
				'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
				'dir' => 'photo_dir',	// The name of the field to store the folder
				'thumbnailSizes' => [ // Declare your thumbnails
					'square' => [	// Define the prefix of your thumbnail
						'w' => 200,	// Width
						'h' => 200,	// Height
						'jpeg_quality'	=> 100
					],
					'portrait' => [		// Define a second thumbnail
						'w' => 100,
						'h' => 300
					],
					'ad_Top' => [		// Define a second thumbnail
						'w' => 1267,
						'h' => 173
					],
					'mobile' => [			// Create a smaller copy based on width or height that respects ratio
						'w' => 421,		// Height can be omitted (or vice versa)
						'upsize' => false	// Prevent the image from being upsized if it is narrower than specified width
					]
				],
				'thumbnailMethod' => 'gd'	// Options are Imagick or Gd
			]
		]);

        $this->belongsTo('BannerTypes', [
            'foreignKey' => 'banner_type_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->addBehavior('Elastic/ActivityLogger.Logger', [
            'scope' => [
                'Banners',
                'BannerTypes',
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
                'fields' => ['title', 'sponsor_name','start_date','end_date','position','note'],
            ])
            ->add('foo', 'Search.Callback', [
                'callback' => function (\Cake\ORM\Query $query, array $args, \Search\Model\Filter\Base $filter) {
                    // Modify $query as required
                }
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->notEmptyString('title');

        $validator
            ->scalar('sponsor_name')
            ->maxLength('sponsor_name', 255)
            ->notEmptyString('sponsor_name');

        $validator
            //->scalar('photo')
            //->maxLength('photo', 255)
            ->allowEmptyString('photo');

        $validator
            //->scalar('photo_dir')
            //->maxLength('photo_dir', 255)
            ->allowEmptyString('photo_dir');

        $validator
            ->date('start_date')
            ->notEmptyString('start_date');

        $validator
            ->date('end_date')
            ->notEmptyString('end_date');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->notEmptyString('url');

        $validator
            ->scalar('position')
            ->notEmptyString('position');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');
		$validator
            ->scalar('note')
            ->allowEmptyString('note');
        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->allowEmptyString('banner_type_id');

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
        $rules->add($rules->existsIn('banner_type_id', 'BannerTypes'), ['errorField' => 'banner_type_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
