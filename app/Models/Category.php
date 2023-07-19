<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryPlus;

class Category extends Model
{
    use HasFactory;
    
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_url_dir',
        'created_at',
        'updated_at',
    ];

    
    public function plus(){
        return $this->hasMany(CategoryPlus::class, 'categories_id');
    }

}
