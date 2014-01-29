<?php
session_start();

echo "Welcome " . $_SESSION['logged_in_user'];
echo "<h1>Admin Backend</h1>";