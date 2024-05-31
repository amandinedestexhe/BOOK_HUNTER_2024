<?php

namespace App\Controllers\PagesController;

use \PDO, App\Models\BooksModel, App\Models\AuthorsModel;

function homeAction(PDO $connexion)
{
    // Je vais demander des données aux modèles
    include_once '../app/models/booksModel.php';
    $books = BooksModel\findAllPopulars($connexion, [
        'limit' => 3
    ]);

    include_once '../app/models/authorsModel.php';
    $authors = AuthorsModel\findAllPopulars($connexion, [
        'limit' => 3
    ]);
    // Je charge la vue 'home' dans $content
    global $content, $title;
    $title = "HomePage";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}