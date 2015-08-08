<?php require 'partials/head.php'; ?>
  <body>
    <div class="container-fluid">
      <?php require 'partials/navigation.php'; ?>
      <main>
        <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Sitemap</li>
      </ol>
      <div class="page-header">
        <h1>Sitemap</h1>
      </div>
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <p>
            This page is designed to help you find what you are looking for no matter where it is on our website. If you can't find what you want from the menus then you can find it here!
          </p>
          <?php 

            // TODO: May want to consider using http://php.net/manual/en/function.get-meta-tags.php to grab a description also.
            $dir    = getcwd();
            $files = scandir($dir);
            foreach ($files as $file) {
              if (preg_match("/^.*\.(html|php)$/", $file)) {
                echo "<p><a href ='" . $file . "'>" . $file . "</a> </p>" ;
              }
              
            }
           ?>
        </div>
      </div>
        
        
      </div>
      </main>
      <?php require 'partials/footer.php'; ?>
    </div>
      <?php require 'partials/javascript.php'; ?>
  </body>
</html>