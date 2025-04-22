<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SupportRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test creating a support request.
     */
    public function test_can_create_support_request(): void
    {
        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'description' => $this->faker->paragraph(),
        ];

        $response = $this->post(route('support-request.store'), $data);

        $response->assertRedirect(route('support-request.create'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('support_requests', [
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }
}
