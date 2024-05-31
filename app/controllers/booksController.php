<?php

namespace App\Controllers\BooksController;

use \PDO, App\Models\BooksModel;

function indexAction(PDO $connexion)
{
    //Je vais demander des données aux modèles
    include_once '../app/models/booksModel.php';
    $books = BooksModel\findAll($connexion);

    //Je charge la vue index.php des books dans $content
    global $content, $title;
    $title = "latest books";
    ob_start();
    include '../app/views/books/index.php';
    $content = ob_get_clean();
}