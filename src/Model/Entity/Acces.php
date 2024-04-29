<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Acces Entity
 *
 * @property int $id
 * @property string|null $status
 * @property int|null $user_id
 * @property int|null $controller_func_id
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ControllerFunc $controller_func
 */
class Acces extends Entity
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
        'status' => true,
        'user_id' => true,
        'controller_func_id' => true,
        'created' => true,
        'user' => true,
        'controller_func' => true,
    ];
}
