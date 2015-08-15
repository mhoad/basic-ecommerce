<?php 

  $errors = array();

  function validate_presence($submitted_value, $form_attribute)
  {
    global $errors;
    if (empty($submitted_value)) {
      array_push($errors, "Please ensure you enter a value for the {$form_attribute} field");
    }
  }

  function validate_credit_card($credit_card_number)
  {
    global $errors;
    // Adapted from https://gist.github.com/troelskn/1287893
    settype($credit_card_number, 'string');
    // Remove any whitespace from the string to avoid problems 
    $credit_card_number = str_replace(' ', '', $credit_card_number);
    $sumTable = array(
      array(0,1,2,3,4,5,6,7,8,9),
      array(0,2,4,6,8,1,3,5,7,9));
    $sum = 0;
    $flip = 0;
    for ($i = strlen($credit_card_number) - 1; $i >= 0; $i--) {
      $sum += $sumTable[$flip++ & 0x1][$credit_card_number[$i]];
    }
    if ( $sum % 10 !== 0) {
      array_push($errors, "Please ensure you enter a valid credit card number");
    }
  }

  function validate_email_address($email_address)
  {
    global $errors;
    if (filter_var($email_address, FILTER_VALIDATE_EMAIL) === false) {
      array_push($errors, "Please ensure you enter a valid email address");
    }
  }

  function validate_phone_number($phone_number)
  {
    global $errors;
    # TODO: FIGURE OUT REGEX FOR THIS AND THROW AN ERROR IF INCORRECT...
  }

  function validate_credit_card_expiry($month, $year)
  {
    global $errors;
    // Create a new DataTime object for the customers card details
    $customer_card_expiry_date = new DateTime("{$year}-{$month}-1");

    // Create a new DateTime object for todays date
    $todays_date = getdate();
    $maximum_expiry_date = new DateTime("{$todays_date['year']}-{$todays_date['mon']}-1");

    //Check to see if the customers credit card expiry is earlier than this month
    if ($customer_card_expiry_date < $maximum_expiry_date) {
       array_push($errors, "Please ensure you enter a non-expired credit card");
     } 
  }

?>