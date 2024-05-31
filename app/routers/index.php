<?php

// ROUTER PRINCIPAL
 use App\Controllers\PagesController;
 use App\Controllers\BooksController;


 // ROUTE DES BOOKS
 // PATTERN: /?books
 // CTRL: photosController
 // ACTION: indexAction

if (isset($_GET['books'])) :
    include_once '../app/controllers/booksController.php';
    BooksController\indexAction($connexion);

// ROUTE PAR DEFAUT
// PATERN : /
// CTRL : pagesController
// ACTION : homeAction
else:
    include_once '../app/controllers/pagesController.php';
    PagesController\homeAction($connexion);

endif;