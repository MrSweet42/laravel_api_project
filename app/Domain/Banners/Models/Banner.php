<?php

namespace App\Domain\Banners\Models;

use App\Domain\Categories\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'banner_category');
    }
}
