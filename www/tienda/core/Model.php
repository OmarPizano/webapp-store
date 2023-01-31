<?
namespace tienda\core;

abstract class Model
{
    private $conn;
    public array $errors = [];
    protected string $entity_name; // nombre de la tabla en la db

    protected array $error_msgs = [
        'required' => "El campo '{1}' es requerido.",
        'length' => "La longitud del campo es de '{1}' a '{2}'.",
        'unique' => "Este valor en '{1}' no está disponible.",
        'email' => "Ingresa un email válido.",
        'same' => "El campo '{1}' no coincide."
    ];

    protected array $validation_rules;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function load(array $post_data)
    {
        foreach ($post_data as $key => $value) {
            if (!property_exists($this, $key)) { return false; }
            $this->{$key} = $this->conn->real_escape_string($value);
        }
        return true;
    }
    
    public function save()
    {
        // TODO: guardar en la db
    }
    
    public function validate()
    {
        // TODO: refactorizar
        foreach ($this->validation_rules as $field => $rules) {
            foreach ($rules as $rule) {
                if ($rule[0] === 'required') {
                    if (isset($this->{$field}) and empty($this->{$field})) {
                        $new_rule = $this->error_msgs[$rule[0]];
                        $new_rule = str_replace('{1}', $field, $new_rule);
                        $this->errors[$field][] = $new_rule;
                    }
                } elseif ($rule[0] === 'length') {
                    $len = strlen($this->{$field});
                    if ($len < $rule[1] or $len > $rule[2]) {
                        $new_rule = $this->error_msgs[$rule[0]];
                        $new_rule = str_replace(['{1}', '{2}'], [$rule[1], $rule[2]], $new_rule);
                        $this->errors[$field][] = $new_rule;
                    } 
                } elseif ($rule[0] === 'unique') {
                    $sql = "SELECT * FROM {$this->entity_name} WHERE {$field} = '{$this->{$field}}'";
                    $result = $this->conn->query($sql);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    if (count($rows) != 0) {
                        $new_rule = $this->error_msgs[$rule[0]];
                        $new_rule = str_replace('{1}', $field, $new_rule);
                        $this->errors[$field][] = $new_rule;
                    }
                } elseif ($rule[0] === 'email') {
                    if (!filter_var($this->{$field}, FILTER_VALIDATE_EMAIL)) {
                        $this->errors[$field][] = $this->error_msgs[$field];
                    }
                } elseif ($rule[0] === 'same') {
                    if (strcmp($this->{$field}, $this->{$rule[1]}) != 0) {
                        $new_rule = $this->error_msgs[$rule[0]];
                        $new_rule = str_replace('{1}', $field, $new_rule);
                        $this->errors[$field][] = $new_rule;
                    }
                } else {
                    $this->errors[$field][] = "Regla aplicada desconocida.";
                }
            }
        }
        return (count($this->errors) == 0) ? true : false;
    }
}