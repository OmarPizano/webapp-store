<?
namespace tienda\core;

abstract class FormValidation
{
    private array $errors = [];
    protected string $entity_name = '';
    protected array $field_config = [];

    private const ERROR_MSGS = [
        'required' => "Este campo es requerido.",
        'length' => "La longitud de este campo es de '{1}' a '{2}'.",
        'unique' => "Este valor no está disponible.",
        'email' => "Email no válido.",
        'password_verify' => "Las contraseñas no coinciden.",
        'unknown' => 'La validación no se reconce.'
    ];

    /**
     * Carga los atributos del request en el modelo.
     * Aborta si alguno de los atributos no encaja.
     * Retorna true/false.
     */
    public function load(array $request_data)
    {
        foreach ($request_data as $key => $value) {
            if (!property_exists($this, $key)) { return false; }
            $this->{$key} = $value;
        }
        return true;
    }
 
    /**
     * Recorre la lista de reglas de validación.
     * Las reglas están definidas en el modelo que hereda.
     * Si hubo algún error, retorna false.
     */
    public function validate()
    {
        foreach ($this->field_config as $field => $config) {
            $rules = $config['rules'];
            foreach ($rules as $rule) {
                if ($rule[0] === 'required') {
                    if (! $this->validateRequired($field)) {
                        $this->addError($field, $rule[0]);
                    }
                } elseif ($rule[0] === 'length') {
                    if (! $this->validateLength($field, $rule[1], $rule[2])) {
                        $this->addError($field, $rule[0], [$rule[1], $rule[2]]);
                    }
                } elseif ($rule[0] === 'unique') {
                    if (! $this->validateIsUnique($field)) {
                        $this->addError($field, $rule[0]);
                    }
                } elseif ($rule[0] === 'email') {
                    if (! $this->validateEmail($this->{$field})) {
                        $this->addError($field, $rule[0]);
                    }
                } elseif ($rule[0] === 'password_verify') {
                    if (! $this->validatePasswordVerify($this->{$field}, $this->{$rule[1]})) {
                        $this->addError($field, $rule[0]);
                    }
                } else {
                    $this->addError($field, 'unknown');
                }
            }
        }
        return (count($this->errors) === 0) ? true : false;
    }

    // -- FUNCIONES AUXILIARES --

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
    
    private function addError(string $field, string $rule_type, array $params = []) {
        if (empty($params)) {
            $this->errors[$field][] = self::ERROR_MSGS[$rule_type];
        } else {
            $new_rule = self::ERROR_MSGS[$rule_type];
            for ($i = 1; $i <= count($params); $i++) {
                $new_rule = str_replace('{' . $i . '}', $params[$i], $new_rule);
            }
            $this->errors[$field][] = $new_rule;
        }
    }

   // -- FUNCIONES DE VALIDACIÓN ESPECÍFICA --

    private function validateLength(string $field, int $min, int $max) {
        $len = strlen($this->{$field});
        return ($len < $min or $len > $max) ? false: true; 
    }

    private function validateIsUnique(string $field) {
        return ! Database::checkRecord($this->entity_name, $field, $this->{$field});
    }

    private function validatePasswordVerify(string $p1, string $p2) {
        return (strcmp($p1, $p2) === 0) ? true : false;
    }

    private function validateEmail(string $e) {
        return (!filter_var($e, FILTER_VALIDATE_EMAIL)) ? false : true;
    }

    private function validateRequired(string $field) {
        return (isset($this->{$field}) and ! empty($this->{$field})) ? true : false;
    }    
}