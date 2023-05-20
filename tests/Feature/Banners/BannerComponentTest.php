<?php

use App\Domain\Banners\Models\Banner;

test('/banners GET (200)', function () {
    $response = $this->getJson('/api/v1/banners');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'data' => [
                    'id',
                    'name',
                    'image_path'
                 ]
            ]
        ]
    ]);
});

test('/banners POST (201)', function () {
    $data = [
        'name' => 'test image',
        'image_path' => 'storage/images/banners/test.png'
    ];
    $response = $this->postJson('/api/v1/banners', $data);
    $response->assertStatus(201);
    $this->assertDatabaseHas(Banner::class, $data);
});

test('/banners/{bannerId} GET (200)', function () {
    $bannerId = Banner::max('id');
    $response = $this->getJson("/api/v1/banners/$bannerId");
    $response->assertStatus(200);
});

test('/banners/{bannerId} GET (404)', function () {
    $bannerId = 1;
    $response = $this->getJson("/api/v1/banners/$bannerId");
    $response->assertStatus(404);
});

test('/banners/{bannerId} PUT (200)', function () {
    $bannerId = Banner::max('id');
    $data = [
        'name' => 'test-replace image',
        'image_path' => 'storage/images/banners/test.png',
    ];
    $response = $this->putJson("/api/v1/banners/$bannerId", $data);
    $response->assertStatus(200);
});

test('/banners/{bannerId} PUT (404)', function () {
    $bannerId = 1;
    $data = [
        'name' => 'test-replace image',
        'image_path' => 'storage/images/banners/test.png',
    ];
    $response = $this->putJson("/api/v1/banners/$bannerId", $data);
    $response->assertStatus(404);
});

test('/banners/{bannerId} PATCH (200)', function () {
    $bannerId = Banner::max('id');
    $data = [
        'name' => 'test-update image',
    ];
    $response = $this->patchJson("/api/v1/banners/$bannerId", $data);
    $response->assertStatus(200);
});

test('/banners/{bannerId} PATCH (404)', function () {
    $bannerId = 1;
    $data = [
        'name' => 'test-update image',
    ];
    $response = $this->patchJson("/api/v1/banners/$bannerId", $data);
    $response->assertStatus(404);
});

test('/banners/{bannerId} DELETE (200)', function () {
    $bannerId = Banner::max('id');
    $response = $this->deleteJson("/api/v1/banners/$bannerId");
    $response->assertStatus(200);
});

test('/banners/{bannerId} DELETE (404)', function () {
    $bannerId = 1;
    $response = $this->deleteJson("/api/v1/banners/$bannerId");
    $response->assertStatus(404);
});
