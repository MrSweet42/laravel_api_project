<?php

namespace App\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;
use App\Exceptions\NotFoundException;

class GetAttachedBannersToCategoryAction
{
    public function execute(int $categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) {
            throw new NotFoundException('Category not found');
        }
        return $category->banners()->get();
    }
}
