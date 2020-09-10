<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecipesIngredientsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecipesIngredientsTable Test Case
 */
class RecipesIngredientsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecipesIngredientsTable
     */
    protected $RecipesIngredients;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RecipesIngredients',
        'app.Recipes',
        'app.Ingredients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RecipesIngredients') ? [] : ['className' => RecipesIngredientsTable::class];
        $this->RecipesIngredients = $this->getTableLocator()->get('RecipesIngredients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RecipesIngredients);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
