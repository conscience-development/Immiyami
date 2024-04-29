<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Discussion Entity
 *
 * @property int $id
 * @property int|null $supplier_id
 * @property int|null $member_id
 * @property \Cake\I18n\FrozenTime $date
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 */
class Discussion extends Entity
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
        'supplier_id' => true,
        'member_id' => true,
        'date' => true,
        'description' => true,
        'created' => true,
        'user' => true,
    ];
}
