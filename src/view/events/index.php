

<section class="program">
  <header class="section-title">
    <h1>Volgende evenementen</h1>
  </header>
  <div class="program-events">

    <?php
    foreach( $events as $event ):
    ?>
      <article class="event">
        <a href="index.php?page=detail&id=<?php echo $event["id"]?>"><img class="event-picture" src="assets/img/programma-images/<?php echo $event["picture"];?>"/></a>
        <header>
          <h1 class="event-title"><?php echo $event["title"];?></h1>
        </header>
        <div class="flex-next">
          <h2 class="event-date">
            <?php
              $time  = strtotime($event["start"]);
              $day   = date('d',$time);
              $month = date('m',$time);
              $year  = date('Y',$time);
              $hour  = date('H',$time);
              $minutes = date('i',$time);
              echo $day. '/' .$month .'</br>';
              echo $hour . 'u' . $minutes;
            ?>
          </h2>
          <div class="flex-under">
            <?php foreach($event["locations"] as $locatie):?>
              <p class="event-locatie"><?php echo $locatie["name"] ?></p>
            <?php endforeach; ?>
            <?php if(empty($event["tags"])): ?>
            <?php else: ?>
              <?php foreach($event["tags"] as $tag):?>
                <p class="event-tags"><?php echo $tag["tag"] ?></p>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>
