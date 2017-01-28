<?php $monthArray = ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'Novermber', 'December']; ?>

<section class="calendar">
  <header class="section-title">
    <h1>agenda</h1>
  </header>
  <div class="calendar-part" id="calendar">
    <div class="calendar-picker" id="caleandar">
    </div>
    <div class="calendar-detail"></div>
  </div>
  <a class="open-calendar hidden" href="#calendar">Open agenda &#9661;</a>
</section>
<section class="filter">
  <header class="section-title">
    <h1>Filter</h1>
  </header>
  <form class="filter-form" action="index.php?" method="GET" id="filter">
    <span><input type="text" name="page" value="program"/></span>
    <div>
      <label for="title">Naam</label>
      <input type="text" name="title" value=""/>
    </div>
    <p class="filter-tags">Tags</p>
    <div class="filter-form-tags">
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
    <a class="filter-more hidden" href="#filter">Meer filters &#9661;</a>
    <div class="flex-next filter-buttons">
      <input class="button filter-button" type="submit" name="action" value="search">
      <input class="filter-delete" type="submit" name="action" value="verwijder filter"/>
    </div>
  </form>
</section>

<section class="program" id="events">
  <header class="section-title">
    <h1>Volgende evenementen</h1>
  </header>
  <div class="program-events flex-next">
    <?php if(empty($events)):?>
      <p class="no-events">Er zijn geen evenementen</p>
    <?php else: ?>
    <?php
    foreach( $events as $event ):
    ?>
    <?php $info = pathinfo($event["picture"]);?>
      <article class="event">
        <a href="index.php?page=detail&id=<?php echo $event["id"]?>">
          <picture class="event-picture-div">
            <source type="image/webp" srcset="assets/img/programma-images/<?php echo $info["filename"].'.webp'?>" />
            <img class="event-picture" src="assets/img/programma-images/<?php echo $event["picture"];?>"/>
          </picture>
        </a>
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
    <?php endif; ?>
  </div>
</section>
<section class="month-select">
  <?php if (isset($_GET["action"]) && $_GET["action"] === 'search'): ?>
  <?php else: ?>
    <?php
    if(isset($_GET["month"])):
      $currentMonth = $_GET["month"]-1;
      $nextMonth = $currentMonth+1;
      $prevMonth = $currentMonth-1;
    endif;

    if($nextMonth === 13): $nextMonth = 1;
    elseif($prevMonth === 0): $prevMonth = 12;
    endif;
    ?>
    <a class="month-select-link" href="index.php?page=program&month=<?php echo $prevMonth ?>#events"> &#9664;<?php echo $monthArray[$prevMonth-1]?></a>
    <a class="month-select-link" href="index.php?page=program&month=<?php echo $nextMonth?>#events"><?php echo $monthArray[$nextMonth-1]?> &#9658;</a>
  <?php endif; ?>

</section>
