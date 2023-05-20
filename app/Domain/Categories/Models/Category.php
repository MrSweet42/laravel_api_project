<?php

namespace App\Domain\Categories\Models;

use App\Domain\Banners\Models\Banner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function banners()
    {
        return $this->belongsToMany(Banner::class, 'banner_category');
    }
}
