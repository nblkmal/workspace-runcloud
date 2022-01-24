<?php

namespace Tests\Unit;

use Carbon\Carbon;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_task_successfully()
    {
        // $this->withoutExceptionHandling();
        
        // create user
        $user = User::factory()->create([
            'name' => 'testuser',
            'email' => 'testuser@gmail.com',
            'password' => '12345',
        ]);

        // create workspace
        $workspace = Workspace::factory()->create();

        $this->actingAs($user);

        $request = Request::create('/workspace/create', 'POST', [
            'name' => 'tasktest',
            'due_date' => '2022-01-26',
            'due_time' => '16:59:00',
        ]);
        
        $controller = new TaskController();
        $result = $controller->create($request, $workspace);

        $this->assertEquals(302, $result->getStatusCode());
    }
}
