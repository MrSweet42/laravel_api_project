<?php

namespace App\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;
use App\Exceptions\NotFoundException;

class UpdateCategoryAction
{
    public function execute(int $categoryId, array $data): ?Category
    {
        $category = Category::find($categoryId);
        if (!$category) {
            throw new NotFoundException('Category not found');
        }
        $category->fill($data);
        $category->save();
        return $category;
    }
}
