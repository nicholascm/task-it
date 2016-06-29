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

  private function today
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
    $words = explode($this->task->name);
    return $words;
  }

  public function checkForDueDates ()
  {
      $words = explode($this->task->name);

      for($i=0; $i < length(words); $i++)
      {
        array_search()
        //search the array for keywords
        //keywords found go into new list with keyword index
        //search words immediately after keyword for daysOfWeek presence
        //if daysOfWeek present after keyword, find next date with that daysOfWeek


        //

      }

  }



}

php>
