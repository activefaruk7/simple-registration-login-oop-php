<?php

spl_autoload_register(function($classes){

    include_once 'classes/' . $classes . '.php';

});

$db = new DB();