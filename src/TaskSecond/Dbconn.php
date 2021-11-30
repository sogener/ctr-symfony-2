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


//            fixMe: Хот-фикс, исправить в будущем
            $sql = "create table users
(
	id int not null,
	name varchar(255) not null,
	age int not null,
	email varchar(50) not null
);

create unique index users_id_uindex
	on users (id);

alter table users
	add constraint users_pk
		primary key (id);

";
            $stmt = $connection->prepare($sql);
            if (!$stmt->execute()) {
                throw new Exception('Ошибка при создании таблицы в БД');
            }
            return $connection;
        } catch (PDOException $e) {
            die('Ошибка при подключении к бд: ' . $e->getMessage());
        }
    }
}