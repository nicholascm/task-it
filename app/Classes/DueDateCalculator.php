<?php

namespace App\Classes;


/**
  * @method array getDueDatesSpecifiedByTask()
  * @method $integer today()
  * @method array getWords()
*/

class DueDateCalculator
{
  /*constructor takes the request and sets the task name as the request name property */

  protected $task;

  public function __construct($name)
  {
      $this->task = $name;
  }

  private $keywords = array('by', 'on', 'this', 'for', 'until');

  private $daysOfWeek = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');

  /* returns numeric day of week */
  private function today ()
  {
    $today = getdate();

    $numDayOfWeek = $today['wday'];
    return $numDayOfWeek;
  }

  /*returns an array of words in the task, lowercase */
  private function getWords ()
  {
    $words = explode(" ", strtolower($this->task));
    return $words;
  }

  /*returns list of days contained in the task name, should use regexp instead in retrospect */
  private function getDaysSpecifiedByTask ()
  {
    $daysSpecifiedByTask = array();
    foreach($this->getWords() as $word)
    {
      if (array_search($word, $this->daysOfWeek))
      {
        array_push($daysSpecifiedByTask, $word);
      }
    }
    return $daysSpecifiedByTask;
  }


  private function checkIfDaysPrecededByKeyword ($arr)
  {
    $daysPrecedByKey = array();

    for ($i = 0; $i < count($arr); $i++)
    {
      $location = array_search($arr[$i], $this->getWords());

      if (array_search($arr[$location-1], $this->getWords()))
      {
        array_push($arr[$i], $daysPrecedByKey);
      }

    }
    return $daysPrecedByKey;
  }



  private function convertUnixToReadable ($arr)
  {
      $formattedDates = array();
      foreach($arr as $value) {
        array_push($formattedDates, date('Y-m-d', $value));
      }
      return $formattedDates;
  }
  /* returns a list of dates likely indicated as the due date for the task */


  public function getDueDatesSpecifiedByTask ()
  {
    $dueDates = array();
    //TODO: Bring this back below
    $precedeByKeyword = $this->getDaysSpecifiedByTask();

    foreach ($precedeByKeyword as $day) {
      $dayValue = array_search($day, $this->daysOfWeek);
      if ($dayValue > $this->today())
      {
        $difference = $dayValue - $this->today();
        $unixDueDate = getDate()[0] + ($difference*86400);
        array_push($dueDates, $unixDueDate);
      } else {
        $difference = 7 - ($this->today() - $dayValue);
        $unixDueDate = getDate()[0] + ($difference*86400);
        array_push($dueDates, $unixDueDate);
      }
    }

    return $this->convertUnixToReadable($dueDates);
  }

}
