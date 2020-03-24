<?php
unset($_SESSION['user']);
session_destroy();
unset($_POST['username']);