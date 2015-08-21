<?php 
  session_start();
  // Let's make sure that we don't show the admin page to anyone who happens to guess the URL
  // As a basic check lets ensure that their session email is set to the correct value
  if (!isset($_SESSION["email"]) OR $_SESSION["email"] !== "client@client.com") {
    $_SESSION["message_type"] = "alert-danger";
    $_SESSION["messages"] = array("You must be logged in as the client to view that page");
    // Intruder alert!!! Get them out of here
    header('Location: index.php');
    die();
  }


 ?>

<?php 
  require 'partials/head.php';
  require 'functionality/functions.php';
?>
  <body>
    <script type="text/javascript">
      function deleteOrders()
      {
          var r = confirm("Are you sure you want to delete all orders? Subtle Hint about the 'Usability is enhanced with creative programming or scripting' bonus mark. Oh and it also uses AJAX :-\)");
          if(r == true)
          {
              $.ajax({
                url: 'functionality/delete.php',
                success: function (response) {
                   alert("All orders successfully deleted");
                },
                error: function () {
                   alert("Unfortunately, it appears there was an error");
                }
              });
          }
      }
    </script>
    <div class="container-fluid">
      <?php require 'partials/navigation.php'; ?>
      <main>
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Welcome to the Admin Section</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading">Orders Placed via the Website</div>
              <!-- Table -->
              <table class="table">
              <?php 
                $orders_file = open_customer_orders();
              ?>
              <tbody>
                <?php
                  if ($orders_file === NULL) {
                    echo "<td>Sorry. There are currently no orders to display</td>";
                  } else {

                    $header = NULL;
                    if (($handle = fopen("orders.txt", 'r')) !== FALSE)
                    {
                        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE)
                        {
                            if(!$header)
                                $header = $row;
                            else
                                // $data[] = array_combine($header, $row);
                              echo "<tr>";  
                              foreach ($row as $value) {
                                echo "<td>" . $value . "</td>";
                              }
                              echo "</tr>";
                        }
                        fclose($handle);
                    }
                  }               
                ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <?php 
              if ($orders_file !== NULL) {
                echo "<a href='#'' id='delete_orders' class='btn btn-danger'>Delete All Orders</a>";
              }
             ?>
          </div>
        </div>
      </main>
      <?php require 'partials/footer.php'; ?>
    </div>
    <?php require 'partials/javascript.php'; ?>
    <script type="text/javascript">
      $( "#delete_orders" ).click(function() {
        deleteOrders();
      });
    </script>

    <?php 
      function open_customer_orders()
      {
        if (file_exists("orders.txt")) {
          $file = fopen("orders.txt","r");
          return $file;
        }
      }
     ?>
  </body>
</html>

