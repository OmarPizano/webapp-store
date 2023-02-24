<?php
namespace tienda\core;
use tienda\core\Database;

abstract class ActiveRecord
{
    protected static string $table_name = '';
    protected static array $table_columns = [];
    protected static string $primary_key = '';

    /** 
     * Busca un registro por ID y lo retorna como objeto.
     * Si no lo encuentra, retorna null.
     * En caso de error, retorna false.
     */
    public static function find(string $id)
    {
        $query = static::makeQuerySelectByID($id);
        $result = static::executeQuery($query);
        if ($result === false) { return false; }
        return (count($result) === 0) ? null : static::makeObject($result[0]);
    }

    /**
     * Retorna un array de objetos del tipo definido por la clase que hereda.
     * Si no encuentra registros, regresa un arreglo vacío.
     * En caso de error, regresa false.
     */
    public static function all()
    {
        $query = static::makeQuerySelectAll();
        $result = static::executeQuery($query);
        if ($result === false) { return false; }
        $objects = [];
        foreach ($result as $row) {
            $objects[] = static::makeObject($row);
        }
        return $objects;
    }
    
    /**
     * Crea un nuevo registro, o actualiza si el id ya existe.
     * Retorna true/false.
     */
    public function save()
    {
        if (static::existID(static::id)) {
            $query = static::makeQueryUpdateByID();
        } else {
            $query = static::makeQueryInsert();
        }
        $result = static::executeQuery($query);
        return ($result === true) ? true: false;
    }
     
    /**
     * Elimina el registro asociado al objeto.
     * Retorna true/false.
     */
    public function delete()
    {
        if (static::existID(static::id)) {
            $query = static::makeQueryDeleteByID();
            $result = static::executeQuery($query);
            return ($result === true) ? true: false;
        } else {
            return false;
        }
    }

    /**
     * Genera y asigna un nuevo identificador único.
     * Usar esta función al momento de crear un nuevo registro.
     * Hace una consulta con la función UUID() en MySQL.
     */
    public function setID(): bool
    {
        $query = 'SELECT SUBSTR(REPLACE(UUID(),\'-\',\'\'),1,6) as uuid';
        $result = static::executeQuery($query);
        if ($result === false) { return false; }
        return $result[0]['uuid'];
    }
   
    /**
     * Verifica que exista un registro con el identificador indicado.
     */
    private function existID(string $id)
    {
        $query = static::makeQuerySelectByID($id);
        $result = static::executeQuery($query);
        return (count($result) === 0) ? false: true;
    }

    /**
     * Crea un objeto a partir de un registro (array asociativo).
     * El tipo es determinado a partir de la clase que hereda.
     */
    private static function makeObject(array $row)
    {
        $object = new static;
        foreach ($row as $key => $value) {
            if (property_exists($object, $key)) {
                $object->{$key} = (is_null($value)) ? '' : $value;
            }
        }
        return $object;
    }

    /**
     * Ejecuta una consulta SQL.
     * Para SELECT retorna un array con los resultados (puede estar vacío).
     * Para consultas INSERT, UPDATE y DELETE retorna true.
     * En caso de error, retorna false.
     */
    private static function executeQuery(string $query)
    {
        $conn = Database::connect();
        $result = $conn->query($query);
        if ($result === false) { return false; }
        if (! is_bool($result)) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            $result = $rows;
        }
        $conn->close();
        return $result;
    }

    /**
     * Retorna la cadena para una consulta SELECT con filtrado por ID.
     */
    private static function makeQuerySelectByID(string $id)
    {
        $query = static::makeQuerySelectAll();
        $query .= ' WHERE ' . static::$primary_key . ' = \'' . $id . '\'';
        return $query;
    }
    
    /**
     * Retorna la cadena para una consulta SELECT sin filtrado.
     * Usa los nombres de las columnas indicados por la clase hija.
     */
    private static function makeQuerySelectAll()
    {
        $query = 'SELECT ';
        $col_count = count(static::$table_columns);
        for ($i = 0; $i < $col_count; $i++) { 
            $query .= static::$table_columns[$i];
            $query .= ($i+1 == $col_count) ? ' ': ', ';
        }
        $query .= 'FROM ' . static::$table_name;
        return $query;
    }

    /**
     * Retorna la cadena para una consulta INSERT.
     * Los datos a insertar se obtienen de los atributos de la clase hija.
     * Si algún atributo no está definido o es null, se pone NULL en el query.
     */
    private function makeQueryInsert()
    {
        $query = 'INSERT INTO ' . static::$table_name . ' VALUES(';
        $col_count = count(static::$table_columns);
        for ($i = 0; $i < $col_count; $i++) {
            $property = static::$table_columns[$i];
            if (empty($this->{$property})) {
                $query .= 'NULL';
            } else {
                $query .= (is_string($this->{$property})) ? '\'' . $this->{$property} . '\'' : $this->{$property};
            }
            $query .= ($i+1 != $col_count) ? ', ':'';
        }
        $query .= ')'; 
        return $query;
    }

    /**
     * Retorna la cadena para una consulta UPDATE filtrada por id.
     * El id se obtiene de la clase hija.
     */
    private function makeQueryUpdateByID()
    {
        $query = 'UPDATE ' . static::$table_name . ' SET ';
        $col_count = count(static::$table_columns);
        for ($i = 0; $i < $col_count; $i++) { 
            $property = static::$table_columns[$i];
            if ($property === static::$primary_key) { continue; }
            $query .= static::$table_columns[$i] . ' = ';
            if (!isset($this->{$property})) {
                $query .= 'NULL';
            } else {
                $query .= (is_string($this->{$property})) ? '\'' . $this->{$property} . '\'' : $this->{$property};
            }
            $query .= ($i+1 != $col_count) ? ', ':' ';
        }
        $query .= 'WHERE ' . static::$primary_key . ' = \'' . static::id . '\'';
        return $query;
    }
    
    /**
     * Genera la cadena para una consulta DELETE filtrada por id.
     * Los id se obtiene de la clase hija.
     */
    private function makeQueryDeleteByID()
    {
        $query = 'DELETE FROM ' . static::$table_name;
        $query .= ' WHERE ' . static::$primary_key . ' = \'' . static::id . '\'';
        return $query;
    }
}