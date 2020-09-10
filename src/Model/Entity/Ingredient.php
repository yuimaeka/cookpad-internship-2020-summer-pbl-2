<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ingredient Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $modified_at
 *
 * @property \App\Model\Entity\Recipe[] $recipes
 */
class Ingredient extends Entity
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
        'name' => true,
        'in_fridge' => true,
        'created_at' => true,
        'modified_at' => true,
        'recipes' => true,
    ];
}
