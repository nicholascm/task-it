<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Classes\DueDateCalculator;

class DueDateCalculatorTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testForArrayReturn()
    {
        $dueDate = new DueDateCalculator("Get it done by Friday");
        $dateSpecified = $dueDate->getDueDatesSpecifiedByTask();
        $this->assertTrue(gettype($dateSpecified) == "array" && count($dateSpecified) == 1);
    }
    /*
    public function testForLengthOfArray()
    {
        $dueDateLength = new DueDateCalculator("Get it done by Friday or by Monday, whichever works but definitely by Thursday");
        $lengthSpecified = $dueDateLength->getDueDatesSpecifiedByTask();
        $this->assertTrue(count($lengthSpecified) == 2);
    }
    */
}
