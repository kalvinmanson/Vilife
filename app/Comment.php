<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $fillable = ['user_id', 'page_id', 'page_id'];

	public function user()
	{
	    return $this->belongsTo('App\User');
	}
	public function page()
	{
	    return $this->belongsTo('App\Page');
	}
    
}
