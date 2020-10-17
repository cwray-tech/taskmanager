<?php

namespace Tests\Feature\Http\Controllers;

use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TaskController
 */
class TaskControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $tasks = Task::factory()->count(3)->create();

        $response = $this->get(route('task.index'));

        $response->assertOk();
        $response->assertViewIs('task.index');
        $response->assertViewHas('tasks');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('task.create'));

        $response->assertOk();
        $response->assertViewIs('task.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TaskController::class,
            'store',
            \App\Http\Requests\TaskStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $details = $this->faker->text;

        $response = $this->post(route('task.store'), [
            'name' => $name,
            'details' => $details,
        ]);

        $tasks = Task::query()
            ->where('name', $name)
            ->where('details', $details)
            ->get();
        $this->assertCount(1, $tasks);
        $task = $tasks->first();

        $response->assertRedirect(route('task.index'));
        $response->assertSessionHas('task.id', $task->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $task = Task::factory()->create();

        $response = $this->get(route('task.show', $task));

        $response->assertOk();
        $response->assertViewIs('task.show');
        $response->assertViewHas('task');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $task = Task::factory()->create();

        $response = $this->get(route('task.edit', $task));

        $response->assertOk();
        $response->assertViewIs('task.edit');
        $response->assertViewHas('task');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TaskController::class,
            'update',
            \App\Http\Requests\TaskUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $task = Task::factory()->create();
        $name = $this->faker->name;
        $details = $this->faker->text;

        $response = $this->put(route('task.update', $task), [
            'name' => $name,
            'details' => $details,
        ]);

        $task->refresh();

        $response->assertRedirect(route('task.index'));
        $response->assertSessionHas('task.id', $task->id);

        $this->assertEquals($name, $task->name);
        $this->assertEquals($details, $task->details);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $task = Task::factory()->create();

        $response = $this->delete(route('task.destroy', $task));

        $response->assertRedirect(route('task.index'));

        $this->assertDeleted($task);
    }
}
