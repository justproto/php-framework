<?php

namespace PHPFramework;

abstract class Model
{

    public array $fillable = [];
    public array $attributes = [];
    public array $rules = [];
    protected array $errors = [];

    protected array $rules_list = ['required', 'min', 'max'];
    protected array $messages = [
        'required' => 'The :fieldname: field is required',
        'min' => 'The :fieldname: field must be a minimum :rulevalue: characters',
        'max' => 'The :fieldname: field must be a maximum :rulevalue: characters',

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

    public function validate()
    {
        dump($this->attributes);
        dump($this->rules);
        foreach ($this->attributes as $fieldname => $value){
            if (isset($this->rules[$fieldname])){
//                dump($this->rules[$fieldname]);
              $this->check([
                  'fieldname' => $fieldname,
                  'value' => $value,
                  'rules' => $this->rules[$fieldname],
                  ]);
            }
        }
    }

    protected function check(array $field): void
    {
        dump($field);
    }
}