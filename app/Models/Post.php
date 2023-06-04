<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','admin_id'];

    public function Author(){
        /**
         * Get the user that owns the Post
         */
        return  $this->belongsTo(Admin::class,'admin_id');

    }
}
