<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PreferredCountry Entity
 *
 * @property int $id
 * @property string|null $name
 * @property boolean $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \App\Model\Entity\User[] $users
 */
class PreferredCountry extends Entity
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
        'created' => true,
        'users' => true,
        'status' => true
    ];
}
