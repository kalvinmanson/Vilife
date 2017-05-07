<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pathology extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	
    protected $fillable = ['user_id', 'name', 'dx_date', 'controlled'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
