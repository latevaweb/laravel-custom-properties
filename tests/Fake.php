<?php

namespace LaTevaWeb\CustomProperties\Tests;

use Illuminate\Database\Eloquent\Model;
use LaTevaWeb\CustomProperties\HasCustomProperties;

class Fake extends Model
{
    use HasCustomProperties;

    protected $guarded = ['id'];
    public $timestamps = false;
}
