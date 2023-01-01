<?php

namespace App\model;

use App\model\AbstractModel;


class Links extends AbstractModel
{

    protected $table = 'urls';
    protected $guarded = [];
    protected $timestamp = true;
}
