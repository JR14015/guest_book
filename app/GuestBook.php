<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    public $fillable = ['name','email', 'web','comment', 'ip', 'browser'];
    public $sortable = ['id', 'name', 'created_at'];
}
