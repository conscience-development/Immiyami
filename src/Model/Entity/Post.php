<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $short_description
 * @property \Cake\I18n\FrozenTime|null $description
 * @property string|null $photo
 * @property string|null $photo_dir
 * @property string|null $url
 * @property string $status
 * @property int|null $clicks
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\PostImage[] $post_images
 * @property  int|null $supplier_id
 */
class Post extends Entity
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
        'short_description' => true,
        'description' => true,
        'photo' => true,
        'photo_dir' => true,
        'url' => true,
        'status' => true,
        'c_status' => true,
        'clicks' => true,
        'user_id' => true,
        'approved_date' => true,
        'created' => true,
        'user' => true,
        'post_images' => true,
        'posts_categories' => true,
        'posts_countries' => true,
        'supplier_id' => true
    ];
}