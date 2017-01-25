<section class="calendar">
  <header class="section-title">
    <h1>agenda</h1>
  </header>
  <div class="flex-next">
    <div class="calendar-picker" id="caleandar">
    </div>
    <div class="calendar-detail"></div>
  </div>

</section>
<section>
  <header class="section-title">
    <h1>Filter</h1>
  </header>
  <form class="filter" action="index.php?page=program" method="POST">
    <div>
      <label for="title">Naam</label>
      <input type="text" name="title" value=""/>
    </div>
    <div class="">
      <div class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="moestuin" value="moestuin"/>
        <label for="moestuin">Moestuin</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="cozycozy" value="Cosy Cozy"/>
        <label for="cozycozy">Cozy Cozy</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="expo" value="expo"/>
        <label for="expo">Expo</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="gastvrijheid" value="gastvrijheid"/>
        <label for="gastvrijheid">Gastvrijheid</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="circus" value="circus"/>
        <label for="circus">Circus</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="voorstelling" value="voorstelling"/>
        <label for="voorstelling">Voorstelling</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="concert" value="concert"/>
        <label for="concert">Concert</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="werkgroep" value="werkgroep"/>
        <label for="werkgroep">Werkgroep</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="dj" value="dj"/>
        <label for="dj">dj</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="zondag" value="zondag"/>
        <label for="zondag">Zondag</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="rommelmarkt" value="rommelmarkt"/>
        <label for="rommelmarkt">Rommelmarkt</label>
      </div>
      <div  class="tag">
        <input class="checkbox" type="checkbox" name="tags[]" id="film" value="film"/>
        <label for="film">Film</label>
      </div>
    </div>
    <input type="submit" name="action" value="search"/>
    <input type="submit" name="action" value="verwijder filter"/>
  </form>
</section>

<section class="program">
  <header class="section-title">
    <h1>Volgende evenementen</h1>
  </header>
  <div class="program-events flex-next">

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
