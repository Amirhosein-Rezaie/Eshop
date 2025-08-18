<?php session_start(); ?>
<?php (empty($_SESSION['Admin'])) ? header("location:./index.php") : null; ?>