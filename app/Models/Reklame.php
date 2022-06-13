<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reklame extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function orders() {
        return $this->hasMany('App\Models\Order');
    }
}
