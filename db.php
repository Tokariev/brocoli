<?php

    require "libs/rb.php";
    R::setup( 'mysql:host=localhost;dbname=brocoli',
    'root', '' ); //подключение к базе данных
    session_start();
