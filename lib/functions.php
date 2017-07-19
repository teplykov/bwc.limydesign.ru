<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 12.07.17
 * Time: 21:42
 */

function getCategory()
{
    global $db;

    $query = $db->query('SELECT * FROM categories');
    $result = [];
    while ($ar = $query->fetch_assoc()) {
        $result[] = $ar;
    }

    return $result;
}

/**
 * Функция получает все статьи
 *
 * @return array
 */
function getArticles()
{
    global $db;

    $cat_id = isset($_GET['category']) && $_GET['category'] ? $_GET['category'] : 0;

    $sql = 'SELECT * FROM articles ar LEFT JOIN authors au ON ar.author_id = au.id';
    if ($cat_id) {
        $sql .= ' WHERE ar.category_id = ?';
    }
    $sql .= ' ORDER BY ar.date DESC LIMIT 0, 5';

    $q = $db->prepare($sql);
    if ($cat_id) {
        $q->bind_param('i', $cat_id);
    }
    $q->execute();

    $result = [];
    if ($rs = $q->get_result()) {
        while ($ar = $rs->fetch_assoc()) {
            if ($ar['date']) {
                $ar['date'] = strftime('%a %e %B %G', strtotime($ar['date']));
            }
            $result[] = $ar;
        }
    }

    return $result;
}

function getArticle()
{
    global $db;

    $q = $db->prepare('SELECT * FROM articles ar LEFT JOIN authors au ON ar.author_id = au.id WHERE ar.id = ?');
    $q->bind_param('i', $_GET['article']);
    $q->execute();

    $result = $q->get_result()->fetch_assoc();
    if ($result['date']) {
        $result['date'] = strftime('%a %e %B %G', strtotime($result['date']));
    }

    return $result;
}