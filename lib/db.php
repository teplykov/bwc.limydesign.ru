<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 12.07.17
 * Time: 21:37
 */

date_default_timezone_set('UTC');

setlocale(LC_TIME, 'ru_RU.utf8');

global $db;

$db = new mysqli('localhost', 'root', 'root', 'blog');
$db->query('SET NAMES utf8');
