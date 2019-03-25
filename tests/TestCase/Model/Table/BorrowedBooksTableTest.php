<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BorrowedBooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BorrowedBooksTable Test Case
 */
class BorrowedBooksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BorrowedBooksTable
     */
    public $BorrowedBooks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BorrowedBooks',
        'app.Users',
        'app.Books'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BorrowedBooks') ? [] : ['className' => BorrowedBooksTable::class];
        $this->BorrowedBooks = TableRegistry::getTableLocator()->get('BorrowedBooks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BorrowedBooks);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
