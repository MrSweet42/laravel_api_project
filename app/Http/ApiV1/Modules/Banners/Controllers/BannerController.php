<?php

namespace App\Http\ApiV1\Modules\Banners\Controllers;

use App\Domain\Banners\Actions\CreateBannerAction;
use App\Domain\Banners\Actions\DeleteBannerAction;
use App\Domain\Banners\Actions\GetAllBannersAction;
use App\Domain\Banners\Actions\GetBannerAction;
use App\Domain\Banners\Actions\ReplaceBannerAction;
use App\Domain\Banners\Actions\UpdateBannerAction;

use App\Http\ApiV1\Modules\Banners\Requests\CreateBannerRequest;
use App\Http\ApiV1\Modules\Banners\Requests\ReplaceBannerRequest;
use App\Http\ApiV1\Modules\Banners\Requests\UpdateBannerRequest;

use App\Http\ApiV1\Modules\Banners\Resources\AllBannersResource;
use App\Http\ApiV1\Modules\Banners\Resources\BannerResource;

use App\Exceptions\NotFoundException;

use Illuminate\Http\JsonResponse;

class BannerController
{
    public function index(GetAllBannersAction $action): AllBannersResource
    {
        $banners = $action->execute();
        return new AllBannersResource($banners);
    }

    public function store(CreateBannerAction $action,
                          CreateBannerRequest $request): BannerResource|JsonResponse
    {
        $banner = $action->execute($request->validated());
        if (!$banner) {
            return response()->json(['data' => 'Bad request'], 400);
        }
        return new BannerResource($banner);
    }

    public function show(int $id,
                         GetBannerAction $action): BannerResource|JsonResponse
    {
        try {
            $banner = $action->execute($id);
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        if (!$banner) {
            return response()->json(['data' => 'Bad request'], 400);
        }
        return new BannerResource($banner);
    }

    public function replace(int $id,
                            ReplaceBannerAction $action,
                            ReplaceBannerRequest $request): BannerResource|JsonResponse
    {
        try {
            $banner = $action->execute($id, $request->validated());
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        if (!$banner) {
            return response()->json(['data' => 'Bad request'], 400);
        }
        return new BannerResource($banner);
    }

    public function update(int $id,
                           UpdateBannerAction $action,
                           UpdateBannerRequest $request): BannerResource|JsonResponse
    {
        try {
            $banner = $action->execute($id, $request->validated());
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        if (!$banner) {
            return response()->json(['data' => 'Bad request'], 400);
        }
        return new BannerResource($banner);
    }

    public function destroy(int $id,
                            DeleteBannerAction $action): JsonResponse
    {
        try {
            $action->execute($id);
        } catch (NotFoundException $exception) {
            return response()->json(['data' => null, 'errors' => $exception->getMessage()], 404);
        }
        return response()->json(['data' => null]);
    }
}

