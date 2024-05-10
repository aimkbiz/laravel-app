<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Tests\TestCase;

class UserTodoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/getUserTodo');
        $response->assertStatus(200);
    }
}
