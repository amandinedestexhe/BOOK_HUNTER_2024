<?php

namespace App\Models\BooksModel;

use \PDO;

function findAll(PDO $connexion): array 
{
    $sql = "SELECT *, b.id AS bookID, a.id AS authorID
            FROM books b
            JOIN authors a ON b.author_id = a.id
            ORDER BY b.created_at DESC
            LIMIT 3;";
    return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}

function findAllPopulars(PDO $connexion, array $params_user = []) : array
{
    $params_default = [
        'order_by' => 'un.note',
        'order_direction' => 'DESC',
        'limit' => 10,
        'offset' => 0

    ];
    $params = array_merge($params_default, $params_user);
    print_r($params);

    $sql ="SELECT *, b.id AS bookID, un.book_id AS bookID
           FROM books b
           JOIN users_notations un ON un.book_id = b.id
           ORDER BY "
           . htmlentities($params['order_by'])
           . " "
           . htmlentities($params['order_direction'])
           . "
           LIMIT :limit
           OFFSET :offset;";

$rs = $connexion->prepare($sql);
$rs->bindvalue(':limit', $params['limit'], PDO::PARAM_INT);
$rs->bindvalue(':offset', $params['offset'], PDO::PARAM_INT);
$rs->execute();
return $rs->fetchAll(PDO::FETCH_ASSOC);

}

