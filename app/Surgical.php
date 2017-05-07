<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surgical extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	
    protected $fillable = ['user_id', 'name', 'qx_date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
