<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'movie';
    protected $primaryKey = 'idmovie';

    protected $fillable = [
        'movie','genre',
    ];

    public function production()
    {
        return $this->belongsTo('App\Models\Productionhouse','idproductionhouse');
    }
}
