<?
namespace tienda\core;

abstract class Model
{
    private $conn;
    private array $errors = [];
    protected string $entity_name; // nombre de la tabla en la db
    protected array $field_config; // reglas de validación, html params

    protected array $error_msgs = [
        'required' => "Este campo es requerido.",
        'length' => "La longitud de este campo es de '{1}' a '{2}'.",
        'unique' => "Este valor no está disponible.",
        'email' => "Email no válido.",
        'password_verify' => "Las contraseñas no coinciden."
    ];

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
 
    public function validate()
    {
        // TODO: refactorizar (simplificar con funciones)
        foreach ($this->field_config as $field => $config) {
            $rules = $config['rules'];
            foreach ($rules as $rule) {
                if ($rule[0] === 'required') {
                    if (isset($this->{$field}) and empty($this->{$field})) {
                        $new_rule = $this->error_msgs[$rule[0]];
                        $this->errors[$field][] = $this->error_msgs[$rule[0]];
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
                        $this->errors[$field][] = $this->error_msgs[$rule[0]];
                    }
                } elseif ($rule[0] === 'email') {
                    if (!filter_var($this->{$field}, FILTER_VALIDATE_EMAIL)) {
                        $this->errors[$field][] = $this->error_msgs[$rule[0]];
                    }
                } elseif ($rule[0] === 'password_verify') {
                    if (strcmp($this->{$field}, $this->{$rule[1]}) != 0) {
                        $this->errors[$field][] = $this->error_msgs[$rule[0]];
                    }
                } else {
                    $this->errors[$field][] = "Regla aplicada desconocida.";
                }
            }
        }
        return (count($this->errors) == 0) ? true : false;
    }

    public function getFieldNames() {
        return array_keys($this->field_config);
    }

    public function getFieldDescription(string $field_name) {
        return $this->field_config[$field_name]['description'] ?? false;
    }

    public function getFieldFormType(string $field_name) {
        return $this->field_config[$field_name]['form_type'] ?? false;
    }

    public function getFieldHtmlParams(string $field_name) {
        return $this->field_config[$field_name]['html_params'] ?? false;
    }

    public function getFirstError(string $field_name) {
        return $this->errors[$field_name][0] ?? false;
    }
}