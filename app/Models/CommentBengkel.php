<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBengkel extends Model
{
    use HasFactory;

    protected $table = 'comment_bengkel';
    protected $fillable = ['comment', 'post_id'];

    public function comment(){
    	return $this->belongsTo(Bengkel::class);
    } 

    public function user()
    {
    	return $this->hasOne(User::class,'id', 'user_id');
    }
}
