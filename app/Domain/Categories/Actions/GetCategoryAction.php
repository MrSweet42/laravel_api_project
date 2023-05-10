<?php

namespace App\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;
use App\Exceptions\NotFoundException;

class GetCategoryAction
{
    public function execute(int $categoryId): ?Category
    {
        $category = Category::find($categoryId);
        if (!$category) {
            throw new NotFoundException('Category not found');
        }
        return $category;
    }
}
