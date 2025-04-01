<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'adress', 'date', 'price', 'is_free', 'description', 'image', 'creator_id', 'category_id'];
}