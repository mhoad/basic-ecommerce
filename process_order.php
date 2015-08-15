<?php 
  require 'functionality/checkout_functions.php';
  if (count($_POST) > 1) {
    //Get all the relevant values
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
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
    echo count($errors) . " errors <p>";
    echo "Everything worked. Here are the values: <p>";
    echo $first_name . "<p>";
    echo $last_name . "<p>";
    echo $email_address . "<p>";
    echo $phone_number . "<p>";
    echo $credit_card_number . "<p>";
    echo $credit_card_month . "<p>";
    echo $credit_card_year . "<p>";

  }
?>
