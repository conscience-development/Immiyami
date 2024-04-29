<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Flag Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $photo
 * @property string|null $photo_dir
 * @property \Cake\I18n\FrozenTime $created
 */
class Flag extends Entity
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
        'name' => true,
        'photo' => true,
        'photo_dir' => true,
        'created' => true,
    ];
}
