<?php

// DESTROY THE SESSION
session_destroy();

header("Location: ../../../views/user/login.php");
exit();