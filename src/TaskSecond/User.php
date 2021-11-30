<?php

namespace Sogener\Crt\TaskSecond;

use Exception;
use PDO;

/**
 * Модель пользователя
 */
class User
{
    /**
     * @var PDO
     */
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function load(int $id): bool
    {
        if (empty($id)) {
            throw new \Exception('ID пользователя указано не верно');
        }

        $validate = new UserFormValidator();
        $valid = $validate->validate($_POST);
        return $this->save($valid);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool
    {
        try {
            $id = $data['id'];
            $name = $data['name'];
            $age = $data['age'];
            $email = $data['email'];

            $sql = "SELECT id FROM users WHERE id={$id}";
            $stmt = $this->pdo->query($sql);

            if ($valueExists = $stmt->fetch(PDO::FETCH_ASSOC)) {
                throw new Exception('Ошибка! Значение в БД уже существует');
            }
            unset($sql, $stmt);

            $sql = "INSERT INTO  users VALUES ('$id', '$name', '$age', '$email')";
            $stmt = $this->pdo->prepare($sql);

            if (!$stmt->execute()) {
                throw new Exception('Ошибка при сохранении данных в БД');
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
        return true;
    }
}