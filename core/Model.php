<?php

namespace PHPFramework;

abstract class Model
{

    public array $fillable = [];
    public array $attributes = [];
    public array $rules = [];
    protected array $errors = [];

    protected array $rules_list = ['required', 'min', 'max', 'email'];
    protected array $messages = [
        'required' => 'The :fieldname: field is required',
        'min' => 'The :fieldname: field must be a minimum :rulevalue: characters',
        'max' => 'The :fieldname: field must be a maximum :rulevalue: characters',
        'email' => 'This email is not valid',

    ];

    public function loadData(): void
    {
        $data = request()->getData();
        foreach ($this->fillable as $value){
            if (isset($data[$value])){
                $this->attributes[$value] = $data[$value];
            } else {
                $this->attributes[$value] = '';
            }
        }
    }

    public function validate(): bool
    {
        foreach ($this->attributes as $fieldname => $value){
            if (isset($this->rules[$fieldname])){
              $this->check([
                  'fieldname' => $fieldname,
                  'value' => $value,
                  'rules' => $this->rules[$fieldname],
                  ]);
            }
        }
        return !($this->hasErrors());
    }

    protected function check(array $field): void
    {
        foreach ($field['rules'] as $rule => $rule_value){
            if (in_array($rule, $this->rules_list)){
                if (!call_user_func_array([$this, $rule], [$field['value'], $rule_value])){
                    $this->addError(
                        $field['fieldname'],
                        str_replace(
                            [':fieldname:', ':rulevalue:'],
                            [$field['fieldname'], $rule_value],
                            $this->messages[$rule]
                        )
                    );
                }
            }
        }
    }

    protected function addError($fieldname, $error): void
    {
        $this->errors[$fieldname][] = $error;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    protected function required($value, $rule_value): bool
    {
        return !empty(trim($value));
    }

    protected function min($value, $rule_value): bool
    {
        return mb_strlen($value, 'UTF-8') >= $rule_value;
    }

    protected function max($value, $rule_value): bool
    {
        return mb_strlen($value, 'UTF-8') <= $rule_value;
    }

    protected function email($value, $rule_value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}