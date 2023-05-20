<?php

namespace App\Domain\Categories\Actions;

use App\Domain\Categories\Models\Category;
use Illuminate\Support\Collection;

class GetAllCategoriesAction
{
    public function execute(): Collection
    {
        return Category::all();
    }
}
