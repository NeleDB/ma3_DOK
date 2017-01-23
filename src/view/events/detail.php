<?php
foreach( $events as $event ):
?>
<header>
  <img class="event-picture" src="assets/img/programma-images/<?php echo $event["picture"];?>"/>
  <h1><?php echo $event["title"];?></h1>
</header>
<section>
  <article class="">
    <header>
      <h1>Info</h1>
    </header>
    <table>
      <tr>
        <td>Datum</td>
        <td><?php
            $time  = strtotime($event["start"]);
            $day   = date('d',$time);
            $month = date('m',$time);
            $year  = date('Y',$time);
            $hour  = date('H',$time);
            $minutes = date('i',$time);
            echo $day. '/' .$month . ' ';
            echo $hour . 'u' . $minutes;
        ?></td>
      </tr>
      <tr>
        <td>Zone</td>
        <?php foreach($event["locations"] as $locatie):?>
          <td><?php echo $locatie["name"];?></td>
        <?php endforeach; ?>
      </tr>
      <tr>
        <td>Organisatie</td>
        <td><?php echo $event["organiser"];?></td>
      </tr>
      <tr>
        <td>Tags</td>
        <?php foreach($event["tags"] as $tag):?>
          <td><?php echo $tag["tag"];?></td>
        <?php endforeach; ?>
      </tr>
    </table>
  </article>
  <article class="">
    <header>
      <h1><span>Description</span></h1>
    </header>
    <p><?php echo $event["description"];?></p>
  </article>
</section>
<section>
  <?php echo $event["media"];?>
</section>
<?php endforeach; ?>
