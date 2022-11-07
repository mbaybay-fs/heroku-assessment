<?php

$con = new mysqli('localhost', 'root', 'password', 'heroku-assessment');

if (!$con) die(mysqli_error($con));
