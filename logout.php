<?php
session_start();
<<<<<<< HEAD
session_destroy();
header("Location: login.php");
exit();
=======
session_unset();
session_destroy();
header("Location: login.php");
exit;
>>>>>>> 791faf4f1a50c3cd025ef2c64d96fd91ba031904
