<header>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">
          <img src="img/logo-foot-freedom.gif" alt="Foot Freedom Logo" height="30">
        </a>
      </div>
      <a href="cart.php" class="btn btn-primary navbar-btn" id="logout-button">
        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> View Cart
      </a>
      <div class="navbar-right">
        <?php if (isset($_SESSION["first_name"])): ?>
          <p class="navbar-text">Welcome back <?php echo $_SESSION["first_name"]; ?> </p>
          <a href="functionality/logout.php">
            <button type="button" class="btn btn-danger navbar-btn">Logout</button>
          </a>
        <?php else: ?>
          <form class="navbar-form" role="login" action="functionality/login.php" method="post">
            <div class="form-group">
                <input required class="form-control" type="email" id="username" name="username" placeholder="user@example.com">
            </div>
            <div class="form-group">
                <input required class="form-control" type="password" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-success">Sign In</button>
          </form>
        <?php endif ?>
      </div>
      
    </div>
  </nav> <!-- Fixed navbar -->
</header>

<!-- If we have any messages to display to the user then show them here -->
<?php if (isset($_SESSION["message"]) && isset($_SESSION["message_type"])): ?>
  <div class="alert <?php echo $_SESSION["message_type"] ?>" role="alert">
  <?php 
    echo $_SESSION["message"];
    $_SESSION["message"] = NULL;
   ?>
  </div>
<?php endif ?>