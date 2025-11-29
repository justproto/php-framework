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


    public function save(): false|string
    {
        //insert into table (`title`, `content`) values (:title, :content)
        //fields
        $field_keys = array_keys($this->attributes);
        $fields = array_map(fn($field) => "`{$field}`", $field_keys);
        $fields = implode(',', $fields);
        //values
        $values_placeholders =  array_map(fn($value) => ":{$value}", $field_keys);
        $values_placeholders = implode(',', $values_placeholders);
        $query = "INSERT INTO {$this->table} ($fields) VALUES ($values_placeholders)";
        db()->query($query, $this->attributes);
        return db()->getInsertId();
    }

    public function update()
    {
        //update table set `title`=:title, `content`=:content where `id`=:id
        if (!isset($this->attributes['id'])){
            return false;
        }
        $fields = '';
        foreach ($this->attributes as $k => $v){
            if ($k == 'id'){
                continue;
            }
            $fields .= "`{$k}`=:{$k},";
        }
        $fields = rtrim($fields, ',');
        $query = "UPDATE {$this->table} SET {$fields} WHERE `id`=:id";
        db()->query($query, $this->attributes);
        return db()->rowCount();
    }

    public function delete(int $id): int
    {
        db()->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
        return db()->rowCount();
    }
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

    public function listErrors(): string
    {
        $output = '<ul class="list-unstyled">';
        foreach ($this->errors as $field_errors){
            foreach ($field_errors as $error){
                $output .= "<li>{$error}</li>";
            }
        }
        $output .= '</ul>';
        return $output;
    }
}