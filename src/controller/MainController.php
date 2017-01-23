<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'MainDAO.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';


class MainController extends Controller {

  private $mainDAO;
  private $eventDAO;

  function __construct() {
    $this->mainDAO = new MainDAO();
    $this->eventDAO = new EventDAO();
  }

	public function index() {
    //$events = $this->mainDAO->selectNextEvents(date("Y-m-d"));
    //$this->set('events', $events);
    $conditions = array();

    $conditions[0] = array(
      'field' => 'start',
      'comparator' => '<',
      'value' => 'date("Y-m-d")'
   );

    $events = $this->eventDAO->search($conditions);
    $this->set('events', $events);
	}



}

?>
