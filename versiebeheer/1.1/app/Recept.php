<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recept extends Model
{
    protected $table = 'recepten';
    public $primaryKey = 'id';
    public $timestamps = true;

}
