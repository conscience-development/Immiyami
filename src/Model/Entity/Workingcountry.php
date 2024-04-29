<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workingcountry Entity
 *
 * @property int $id
 * @property int|null $country_id
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\User $user
 */
class Workingcountry extends Entity
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
        'country_id' => true,
        'user_id' => true,
        'created' => true,
        'country' => true,
        'user' => true,
    ];
}
