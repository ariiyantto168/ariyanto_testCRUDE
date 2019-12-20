<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productionhouse extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'productionhouse';
    protected $primaryKey = 'idproductionhouse';

    protected $fillable = [
        'name',
    ];
}
