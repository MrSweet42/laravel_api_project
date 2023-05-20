<?php

use App\Domain\Categories\Models\Category;

test('/categories GET (200)', function () {
    $response = $this->getJson('/api/v1/categories');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'data' => [
                    'id',
                    'name',
                    'is_active'
                ]
            ]
        ]
    ]);
});

test('/categories POST (201)', function () {
    $data = [
        'name' => 'test category',
        'is_active' => true
    ];
    $response = $this->postJson('/api/v1/categories', $data);
    $response->assertStatus(201);
    $this->assertDatabaseHas(Category::class, $data);
});

test('/categories/{categoryId} GET (200)', function () {
    $categoryId = Category::max('id');
    $response = $this->getJson("/api/v1/categories/$categoryId");
    $response->assertStatus(200);
});

test('/categories/{categoryId} GET (404)', function () {
    $categoryId = 1;
    $response = $this->getJson("/api/v1/categories/$categoryId");
    $response->assertStatus(404);
});

test('/categories/{categoryId} PUT (200)', function () {
    $categoryId = Category::max('id');
    $data = [
        'name' => 'test-replace category',
        'is_active' => true,
    ];
    $response = $this->putJson("/api/v1/categories/$categoryId", $data);
    $response->assertStatus(200);
});

test('/categories/{categoryId} PUT (404)', function () {
    $categoryId = 1;
    $data = [
        'name' => 'test-replace category',
        'is_active' => true,
    ];
    $response = $this->putJson("/api/v1/categories/$categoryId", $data);
    $response->assertStatus(404);
});

test('/categories/{categoryId} PATCH (200)', function () {
    $categoryId = Category::max('id');
    $data = [
        'name' => 'test-update category',
    ];
    $response = $this->patchJson("/api/v1/categories/$categoryId", $data);
    $response->assertStatus(200);
});

test('/categories/{categoryId} PATCH (404)', function () {
    $categoryId = 1;
    $data = [
        'name' => 'test-update category',
    ];
    $response = $this->patchJson("/api/v1/categories/$categoryId", $data);
    $response->assertStatus(404);
});

test('/categories/{categoryId} DELETE (200)', function () {
    $categoryId = Category::max('id');
    $response = $this->deleteJson("/api/v1/categories/$categoryId");
    $response->assertStatus(200);
});

test('/categories/{categoryId} DELETE (404)', function () {
    $categoryId = 1;
    $response = $this->deleteJson("/api/v1/categories/$categoryId");
    $response->assertStatus(404);
});
