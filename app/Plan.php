<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	
    protected $fillable = ['user_id', 'profesional_id', 'frutas', 'verduras', 'lacteos_a', 'lacteos_b', 'carnes', 'leguminosas', 'cereales', 'azucares', 'requerimiento', 'comentarios'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function profesional()
    {
        return $this->belongsTo('App\User', 'profesional_id');
    }
}
