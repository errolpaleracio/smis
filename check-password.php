<?php
session_start();
echo $_SESSION['password'] == $_GET['old_password'];