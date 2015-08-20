<?php 
  require 'functionality/checkout_functions.php';
  if (count($_POST) > 1) {
    //Get all the relevant values
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['customer_address'];
    $credit_card_number = $_POST['credit_card_number'];
    $credit_card_month = $_POST['credit_card_month'];
    $credit_card_year = $_POST['credit_card_year'];

    // Now we need to ensure that we validate all user input
    // Let's start by checking that the required fields are actually there
    validate_presence($first_name, "first name");
    validate_presence($last_name, "last name");
    validate_presence($email_address, "email address");
    validate_presence($phone_number, "phone number");
    validate_presence($credit_card_number, "credit card number");

    $address = clean_address_input($address);

    // Now we can perform additional validation for select fields that require it
    validate_email_address($email_address);
    validate_phone_number($phone_number);
    //validate_credit_card($credit_card_number);
    validate_credit_card_expiry($credit_card_month, $credit_card_year);

  } else {
    // If they access this page directly then set and error and send them back to where they came from
    $_SESSION["message_type"] = "alert-error";
    $_SESSION["message"] = "You need to have complete the checkout process first";
    header('Location: '. $_SERVER['HTTP_REFERER']);
  }

  if (count($errors) > 0) {
    // There were errors in the input we received so we need to get them fixed
    echo count($errors) . " errors detected <p>";
    echo var_dump($errors);

  } else {
    // All user input validated correctly 
    $order_data = array($first_name, $last_name, $email_address, $phone_number, $address);
    echo "Everything worked correctly";
    // First check if the customers.csv file already exists
    if (file_exists('orders.txt')) {
      // The file already exists so append to it to ensure we don't lose existing data
      $orders_file = fopen('orders.txt', 'a');
      // Write all data contained in the $order_data array
      fputcsv($orders_file, $order_data);
      // Close the file since we are done with it
      fclose($orders_file);
    } else {
      // This is a brand new file so we need to declare some headings first
      $orders_csv_headings = array("FirstName", "LastName", "Email", "PhoneNumber", "Address");
      $orders_file = fopen('orders.txt', 'w');
      //Put the headings before any data
      fputcsv($orders_file, $orders_csv_headings);
      // Write all data contained in the $order_data array
      fputcsv($orders_file, $order_data);
      // Finally close the CSV file
      fclose($orders_file);
    }
  }
?>
