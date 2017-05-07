<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	
    protected $fillable = ['category_id', 'name', 'slug', 'picture', 'content', 'tags', 'suscribe', 'premium', 'rank', 'for_patient', 'for_profesional'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
