<?php

namespace PHPFramework;

use Valitron\Validator;

abstract class Model
{
    public string $table = '';
    protected array $fillable = [];
    public array $attributes = [];
    protected array $rules = [];
    protected array $labels = [];
    protected array $errors = [];

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

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function hasErrors(): bool
    {
        return !empty($this->errors);
    }

}