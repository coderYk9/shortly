<?php

namespace App\model;

use App\model\AbstractModel;


class User extends AbstractModel
{

    protected $table = 'admins';
    protected $guarded = [];
    protected $timestamp = true;
}
