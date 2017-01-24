
<?php
foreach( $events as $event ):
?>
<header class="detail-header">
  <div class="detail-picture">
    <img class="detail-picture-event" src="assets/img/programma-images/<?php echo $event["picture"];?>"/>
  </div>
  <h1 class="detail-title"><?php echo $event["title"];?></h1>
</header>
<section class="flex-next praktisch">
  <article class="praktisch-info">
    <header>
      <h1 class="praktisch-title">Info</h1>
    </header>
    <table class="table">
      <tbody class="table-body">
        <tr class="table-row">
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
        <tr class="table-row">
          <td>Zone</td>
          <?php foreach($event["locations"] as $locatie):?>
            <td><?php echo $locatie["name"];?></td>
          <?php endforeach; ?>
        </tr>
        <tr class="table-row">
          <td>Organisatie</td>
          <td><?php echo $event["organiser"];?></td>
        </tr>
        <tr class="table-row">
          <td>Tags</td>
          <?php foreach($event["tags"] as $tag):?>
            <td class="event-tags"><?php echo $tag["tag"];?></td>
          <?php endforeach; ?>
        </tr>
      </tbody>
    </table>
  </article>
  <article class="praktisch-descriptie">
    <header>
      <h1><span>Description</span></h1>
    </header>
    <p><?php echo $event["description"];?></p>
  </article>
</section>
<section class="media-section">
  <article class="media-article">
    <?php echo $event["media"];?>
  </article>
  <article class="media-share">
    <header>
      <h1 class="section-title">Deel het met je vrienden</h1>
    </header>
    <div class="fb-share-button" data-href="https://student.howest.be/nele.de.bruycker/20162017/ma3/dok/index.php?page=detail&amp;id=<?php echo $event["id"];?>" data-layout="button" data-size="large" data-mobile-iframe="true">
      <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fstudent.howest.be%2Fnele.de.bruycker%2F20162017%2Fma3%2Fdok%2Findex.php%3Fpage%3Ddetail%26id%3D<?php echo $event["id"];?>&amp;src=sdkpreparse">Delen</a>
    </div>
    <div class="twitter-share-button">
      <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false" data-size="large">Tweet</a>
      <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </article>
</section>
<section>
  <header class="section-title">
    <h1>Evenementen op dezelfde dag</h1>
  </header>
  <div class="program-events flex-next">
    <?php
    foreach( $eventssamedate as $eventsamedate ):
    ?>
    <?php if(count($eventssamedate) === 1 && $eventsamedate["id"] === $event["id"] ): ?>
      <p>Geen evenementen op dezelfde dag</p>
    <?php else: ?>
      <article class="event" <?php if($eventsamedate["id"] === $event["id"]) echo 'style="display:none"';?>>
        <a href="index.php?page=detail&id=<?php echo $eventsamedate["id"]?>"><img class="event-picture" src="assets/img/programma-images/<?php echo $eventsamedate["picture"];?>"/></a>
        <header>
          <h1 class="event-title"><?php echo $eventsamedate["title"];?></h1>
        </header>
        <div class="flex-next">
          <h2 class="event-date">
            <?php
              $time  = strtotime($eventsamedate["start"]);
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
            <?php foreach($eventsamedate["locations"] as $locatie):?>
              <p class="event-locatie"><?php echo $locatie["name"] ?></p>
            <?php endforeach; ?>
            <?php if(empty($eventsamedate["tags"])): ?>
            <?php else: ?>
              <?php foreach($eventsamedate["tags"] as $tag):?>
                <p class="event-tags"><?php echo $tag["tag"] ?></p>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </article>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</section>
<?php endforeach; ?>
