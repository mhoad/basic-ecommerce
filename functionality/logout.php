<?php 
  // Pretty simple, just take the session, make all variables NULL 
  // and then destroy the session before redirecting them back to where they came from.
  session_start();
  session_unset();
  session_destroy();

  //Let them know that they have successfully logged out also (requires a fresh session)
  session_regenerate_id(true);
  session_start();
  $_SESSION["message_type"] = "alert-success";
  $_SESSION["message"] = "You have successfully signed out!";
  header('Location: '. $_SERVER['HTTP_REFERER']);
?>