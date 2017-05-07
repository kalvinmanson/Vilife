<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	
    protected $fillable = ['user_id', 'profesional_id', 'peso', 'estatura', 'imc', 'actividad_fisica', 'cir_intura', 'cir_brazo', 'pl_biceps', 'pl_triceps', 'pl_subescapular', 'pl_suprailiaco', 'pl_abdominal', 'pl_muslo', 'pl_pantorrilla', 'complementos', 'aversiones', 'diagnostico', 'concepto', 'manejo'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function profesional()
    {
        return $this->belongsTo('App\User', 'profesional_id');
    }
}
