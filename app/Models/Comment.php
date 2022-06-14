<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['teacher_id',"user_id",'comment_body'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function teachers(){
        return $this->belongsTo(Teacher::class);
    }
}
