<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ingredients Model
 *
 * @property \App\Model\Table\RecipesTable&\Cake\ORM\Association\BelongsToMany $Recipes
 *
 * @method \App\Model\Entity\Ingredient newEmptyEntity()
 * @method \App\Model\Entity\Ingredient newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Ingredient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ingredient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ingredient findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Ingredient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ingredient[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ingredient|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ingredient saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ingredient[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ingredient[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ingredient[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ingredient[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class IngredientsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('ingredients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Recipes', [
            'foreignKey' => 'ingredient_id',
            'targetForeignKey' => 'recipe_id',
            'joinTable' => 'recipes_ingredients',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('modified_at')
            ->notEmptyDateTime('modified_at');

        return $validator;
    }
}
