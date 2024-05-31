<?php
namespace App\Models\AuthorsModel;

use \PDO;

function findAll(PDO $connexion): array 
{
    $sql = "SELECT * 
            FROM authors 
            ORDER BY created_at DESC
            LIMIT 3;";
    return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}

function findAllPopulars(PDO $connexion, array $params_user = []) :array
{
    $params_default = [
        'group_by' => 'b.author_id',
        'group_direction' => 'DESC',
        'order_by' => 'moyenne_notes',
        'order_direction' => 'DESC', 
        'limit' => 10,
        'offset' => 0
    ];
    $params = array_merge($params_default, $params_user);
    print_r($params);

    $sql ="SELECT AVG(un.note) AS moyenne_notes,
           b.id AS bookID, un.book_id AS bookID
           FROM users_notations un
           JOIN books b ON un.book_id = b.id
           ORDER BY "
           . htmlentities($params['order_by'])
           . " "
           . htmlentities($params['order_direction'])
           . "
           GROUP BY "
           . htmlentities($params['group_by'])
           . " "
           . htmlentities($params['group_direction'])
           . "
           LIMIT :limit
           OFFSET :offset;";

$rs = $connexion->prepare($sql);
$rs->bindvalue(':limit', $params['limit'], PDO::PARAM_INT);
$rs->bindvalue(':offset', $params['offset'], PDO::PARAM_INT);
$rs->execute();
return $rs->fetchAll(PDO::FETCH_ASSOC);

}