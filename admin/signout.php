<?php
session_start();
unset($_SESSION['level']);

header('location:./index.php');
