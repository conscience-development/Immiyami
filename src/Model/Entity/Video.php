<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Video Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $featured
 * @property string $type
 * @property string|null $url
 * @property string|null $photo
 * @property string|null $photo_dir
 * @property string|null $file
 * @property string|null $file_dir
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 */
class Video extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'title' => true,
        'featured' => true,
        'type' => true,
        'url' => true,
        'photo' => true,
        'photo_dir' => true,
        'file' => true,
        'file_dir' => true,
        'status' => true,
        'premium' => true,
        'created' => true,
    ];
}
