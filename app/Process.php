<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table="processes";
    protected $fillable=['id','text','prediction'];
    public $timestamps=true;
}
