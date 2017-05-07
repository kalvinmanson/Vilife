<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = ['name', 'slug', 'content'];

    public function pages()
    {
        return $this->hasMany('App\Page');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($category) { // before delete() method call this
             $category->pages()->delete();
             // do the rest of the cleanup...
        });
    }
}
