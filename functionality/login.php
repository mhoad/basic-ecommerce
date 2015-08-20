<?php
  session_start();

  // First check to ensure that both a username and password were entered
  if (empty($_POST["username"]) || empty($_POST["password"])) {
	 // If either is missing redirect them to the homepage with an error message
   $_SESSION["messages"] = array("You are missing either your username or password. Please try again");
   $_SESSION["message_type"] = "alert-warning";
   header('Location: '. $_SERVER['HTTP_REFERER']);
   die();
  }

  // Read in the current list of special customers
  $customer_list = load_customer_data("../customers.txt");

  // Loop through the array of customers to see if there is a username / password match
  foreach($customer_list as $customers)
  {
    if ($customers['Email'] == $_POST["username"] && authenticate_user($customers['crypt(password)'], $_POST["password"])) {
      //We have a match, so let's set all the relevant session variables, starting with the customer details
      $_SESSION["first_name"] = $customers['FirstName'];
      $_SESSION["last_name"] = $customers['LastName'];
      $_SESSION["email"] = $customers['Email'];
      $_SESSION["phone_number"] = $customers['Phone'];
      $_SESSION["discount_1"] = $customers['Discount-PS1'];
      $_SESSION["discount_2"] = $customers['Discount-PS2'];
      $_SESSION["discount_3"] = $customers['Discount-PS3'];

      // Finally, lets also set a message and message-type session variable so we can provide feedback to the user
      $_SESSION["message_type"] = "alert-success";
      $_SESSION["messages"] = array("You are now successfully logged in. Please enjoy your loyalty discounts!");
      // Once they are logged in we should send them back to whatever page they came from to ensure a smooth experience
      header('Location: '. $_SERVER['HTTP_REFERER']);
      die();
    }	
  }

  // At this point we have checked the login details provided against all enteries in the customer file and found
  // no matches so we can assume that the login details the user submitted were incorrect.
  $_SESSION["message_type"] = "alert-danger";
  $_SESSION["messages"] = array("Unfortunately, the login details you provided do not match any accounts. Please try again.");
  header('Location: '. $_SERVER['HTTP_REFERER']);

  // Take the password hash we already have and see if it is a match for the password entered.
  // PHP in all its weird goodness returns FALSE when the two strings match. Awesome!
  function authenticate_user($password_hash, $provided_password) {
    if (strcmp($password_hash, crypt($provided_password, $password_hash))) {
      return FALSE;
    } else {
      return TRUE;
    }
  }

  // Read in the provided TSV document and turn it into a key-value pair array
  function load_customer_data($filename='')
  {
      ini_set('auto_detect_line_endings', TRUE);
      if(!file_exists($filename) || !is_readable($filename))
          return FALSE;

      $header = NULL;
      $data = array();
      if (($handle = fopen($filename, 'r')) !== FALSE)
      {
          while (($row = fgetcsv($handle, 1000, " ")) !== FALSE)
          {
              if(!$header)
                  $header = $row;
              else
                  $data[] = array_combine($header, $row);
          }
          fclose($handle);
      }
      return $data;
  }
?>