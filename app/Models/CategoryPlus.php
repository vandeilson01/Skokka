<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Category;

class CategoryPlus extends Model
{
    use HasFactory;

    protected $table = 'category_pluses';

    protected $fillable = [
        'categories_id',
        'name',
        'details',
        'link',
        'status',
        'created_at',
        'updated_at',
    ];

    // public function plus(){
    //     return $this->hasMany(Category::class);
    // }
}
