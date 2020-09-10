<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IngredientsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IngredientsTable Test Case
 */
class IngredientsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IngredientsTable
     */
    protected $Ingredients;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Ingredients',
        'app.Recipes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ingredients') ? [] : ['className' => IngredientsTable::class];
        $this->Ingredients = $this->getTableLocator()->get('Ingredients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Ingredients);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
