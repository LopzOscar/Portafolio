<?php
session_start();
unset ($_SESSION['email']);
unset ($_SESSION['privilegios']);
session_destroy();
header('Location: index.php');