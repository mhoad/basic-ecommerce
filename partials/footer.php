<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 ">
        &copy; 2015 Foot Freedom
      </div>
      <div class="col-md-4 text-center">
        <a href="privacy.php" id="privacy">Privacy Policy</a> - 
        <a href="sitemap.php" id="sitemap">Sitemap</a>
      </div>
      <div class="col-md-4 text-right vcenter">
        Made With Love:
      <a href="https://validator.w3.org/check/referer" target="_blank">
        <!-- Original image sourced from http://www.w3.org/html/logo/ -->
        <img src="img/HTML5_logo.svg" width="32" height="32" alt="HTML5 Logo" title="HTML5 Powered">   
      </a>
      <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank">
        <!-- Original image sourced from http://ohdoylerules.com/web/css3-badge-logo-in-svg -->
        <img src="img/CSS3_logo.svg" width="32" height="32" alt="CSS 3 Logo" title="CSS3 Powered">
      </a>
      </div>
    </div>
  </div>
</footer>

<!-- Include debug mode if running in production -->
<?php
  if( $_SERVER['HTTP_HOST'] != 'localhost:8888' && $_SERVER['HTTP_HOST'] != '127.0.0.1') {
    include_once("/home/eh1/e54061/public_html/wp/debug.php");
  }
?>