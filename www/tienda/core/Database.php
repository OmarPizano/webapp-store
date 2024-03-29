<?php
namespace tienda\core;
use mysqli;

abstract class Database {
    public static function connect()
    {
        $conn = new mysqli(
            constant('DB_HOST'),
            constant('DB_USER'),
            constant('DB_PASSWORD'),
            constant('DB_NAME'),
            constant('DB_PORT'),
            constant('DB_SOCKET')
        );
        if ($conn->connect_error) {
            die('ERROR: no se puede conectar a la base de datos: ' . $conn->connect_error);
        } else {
            return $conn;
        }
    }

    public static function checkRecord(string $table, string $column, string $value) {
        $conn = self::connect();
        $stm = $conn->prepare("SELECT * FROM {$table} WHERE {$column} = ?");
        $stm->bind_param('s', $value);
        if (!$stm->execute()) { return false; }
        $row = $stm->get_result()->fetch_assoc();
        return (is_countable($row)) ? true : false;
    }
}