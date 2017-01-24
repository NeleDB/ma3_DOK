<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta property="og:url" content="http://www.your-domain.com/your-page.html" />
    <meta property="og:type" content="DOK GENT" />
    <meta property="og:title" content="DOK GENT" />
    <meta property="og:description" content="Werkplek voor verpozing &amp; creatieve manoeuvers" />
    <meta property="og:image" content="http://student.howest.be/nele.de.bruycker/20162017/ma3/dok/assets/img/dok-number1.png" />
</head>
    <title>DOK</title>
    <?php echo $css;?>
    <link rel="stylesheet" href="css/style.css">

    <script>

      WebFontConfig = {
        custom: {
          families: ['Adam CG'],
          urls: ['../assets/fonts/adamcg/adamcg.css']
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
          <a class="" href="index.php"><img src="assets/img/dokgent-logo.png" alt="dok-logo" width="111" height="42"></a>
        </li>
        <li class="navigation-item">
          <a class="navigation-link" href="#">Zones</a>
        </li>
        <li class="navigation-item">
          <a class="navigation-link" href="index.php?page=program">Programma</a>
        </li>
        <li class="navigation-item">
          <a class="navigation-link" href="#">Praktisch</a>
        </li>
        <li class="navigation-item">
          <a class="navigation-link" href="#">Over DOK</a>
        </li>
        <li class="navigation-item">
          <a class="navigation-link" href="#">Blogs</a>
        </li>
        <div class="social-links">
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

      <?php echo $content; ?>
    </div>

    <?php echo $js;?>

    <footer class="footer">
      <nav>
        <ul class="footer-navigation">
          <li>
            <a class="footer-navigation-link" href="#">Zones</a>
          </li>
          <li>
            <a class="footer-navigation-link" href="index.php?page=program">Programma</a>
          </li>
          <li>
            <a class="footer-navigation-link" href="#">Praktisch</a>
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
  </body>
</html>
