<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 * @property \App\Model\Table\PreferredCountriesTable&\Cake\ORM\Association\BelongsTo $PreferredCountries
 * @property \App\Model\Table\CouponsTable&\Cake\ORM\Association\BelongsTo $Coupons
 * @property \App\Model\Table\ArticlesTable&\Cake\ORM\Association\HasMany $Articles
 * @property \App\Model\Table\BannersTable&\Cake\ORM\Association\HasMany $Banners
 * @property \App\Model\Table\GalleriesTable&\Cake\ORM\Association\HasMany $Galleries
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\PostsTable&\Cake\ORM\Association\HasMany $Posts
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('first_name');
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
					'mobile' => [			// Create a smaller copy based on width or height that respects ratio
						'w' => 421,		// Height can be omitted (or vice versa)
						'upsize' => false	// Prevent the image from being upsized if it is narrower than specified width
					]
				],
				'thumbnailMethod' => 'gd'	// Options are Imagick or Gd
			]
		]);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
        ]);
        $this->belongsTo('PreferredCountries', [
            'foreignKey' => 'preferred_country_id',
        ]);
        $this->belongsTo('Coupons', [
            'foreignKey' => 'coupon_id',
        ]);
        $this->hasMany('Articles', [
            'foreignKey' => 'user_id',
        ]);
        // $this->hasMany('QueueSubmissions', [
        //     'foreignKey' => 'member_id',
        // ]);
        // $this->hasMany('QueueSubmissions', [
        //     'foreignKey' => 'supplier_id',
        // ]);
        $this->hasMany('Access', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Banners', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('XmlSubmissions', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserLogs', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Galleries', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Posts', [
            'foreignKey' => 'user_id',
        ]);

        $this->addBehavior('Elastic/ActivityLogger.Logger', [
            'scope' => [
                'Users',
                'Categories',
                'Countries',
                'PreferredCountries',
                'Coupons',
                'Articles',
                'Banners',
                'Galleries',
                'Payments',
                'Posts',
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
                'fields' => ['first_name','bio','contact', 'last_name','email','company_name'],
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
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->notEmptyString('last_name');

        $validator
            ->email('email')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->notEmptyString('password');

        $validator
            ->scalar('bio')
            ->allowEmptyString('bio');

        $validator
            ->scalar('contact')
            ->maxLength('contact', 255)
            ->allowEmptyString('contact');

        $validator
            //->scalar('photo')
            //->maxLength('photo', 255)
            ->allowEmptyString('photo');

        $validator
            //->scalar('photo_dir')
            //->maxLength('photo_dir', 255)
            ->allowEmptyString('photo_dir');

        $validator
            ->dateTime('last_login')
            ->allowEmptyDateTime('last_login');

        $validator
            ->scalar('password_reset_token')
            ->maxLength('password_reset_token', 255)
            ->allowEmptyString('password_reset_token');

        $validator
            ->scalar('company_name')
            ->maxLength('company_name', 255)
            ->allowEmptyString('company_name');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->scalar('q')
            ->notEmptyString('q');

        $validator
            ->scalar('qm')
            ->notEmptyString('qm');

        $validator
            ->scalar('q_active')
            ->notEmptyString('q_active');

        $validator
            ->scalar('role')
            ->notEmptyString('role');

        $validator
            ->allowEmptyString('category_id');

        $validator
            ->allowEmptyString('country_id');

        $validator
            ->allowEmptyString('preferred_country_id');

        $validator
            ->allowEmptyString('coupon_id');

        $validator->add('password', [
			'compare' => [
				'rule' => ['compareWith', 'c_password']
			]
		]);

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);
        $rules->add($rules->existsIn('country_id', 'Countries'), ['errorField' => 'country_id']);
        $rules->add($rules->existsIn('preferred_country_id', 'PreferredCountries'), ['errorField' => 'preferred_country_id']);
        $rules->add($rules->existsIn('coupon_id', 'Coupons'), ['errorField' => 'coupon_id']);

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
	{
		$query
			->select(['id', 'email', 'password'])
			->where(['Users.status' => 1]);

		return $query;
	}
}
