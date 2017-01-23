<?php
require_once __DIR__ . '/DAO.php';
class MainDAO extends DAO {

    public function selectNextEvents($date){
      $sql = "SELECT * FROM `ma3_dok_events` WHERE `start` > CURDATE() LIMIT 3";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':dat', $date);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>
