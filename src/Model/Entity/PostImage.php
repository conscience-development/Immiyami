<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PostImage Entity
 *
 * @property int $id
 * @property string|null $photo
 * @property string|null $photo_dir
 * @property int|null $post_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Post $post
 */
class PostImage extends Entity
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
        'photo' => true,
        'photo_dir' => true,
        'post_id' => true,
        'created' => true,
        'post' => true,
    ];
}
