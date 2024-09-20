<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','publish_date','author_id'];

    public function authors()
    {
        return $this->belongsTo(Authors::class, 'author_id');
    }
}