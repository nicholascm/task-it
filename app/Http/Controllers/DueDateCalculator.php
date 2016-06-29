<?php

namespace App\Http\Controllers;

class DueDateCalculator
{
  public function __construct(Task $task)
  {
      $this->task = $task
  }

  private task;

  private keywords = array('by', 'on', 'this', 'for', 'until');

  private daysOfweek = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');

  private function today ()
  {
    $today = getdate();

    $numDayOfWeek = $today['wday'];

  }

  private function getDaysSpecifiedByTask ()
  {
    $daysSpecifiedByTask = array();
    foreach($this->getWords() as word)
    {
      if (array_search(word, $this->daysOfWeek))
      {
        array_push(word, $daysSpecifiedByTask);
      }
    }

  }

  private function getWords ()
  {
    $words = strtolower(explode($this->task->name));
    return $words;
  }

  public function checkForDueDates ()
  {
      $words = explode($this->task->name);

      for($i=0; $i < length(words); $i++)
      {
        array_search()
        //search the array for keywords preceding the days of week specified
        //day of week specified alone is not as indicative as day of week with keyword directly prior 

        //if numDayspecified > numToday, add diffrence to todays date to get due date

        //if numDayspecified < numToday, find difference and subtract from 7, then add to todays date to get due date


        //

      }

  }



}

php>
