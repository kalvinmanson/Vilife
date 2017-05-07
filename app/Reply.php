<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	
    protected $fillable = ['ticket_id', 'user_id', 'profesional_id', 'content'];

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function profesional()
    {
        return $this->belongsTo('App\User', 'profesional_id');
    }
}
