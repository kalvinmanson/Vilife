<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laboratory extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	
    protected $fillable = ['user_id', 'name', 'valor', 'dx'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
