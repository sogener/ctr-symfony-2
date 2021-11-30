<?php

namespace Sogener\Crt\TaskSecond;

use Exception;

/**
 * Класс для валидации полей
 */
class UserFormValidator
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function validate(array $data): array
    {
//        Имя не должно быть пустым
        if (empty($data['name'])) {
            throw new Exception('Имя не должно быть пустым');
        }
        if ($data['age'] < 18) {
            throw new Exception('Возраст должен быть не менее 18 лет');
        }
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Email должен быть заполнен и соответствовать формату email.');
        }

        return $data;

    }
}