<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;


abstract class AbstractModel extends Model
{

    public static function find_id($id)
    {
        try {
            return static::query()->findOrFail($id);
        } catch (\Exception $th) {
            header('location:error');
        }
    }
}
