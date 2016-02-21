<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserMaster Entity.
 *
 * @property int $uid
 * @property int $departmentcd
 * @property string $familyname
 * @property string $firstname
 * @property string $familykana
 * @property string $firstkana
 * @property string $mailaddress
 * @property int $deleteflg
 * @property \Cake\I18n\Time $insdate
 * @property \Cake\I18n\Time $lastupdate
 */
class UserMaster extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'uid' => false,
    ];
}
