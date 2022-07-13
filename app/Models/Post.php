<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        
        if($filters['published'] ?? false){
            $query->where('published', '1');
        }
        else if($filters['slug'] ?? false){
            $query->where('slug', $filters['slug']);
        }
        else if($filters['cat'] ?? false){
            $query->where('cat_id', $filters['cat']);
        }
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cat(){
        return $this->belongsTo(Cat::class, 'cat_id');
    }
}
