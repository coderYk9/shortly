<?php

namespace App\model;

use App\model\AbstractModel;


class Admins extends AbstractModel
{

    protected $table = 'admins';
    protected $guarded = [];
    protected $timestamp = true;
}
