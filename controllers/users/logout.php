<?php

// DESTROY THE SESSION
session_destroy();

header("Location: ../../views/user/register.php");
exit();


