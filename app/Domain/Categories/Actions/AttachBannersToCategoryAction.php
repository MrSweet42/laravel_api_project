<?php

namespace App\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;
use App\Exceptions\NotFoundException;

class AttachBannersToCategoryAction
{
    public function execute(int $categoryId, array $data)
    {
        $category = Category::find($categoryId);
        if (!$category) {
            throw new NotFoundException('Category not found');
        }
        $bannerIds = explode(', ', $data['banner_ids']);
        // Второй параметр метода sync() - это флаг detach,
        // который указывает, нужно ли отвязывать от категории баннеры, которые не были указаны в переданном массиве.
        $category->banners()->sync($bannerIds, false);
        return $category->banners()->get();
    }
}
