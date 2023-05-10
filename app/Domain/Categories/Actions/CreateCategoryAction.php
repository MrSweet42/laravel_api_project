<?php

namespace App\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;
class CreateCategoryAction
{
    public function execute(array $data): ?Category
    {
        return Category::create([
            'name' => $data['name'],
            'is_active' => $data['is_active']
        ]);
    }
}
