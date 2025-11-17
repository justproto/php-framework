<?php

namespace PHPFramework;

abstract class Model
{

    public array $fillable = [];
    public array $attributes = [];
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
}