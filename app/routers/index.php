<?php

// ROUTER PRINCIPAL
 use App\Controllers\PagesController;

// ROUTE PAR DEFAUT
// PATERN : /
// CTRL : pagesController
// ACTION : homeAction

include_once '../app/controllers/pagesController.php';
PagesController\homeAction($connexion);