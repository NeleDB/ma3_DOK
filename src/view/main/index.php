<?php $_SESSION['page'] = "home"; ?>
<header class="header">
  <picture class="header-image">
    <source type="image/webp" srcset="assets/img/header.webp" height="613" width="1052" />
    <img class="header-image"
     src="assets/img/header.png"
     srcset="assets/img/header.png 1052w,
             assets/img/header_75.png 789w,
             assets/img/header_50.png 526w,
             assets/img/default.gif 1w"
     height="613" width="1052"
     sizes="(min-width: 700px) 100vw,
       (min-width: 500px) 90vw,
       (min-width: 320px) 85vw,
       vw"
     alt="Dok2017"/>
  </picture>
  <div class="header-title">
    <h1 class="dok-title">Dok</h1>
    <h2 class="dok-date">01 Mei | 25 Sep</h2>
  </div>
</header>
<main>
  <section class="intro">
    <div class="intro-text">
      <header class="intro-title">
        <h1>Werkplek voor <strong>verpozing</strong> &amp; <strong>creatieve</strong> manoeuvers</h1>
      </header>
      <p>De hele zomer lang vanaf 1 mei tot 25 september</p>
    </div>
    <div class="intro-extra">
      <a href="#"><button type="button" class="button intro-button">Meer over DOK | &rarr; </button></a>
      <svg class="intro-svg" width="347px" height="344px" viewBox="600 6 347 344" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <defs>
              <pattern id="pattern-1" width="50" height="50" x="550.100838" y="-43.1549552" patternUnits="userSpaceOnUse">
                  <use xlink:href="#image-2" transform="scale(0.1,0.1)"></use>
              </pattern>
              <image id="image-2" width="500" height="500" xlink:href="assets/svg/pattern2.svg"</image>
          </defs>
          <path d="M681.604882,102.417132 C681.604882,102.417132 689.717475,76.6052046 735.344232,63.7590684 C780.97099,50.9129321 772.068675,25.704065 813.608025,12.8052807 C855.147375,-0.0935036694 941.203087,-4.04689731 946.582765,131.373586 C951.962444,266.79407 889.282488,371.305333 754.44592,345.325889 C619.609352,319.346446 600.100838,219.808035 600.100838,202.716547 C600.100838,185.62506 601.393109,178.096381 601.393109,178.096381 L685.094015,178.488849 L681.604882,102.417132 Z" id="Path-2" stroke="none" fill="#f5c13e" fill-rule="evenodd"></path>
          <path d="M681.604882,102.417132 C681.604882,102.417132 689.717475,76.6052046 735.344232,63.7590684 C780.97099,50.9129321 772.068675,25.704065 813.608025,12.8052807 C855.147375,-0.0935036694 941.203087,-4.04689731 946.582765,131.373586 C951.962444,266.79407 889.282488,371.305333 754.44592,345.325889 C619.609352,319.346446 600.100838,219.808035 600.100838,202.716547 C600.100838,185.62506 601.393109,178.096381 601.393109,178.096381 L685.094015,178.488849 L681.604882,102.417132 Z" id="Path-2" stroke="none" fill="url(#pattern-1)" fill-rule="evenodd"></path>
      </svg>
      <picture class="intro-picture">
        <source type="image/webp" srcset="assets/img/intro-picture.webp" />
        <img class="intro-picture" src="assets/img/intro-picture.png" alt="dok-picture" width="447" height="298"/>
      </picture>
    </div>
  </section>
  <section>
    <header class="section-title">
      <h1>Volgende evenementen</h1>
    </header>
    <div class="next-events">

      <?php
      $i = 0;
      foreach( $events as $event ):
        $i++;
        if($i === 4) break;
      ?>
        <article class="event">
          <a href="index.php?page=detail&id=<?php echo $event["id"]?>">
            <img class="event-picture" src="assets/img/programma-images/<?php echo $event["picture"];?>"/>
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
    </div>
    <a class="programma-button" href="index.php?page=program"><button type="button" class="button">Programma | &rarr; </button></a>
  </section>
  <section class="dok-numbers">
    <header>
      <h1 class="section-title">Dok in cijfers</h1>
    </header>
    <div class="numbers">
      <article class="numbers-article">
        <div class="number">
          <img class="number-image" src="assets/img/dok-number1.png" alt="dokbewoners" width="155px" height="155px"/>
          <p class="number-text">267</p>
        </div>
        <p class="number-title">DOKbewoners</p>
      </article>
      <article class="numbers-article">
        <div class="number">
          <img class="number-image" src="assets/img/dok-number2.png" alt="dokbezoekers" width="155px" height="155px"/>
          <p class="number-text">1058</p>
        </div>
        <p class="number-title">Bezoekers in 2016</p>
      </article>
      <article class="numbers-article">
        <div class="number">
          <img class="number-image" src="assets/img/dok-number3.png" alt="creatieve-manoeuvers" width="155px" height="155px"/>
          <p class="number-text">457</p>
        </div>
        <p class="number-title">Creatieve manoeuvers</p>
      </article>
    </div>
  </section>
  <section class="dok-news">
    <header>
      <h1 class="section-title">Doknieuws</h1>
    </header>
    <article class="news-item">
      <div class="news-img-div">
        <img class="news-img" src="assets/img/news-item1.png" alt="blog1" width="377" height="252">
      </div>
      <div class="news">
        <h1 class="news-title">Dit is Dok 2017</h1>
        <p class="news-date">02 januari 2017</p>
        <p class="news-text">DOK gaat in een diepe winterslaap, maar zijn DOKbewoners zijn dat allerminst van plan. We geven je graag een overzicht van wat iedereen zoal van plan is, het komende jaar.</p>
        <a class="news-link" target="_blank" href="http://dokgent.be/dokbewoners-wat-na-dok-2016/">Lees meer ></a>
      </div>
    </article>
    <article class="news-item">
      <div class="news-img-div">
        <img class="news-img" src="assets/img/news-item2.png" alt="blog2" width="377" height="252">
      </div>
      <div class="news">
        <h1 class="news-title">Het boek DOK2016</h1>
        <p class="news-date">21 oktober 2016</p>
        <p class="news-text">DOK, Ben Benaouisse en Topo Copy vonden elkaar in hun zoektocht naar een manier om 2016 te verslaan, te grijpen of te vatten. Vandaar dit boek: LAT, LIVING APART TOGETHER</p>
        <a class="news-link"  target="_blank" href="http://dokgent.be/publicatie-lat/">Lees meer ></a>
      </div>
    </article>
  </section>
  <section class="nieuwsbrief">
    <div class="flex-next nieuwsbrief-zin">
      <img src="assets/svg/enveloppe.svg" alt="email-enveloppe" width="70px" height="37px"/>
      <p>Ik ontvang graag op <input class="nieuwsbrief-input" type="email" name="email" value="" placeholder="email adres"/> mails over DOK</p>
    </div>
    <a href="#"><button type="button" class="button nieuwsbrief-button">Inschrijven | &rarr; </button></a>
  </section>
</main>
