<?php

namespace App\Http\ApiV1\Modules\Categories\Controllers;

use App\Domain\Categories\Actions\GetAllCategoriesAction;
use App\Domain\Categories\Actions\CreateCategoryAction;
use App\Domain\Categories\Actions\GetCategoryAction;
use App\Domain\Categories\Actions\ReplaceCategoryAction;
use App\Domain\Categories\Actions\UpdateCategoryAction;
use App\Domain\Categories\Actions\DeleteCategoryAction;

use App\Domain\Categories\Actions\GetAttachedBannersToCategoryAction;
use App\Domain\Categories\Actions\AttachBannersToCategoryAction;
use App\Domain\Categories\Actions\DetachBannersFromCategoryAction;

use App\Http\ApiV1\Modules\Categories\Requests\CreateCategoryRequest;
use App\Http\ApiV1\Modules\Categories\Requests\ReplaceCategoryRequest;
use App\Http\ApiV1\Modules\Categories\Requests\UpdateCategoryRequest;

use App\Http\ApiV1\Modules\Categories\Requests\AttachBannersToCategoryRequest;
use App\Http\ApiV1\Modules\Categories\Requests\DetachBannersFromCategoryRequest;

use App\Http\ApiV1\Modules\Categories\Resources\AllCategoriesResource;
use App\Http\ApiV1\Modules\Categories\Resources\CategoryResource;

use App\Http\ApiV1\Modules\Banners\Resources\AllBannersResource;

use App\Exceptions\NotFoundException;

use Illuminate\Http\JsonResponse;

class CategoryController
{
    public function index(GetAllCategoriesAction $action): AllCategoriesResource
    {
        $categories = $action->execute();
        return new AllCategoriesResource($categories);
    }

    public function store(CreateCategoryAction $action,
                          CreateCategoryRequest $request): CategoryResource|JsonResponse
    {
        $category = $action->execute($request->validated());
        if (!$category) {
            return response()->json(['data' => 'Bad request'], 400);
        }
        return new CategoryResource($category);
    }

    public function show(int $id,
                         GetCategoryAction $action): CategoryResource|JsonResponse
    {
        try {
            $category = $action->execute($id);
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        if (!$category) {
            return response()->json(['data' => 'Bad request'], 40);
        }
        return new CategoryResource($category);
    }

    public function replace(int $id,
                            ReplaceCategoryAction $action,
                            ReplaceCategoryRequest $request): CategoryResource|JsonResponse
    {
        try {
            $category = $action->execute($id, $request->validated());
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        if (!$category) {
            return response()->json(['data' => 'Bad request'], 400);
        }
        return new CategoryResource($category);
    }

    public function update(int $id,
                           UpdateCategoryAction $action,
                           UpdateCategoryRequest $request): CategoryResource|JsonResponse
    {
        try {
            $category = $action->execute($id, $request->validated());
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        if (!$category) {
            return response()->json(['data' => 'Bad request'], 400);
        }
        return new CategoryResource($category);
    }

    public function destroy(int $id,
                            DeleteCategoryAction $action): JsonResponse
    {
        try {
            $action->execute($id);
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        return response()->json(['data' => null]);
    }

    public function getBannersAttachedToCategory(int $categoryId,
                                                GetAttachedBannersToCategoryAction $action): JsonResponse|AllBannersResource
    {
        try {
            $banners = $action->execute($categoryId);
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        return new AllBannersResource($banners);
    }

    public function attachBannersToCategory($categoryId,
                                            AttachBannersToCategoryAction $action,
                                            AttachBannersToCategoryRequest $request): JsonResponse|AllBannersResource
    {
        try {
            $banners = $action->execute($categoryId, $request->validated());
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        if (!$banners) {
            return response()->json(['data' => 'Bad request'], 400);
        }
        return new AllBannersResource($banners);
    }

    public function detachBannersFromCategory($categoryId,
                                            DetachBannersFromCategoryAction $action,
                                            DetachBannersFromCategoryRequest $request): JsonResponse|AllBannersResource
    {
        try {
            $banners = $action->execute($categoryId, $request->validated());
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        if (!$banners) {
            return response()->json(['data' => 'Bad request'], 400);
        }
        return new AllBannersResource($banners);
    }
}
