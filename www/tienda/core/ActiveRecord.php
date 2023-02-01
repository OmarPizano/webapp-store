<?
namespace tienda\core;
use tienda\core\Database;

abstract class ActiveRecord
{
    protected static string $table_name = '';
    protected static array $table_columns = [];
    protected static string $primary_key = '';

    /** 
     * Busca un registro por ID y lo retorna como objeto.
     * Si no lo encuentra, retorna false.
     */
    public static function find(string $id)
    {
        $query = static::makeQuerySelectByID($id);
        $result = static::executeQuery($query);
        return (count($result) === 0) ? false: static::makeObject($result[0]);
    }

    /**
     * Retorna un array de objetos del tipo definido por la clase que hereda.
     * Si no encuentra nada, retorna false.
     */
    public static function all()
    {
        $query = static::makeQuerySelectAll();
        $result = static::executeQuery($query);
        if (count($result) === 0) { return false; }
        $objects = [];
        foreach ($result as $row) {
            $objects[] = static::makeObject($row);
        }
        return $objects;
    }
    
    /**
     * Crea ó actualiza el registro asociado (id) al objeto.
     */
    public function save()
    {
        if (static::existID($this->id)) {
            $query = static::makeQueryUpdateByID();
        } else {
            $query = static::makeQueryInsert();
        }
        $result = static::executeQuery($query);
        return ($result === true) ? true: false;
    }
    
    /**
     * Elimina el registro asociado al objeto.
     */
    public function delete()
    {
        if (static::existID($this->id)) {
            // delete
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
        $this->id = $result[0]['uuid'];
        return true;
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
                $object->$key = (is_null($value)) ? '' : $value;
            }
        }
        return $object;
    }

    /**
     * Ejecuta una consulta SQL.
     * Para consultas SELECT retorna un array con los resultados (puede estar
     * vacío). Para consultas INSERT, UPDATE y DELETE retorna true o false.
     * En todo caso, si hay algún error, también retornará false.
     */
    private static function executeQuery(string $query)
    {
        $conn = Database::connect();
        $result = $conn->query($query);
        if ($conn->errno != 0) { return false; }
        if (! is_bool($result)) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            $result = $rows;
        }
        $conn->close();
        return $result;
    }

    /**
     * Genera la cadena para una consulta SELECT con filtrado por ID.
     */
    private static function makeQuerySelectByID(string $id)
    {
        $query = static::makeQuerySelectAll();
        $query .= ' WHERE ' . static::$primary_key . ' = \'' . $id . '\'';
        return $query;
    }
    
    /**
     * Genera la cadena para una consulta SELECT sin filtrado.
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
     * Genera la cadena para una consulta INSERT.
     * Los datos a insertar se obtienen del objeto instanciado.
     */
    private function makeQueryInsert()
    {
        $query = 'INSERT INTO ' . static::$table_name . ' VALUES(';
        $col_count = count(static::$table_columns);
        for ($i = 0; $i < $col_count; $i++) {
            $property = static::$table_columns[$i];
            if ($this->$property === false) {
                $query .= 'NULL';
            } else {
                if (is_string($this->$property)) {
                    $query .= '\'' . $this->$property . '\'';
                } else {
                    $query .= intval($this->$property);
                }
            }
            $query .= ($i+1 != $col_count) ? ', ':'';
        }
        $query .= ')'; 
        return $query;
    }

    /**
     * Genera la cadena para una consulta UPDATE.
     * Los datos de filtrado se obtienen del objeto instanciado.
     */
    private function makeQueryUpdateByID()
    {
        $query = 'UPDATE ' . static::$table_name . ' SET ';
        $col_count = count(static::$table_columns);
        for ($i = 0; $i < $col_count; $i++) { 
            $property = static::$table_columns[$i];
            if ($property === 'id') { continue; }
            $query .= static::$table_columns[$i] . ' = ';
            if ($this->$property === false) {
                $query .= 'NULL';
            } else {
                if (is_string($this->$property)) {
                    $query .= '\'' . $this->$property . '\'';
                } else {
                    $query .= intval($this->$property);
                }
            }
            $query .= ($i+1 != $col_count) ? ', ':' ';
        }
        $query .= 'WHERE ' . static::$primary_key . ' = \'' . $this->id . '\'';
        return $query;
    }
    
    /**
     * Genera la cadena para una consulta DELETE.
     * Los datos de filtrado se obtienen del objeto instanciado.
     */
    private function makeQueryDeleteByID()
    {
        $query = 'DELETE FROM ' . static::$table_name;
        $query .= ' WHERE ' . static::$primary_key . ' = \'' . $this->id . '\'';
        return $query;
    }
}