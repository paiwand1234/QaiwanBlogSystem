<?php

// DESTROY THE SESSION
session_destroy();

header("Location: ../../../views/admin/login.php");
exit();