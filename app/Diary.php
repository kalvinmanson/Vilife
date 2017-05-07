<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diary extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	
    protected $fillable = ['user_id', 'profesional_id', 'comida', 'hora', 'alimento', 'kcal', 'chos', 'grasa', 'proteina'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function profesional()
    {
        return $this->belongsTo('App\User', 'profesional_id');
    }
}
