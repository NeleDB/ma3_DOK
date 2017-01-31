<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> DOK | <?php echo $_GET['page'] ?></title>
    <meta name="description" content="Dok Gent evenementen deze zomer in Gent"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="keywords" content="DOK Gent, 1mei tot 25sep, Gent, dokken"/>
    <meta name="author" content="Nele De Bruycker"/>
    <?php echo $css;?>
    <script>

      WebFontConfig = {
        custom: {
          families: ['Adam CG'],
          urls: ['../dok/assets/fonts/adamcg/adamcg.css']
        }
      };

      (function(d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js';
        s.parentNode.insertBefore(wf, s);
      })(document);

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/nl_BE/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
  </head>
  <body>
    <nav class="navigation">
      <ul class="navigation-list">
        <li class="navigation-item">
          <a class="" href="index.php"><img class="dok-logo" src="assets/img/dokgent-logo.png" alt="dok-logo" width="111" height="42"></a>
        </li>
        <li class="navigation-item">
          <a class="navigation-link hidden-mobile" href="#">Zones</a>
        </li>
        <li class="navigation-item">
          <a class="navigation-link" href="index.php?page=program">Programma</a>
        </li>
        <li class="navigation-item">
          <a class="navigation-link" href="#">Praktisch</a>
        </li>
        <li class="navigation-item">
          <a class="navigation-link hidden-mobile" href="#">Over DOK</a>
        </li>
        <li class="navigation-item">
          <a class="navigation-link hidden-mobile" href="#">Blogs</a>
        </li>
        <div class="social-links hidden-mobile">
          <li class="navigation-item">
            <a href="https://www.facebook.com/DOKgent/"><img src="assets/svg/facebook-icon.svg" alt="facebook"></a>
          </li>
          <li class="navigation-item">
            <a href="https://twitter.com/DOKGENT"><img src="assets/svg/twitter-icon.svg" alt="twitter"></a>
          </li>
          <li class="navigation-item">
            <a href="https://www.instagram.com/dokgent/"><img src="assets/svg/instagram-icon.svg" alt="instagram"></a>
          </li>
        </div>
      </ul>
    </nav>
    <!--<iframe width="420" height="315"
      src="https://www.youtube.com/embed/6KIyCC_3fss">
    </iframe>-->

    <div class="container">
      <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?>
      <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?>
    </div>
      <?php echo $content; ?>

    <footer class="footer" id = "footer">
      <nav>
        <ul class="footer-navigation">
          <li class="mobile-item-zones">
            <a class="footer-navigation-link mobile-link-zones" href="#footer">Zones</a>
          </li>
          <li >
            <a class="footer-navigation-link" href="index.php?page=program">Programma</a>
          </li>
          <li class="mobile-item-praktisch">
            <a class="footer-navigation-link mobile-link-praktisch" href="#footer">Praktisch</a>
          </li>
          <li>
            <a class="footer-navigation-link" href="#">Over DOK</a>
          </li>
          <li>
            <a class="footer-navigation-link" href="#">Blogs</a>
          </li>
        </ul>
      </nav>
      <div class="footer-info">
        <address class="address">
          Splitsing Koopvaardijlaan – Afrikalaan </br>
          9000 Gent </br>
          <a class="footer-navigation-link" href="mailto:info@dokgent.be">info@dokgent.be</a>
        </address>
        <div class="social-links">
          <p>Volg ons op</p>
          <ul class="social-links">
            <li class="navigation-item">
              <a href="https://www.facebook.com/DOKgent/"><img src="assets/svg/facebook-icon.svg" alt="facebook"></a>
            </li>
            <li class="navigation-item">
              <a href="https://twitter.com/DOKGENT"><img src="assets/svg/twitter-icon.svg" alt="twitter"></a>
            </li>
            <li class="navigation-item">
              <a href="https://www.instagram.com/dokgent/"><img src="assets/svg/instagram-icon.svg" alt="instagram"></a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <section class="sponsors">
      <a href="http://www.biofresh.be/index.php?id=54"><img src="assets/img/sponsors/biofresh.png" alt="biofresh" width="55" height="39"/></a>
      <a href="http://www.bionade.de"><img src="assets/img/sponsors/bionade.png" alt="bionade" width="91" height="26"/></a>
      <a href="https://www.cirq.be"><img src="assets/img/sponsors/cirq.png" alt="cirq" width="42" height="41"/></a>
      <a href="http://www.democrazy.be"><img src="assets/img/sponsors/demo.png" alt="demo" width="96" height="20"/></a>
      <a href="http://www.eaulala.be"><img src="assets/img/sponsors/eaulala.png" alt="eaulala" width="48" height="38"/></a>
      <a href="https://stad.gent"><img src="assets/img/sponsors/gent-vernieuwt.png" alt="gent-vernieuwt" width="96" height="35"/></a>
      <a href="http://www.pepsi.com/nl-be/d"><img src="assets/img/sponsors/pepsi.png" alt="pepsi" width="75" height="29"/></a>
      <a href="http://www.sogent.be"><img src="assets/img/sponsors/sogent.png" alt="sogent" width="63" height="42"/></a>
      <a href="http://www.thuisindestad.be"><img src="assets/img/sponsors/thuisindestad.png" alt="thuisindestad" width="59" height="38"/></a>
      <a href="http://vedett.be"><img src="assets/img/sponsors/vedette.png" alt="vedette" width="42" height="43"/></a>
      <a href="http://www.vlaanderen.be/nl"><img src="assets/img/sponsors/vlaamse-overheid.png" alt="vlaamse-overheid" width="110" height="32"/></a>

    </section>
    <?php echo $js;?>
  </body>
</html>
