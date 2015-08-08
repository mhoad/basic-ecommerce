<?php
  echo 'Hello ' . htmlspecialchars($_POST["username"]) . '!';
  if (empty($_POST["username"])) {
    echo "Empty";
  }
  echo "World";
?>