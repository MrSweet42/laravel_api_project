<?php

namespace App\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;
use App\Exceptions\NotFoundException;

class DetachBannersFromCategoryAction
{
    public function execute(int $categoryId, array $data)
    {
        $category = Category::find($categoryId);
        if (!$category) {
            throw new NotFoundException('Category not found');
        }
        $bannerIds = explode(', ', $data['banner_ids']);
        $category->banners()->detach($bannerIds);
        return $category->banners()->get();
    }
}
