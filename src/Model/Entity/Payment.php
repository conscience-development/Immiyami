<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $price
 * @property \Cake\I18n\FrozenTime|null $payment_date
 * @property string $type
 * @property string $package
 * @property string $status
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 */
class Payment extends Entity
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
        'price' => true,
        'payment_date' => true,
        'type' => true,
        'package' => true,
        'status' => true,
        'payment_status' => true,
        'payment_currency' => true,
        'txn_id' => true,
        'custom' => true,
        'user_id' => true,
        'created' => true,
        'user' => true,
    ];
}
