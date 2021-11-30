<?php

namespace Sogener\Crt\TaskSecond;

use Dotenv\Dotenv;
use PDO;
use PDOException;

/**
 * Подключение к базе данных
 */
class Dbconn
{
    /**
     * @return PDO|void
     */
    public static function make()
    {
        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();

        $dsn = "mysql:host={$_ENV['DOCKER_IMAGE_TITLE_MYSQL']};port={$_ENV['DOCKER_PORT_MYSQL']};dbname={$_ENV['MYSQL_DATABASE']}";
        $user = $_ENV['MYSQL_USER'];
        $password = $_ENV['MYSQL_PASSWORD'];

        try {
            $connection = new PDO($dsn, $user, $password);

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            die('Ошибка при подключении к бд: ' . $e->getMessage());
        }
    }
}