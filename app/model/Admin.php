<?php

namespace App\model;

class Admin extends AbstractModel12
{
    public $id;
    public $name;
    public $username;
    public $password;
    public $created_at;
    public $updated_at;
    protected static $tableName = 'admins';
    protected static array $tableSchema = [
        'username' => self::DATA_TYPE_STR,
        'password' => self::DATA_TYPE_STR,
        'name' => self::DATA_TYPE_STR,
        'created_at' => self::DATA_TYPE_STR,
        'updated_at' => self::DATA_TYPE_STR,

    ];
    protected static $primaryKey = 'id';
    public function create(array $query): bool
    {
        foreach ($query as $key => $value) {
            $this->$key = $value;
        }
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = $this->created_at;
        return self::save();
    }
    public function updated(array $query): bool
    {
        if (isset($this->id)) {
            foreach ($query as $key => $value) {
                $this->$key = $value;
            }
            $this->updated_at = date('Y-m-d H:i:s');
            return self::save();
        }
        dd('id not found');
    }
}
