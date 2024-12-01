<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Article extends Model
{
    use HasFactory, Notifiable;

    protected $fillable=[
        'user_id',
        'title',
        'description',
        'image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
