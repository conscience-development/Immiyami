<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Banner Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $sponsor_name
 * @property string|null $photo
 * @property string|null $photo_dir
 * @property \Cake\I18n\FrozenTime|null $start_date
 * @property \Cake\I18n\FrozenTime|null $end_date
 * @property string|null $url
 * @property string|null $position
 * @property string|null $price
 * @property string $status
 * @property int|null $banner_type_id
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\BannerType $banner_type
 * @property \App\Model\Entity\User $user
 */
class Banner extends Entity
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
        'sponsor_name' => true,
        'photo' => true,
        'photo_dir' => true,
        'start_date' => true,
        'end_date' => true,
        'url' => true,
        'position' => true,
        'price' => true,
        'note' => true,
        'status' => true,
        'banner_type_id' => true,
        'user_id' => true,
        'created' => true,
        'banner_type' => true,
        'user' => true,
    ];
}
