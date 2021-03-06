<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';

class EventsController extends Controller {

  private $eventDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
  }

  public function index() {
    $conditions = array();

    if (isset($this->isAjax) && $this -> isAjax){
      $items = $this->eventDAO->selectAll();
      header("Content-Type", "application/json");
      die(json_encode($items));

    }

    //example: search on title
    //$conditions[0] = array(
    //   'field' => 'title',
    //   'comparator' => 'like',
    //   'value' => '$_post["title"]'
    //);

    //example: search on location_id
    // $conditions[0] = array(
    //   'field' => 'location_id',
    //   'comparator' => '=',
    //   'value' => 4
    // );

    //example: search on location name
    // $conditions[0] = array(
    //   'field' => 'location',
    //   'comparator' => 'like',
    //   'value' => 'strand'
    // );

    //example: search on organiser id
    // $conditions[0] = array(
    //   'field' => 'organiser_id',
    //   'comparator' => '=',
    //   'value' => '1'
    // );

    //example: search on organiser id
    // $conditions[0] = array(
    //   'field' => 'organiser',
    //   'comparator' => 'LIKE',
    //   'value' => 'gent'
    // );

    //example: search on tag name
    //$conditions[0] = array(
    //   'field' => 'tag',
    //   'comparator' => '=',
    //   'value' => $_POST["tags"]
    //);

    if(isset($_GET["action"]) && $_GET["action"] === 'verwijder filter') {
      unset($_GET["title"]);
      unset($_GET["tags"]);
      $month = date('m');
    }

    if(isset($_GET["tags"])){
      foreach($_GET["tags"] as $tag){
        $conditions[] = array(
           'field' => 'tag',
           'comparator' => '=',
           'value' => $tag
        );
      }
    } else if(isset($_GET["title"])) {
      $conditions[] = array(
         'field' => 'title',
         'comparator' => 'like',
         'value' => $_GET["title"]
      );
    } else {
      if(!isset($_GET["month"])){
        $month = date('m');
      }else {
        $month = $_GET["month"];
      }
      //add leading zero
      if($month<10): $month = sprintf("%02d", $month); endif;

      $startdate =  "2017-$month-01";
      $enddate =  "2017-$month-31";

      $conditions[] = array(
        'field' => 'start',
        'comparator' => '>=',
        'value' => $startdate
      );
      $conditions[] = array(
        'field' => 'end',
        'comparator' => '<=',
        'value' => $enddate
      );
      $month++;
      $_GET["month"] = $month;
    }
    //example: events ending in may 2017
    // $conditions[0] = array(
    //   'field' => 'end',
    //   'comparator' => '>=',
    //   'value' => '2017-05-01 00:00:00'
    // );
    // $conditions[1] = array(
    //   'field' => 'end',
    //   'comparator' => '<',
    //   'value' => '2017-06-01 00:00:00'
    // );

    //example: events ending in may 2017
    //$conditions[0] = array(
    //  'field' => 'start',
    //  'comparator' => '<',
    //  'value' => 'date("Y-m-d")'
   //);
    //$conditions[1] = array(
    //    'field' => 'start',
    //    'comparator' => '>',
    //    'value' => '2017-06-01 00:00:00'
    //);

    //example: events happening on march first
    // $conditions[0] = array(
    //   'field' => 'start',
    //   'comparator' => '<=',
    //   'value' => '2017-03-01 00:00:00'
    // );
    // $conditions[1] = array(
    //   'field' => 'end',
    //   'comparator' => '>=',
    //   'value' => '2017-03-01 00:00:00'
    // );

    //example: search on location, with certain end date + time
    // $conditions[0] = array(
    //   'field' => 'location',
    //   'comparator' => 'like',
    //   'value' => 'voortuin'
    // );
    // $conditions[1] = array(
    //   'field' => 'end',
    //   'comparator' => '=',
    //   'value' => '2017-05-01 19:00'
    // );

    $events = $this->eventDAO->search($conditions);
    $this->set('events', $events);
  }

  public function detail() {

    $conditions = array();
    $conditions[0] = array(
      'field' => 'id',
      'comparator' => '=',
      'value' => $_GET["id"]
   );
   $events = $this->eventDAO->search($conditions);
   $this->set('events', $events);

   //events on same date

   $time  = strtotime($events[0]["start"]);
   $day   = date('d',$time);
   $month = date('m',$time);
   $year  = date('Y',$time);
   $startdate = $year.'-'.$month.'-'.$day. ' '.'10:00';
   $enddate = $year.'-'.$month.'-'.$day. ' '.'23:00';

   $arraydate = array();

   $arraydate[0] = array(
     'field' => 'start',
     'comparator' => '>=',
     'value' => $startdate
   );
   $arraydate[1] = array(
     'field' => 'end',
     'comparator' => '<=',
     'value' => $enddate
   );

   $eventssamedate = $this->eventDAO->search($arraydate);
   $this->set('eventssamedate', $eventssamedate);
  }
}
