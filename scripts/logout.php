<?php
// Start a new session or resume an existing one
if (!isset($_SESSION)) {
  session_start();
}

// Check if the user clicked the logout button
if (isset($_POST["logout"])) {
  // Clear the session data and destroy the session
  session_unset();
  session_destroy();

  // Redirect to the login page
  header("Location: index.php");
  exit();
}

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  // Redirect to the login page
  header("Location: index.php");
  exit();
}
?>