<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Videos Model
 *
 * @method \App\Model\Entity\Video newEmptyEntity()
 * @method \App\Model\Entity\Video newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Video[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Video get($primaryKey, $options = [])
 * @method \App\Model\Entity\Video findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Video patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Video[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Video|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Video saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VideosTable extends Table
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

        $this->setTable('videos');
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
					'mobile' => [			// Create a smaller copy based on width or height that respects ratio
						'w' => 421,		// Height can be omitted (or vice versa)
						'upsize' => false	// Prevent the image from being upsized if it is narrower than specified width
					]
				],
				'thumbnailMethod' => 'gd'	// Options are Imagick or Gd
			],
			'file' => [	// The name of your upload field
				'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
				'dir' => 'file_dir'	// The name of the field to store the folder
				
			]
		]);
		
		$this->addBehavior('Elastic/ActivityLogger.Logger', [
            'scope' => [
                'Videos',
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
                'fields' => ['title', 'type'],
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
            ->scalar('featured')
            ->allowEmptyString('featured');

        $validator
            ->scalar('type')
            ->notEmptyString('type');

        $validator
            ->scalar('premium');
            
        $validator
            ->scalar('url')
            ->allowEmptyString('url');

        $validator
            //->scalar('photo')
            //->maxLength('photo', 255)
            ->allowEmptyString('photo');

        $validator
            //->scalar('photo_dir')
            //->maxLength('photo_dir', 255)
            ->allowEmptyString('photo_dir');

        $validator
            //~ ->scalar('file')
            //~ ->maxLength('file', 255)
            ->allowEmptyString('file');

        $validator
            //~ ->scalar('file_dir')
            //~ ->maxLength('file_dir', 255)
            ->allowEmptyString('file_dir');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        return $validator;
    }
}
