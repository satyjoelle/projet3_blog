<?php
session_start();
require './app/Router.php';

$router = new Router();
$router->routerRequete();