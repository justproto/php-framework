<?php

namespace PHPFramework;

use Valitron\Validator;

abstract class Model
{

    protected array $fillable = [];
    public array $attributes = [];
    protected array $rules = [];
    protected array $labels = [];
    protected array $errors = [];

//    protected array $rules_list = ['required', 'min', 'max', 'email'];
//    protected array $messages = [
//        'required' => ':fieldname: field is required',
//        'min' => ':fieldname: field must be a minimum :rulevalue: characters',
//        'max' => ':fieldname: field must be a maximum :rulevalue: characters',
//        'email' => 'This e-mail is not valid',
//
//    ];

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

    public function validate($data = [], $rules = [], $labels = []): bool
    {
        if(!$data){
            $data = $this->attributes;
        }
        if(!$rules){
            $rules = $this->rules;
        }
        if(!$labels){
            $labels = $this->labels;
        }
//        Validator::langDir(WWW . '/lang');
//        Validator::lang('uk');
        $validator = new Validator($data);
        $validator->rules($rules);
        $validator->labels($labels);
        if ($validator->validate()){
            return true;
        } else{
            $this->errors = $validator->errors();
            return false;
        }
    }

    /* custom validation method which used in contact form and has to be replaced by validation (valitron) in next commits */
//    public function validateCustom(): bool
//    {
//        foreach ($this->attributes as $fieldname => $value){
//            if (isset($this->rules[$fieldname])){
//              $this->check([
//                  'fieldname' => $fieldname,
//                  'value' => $value,
//                  'rules' => $this->rules[$fieldname],
//                  ]);
//            }
//        }
//        return !($this->hasErrors());
//    }

    /* custom validation function which used in contact form and has to be replaced by validation (valitron) in next commits */
//    protected function check(array $field): void
//    {
//        foreach ($field['rules'] as $rule => $rule_value){
//            if (in_array($rule, $this->rules_list)){
//                if (!call_user_func_array([$this, $rule], [$field['value'], $rule_value])){
//                    $this->addError(
//                        $field['fieldname'],
//                        str_replace(
//                            [':fieldname:', ':rulevalue:'],
//                            [$this->labels[$field['fieldname']] ?? $field['fieldname'], $rule_value],
//                            $this->messages[$rule]
//                        )
//                    );
//                }
//            }
//        }
//    }

//    protected function addError($fieldname, $error): void
//    {
//        $this->errors[$fieldname][] = $error;
//    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    /* custom validation functions which used in contact form and has to be replaced by validation (valitron) in next commits */
//    protected function required($value, $rule_value): bool
//    {
//        return !empty(trim($value));
//    }
//
//    protected function min($value, $rule_value): bool
//    {
//        return mb_strlen($value, 'UTF-8') >= $rule_value;
//    }
//
//    protected function max($value, $rule_value): bool
//    {
//        return mb_strlen($value, 'UTF-8') <= $rule_value;
//    }
//
//    protected function email($value, $rule_value): bool
//    {
//        return filter_var($value, FILTER_VALIDATE_EMAIL);
//    }
}