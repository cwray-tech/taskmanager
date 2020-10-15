<?php

namespace Tests\Feature\Http\Controllers;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProjectController
 */
class ProjectControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $projects = Project::factory()->count(3)->create();

        $response = $this->get(route('project.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjectController::class,
            'store',
            \App\Http\Requests\ProjectStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;

        $response = $this->post(route('project.store'), [
            'name' => $name,
        ]);

        $projects = Project::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $projects);
        $project = $projects->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $project = Project::factory()->create();

        $response = $this->get(route('project.show', $project));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjectController::class,
            'update',
            \App\Http\Requests\ProjectUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $project = Project::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('project.update', $project), [
            'name' => $name,
        ]);

        $project->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $project->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $project = Project::factory()->create();

        $response = $this->delete(route('project.destroy', $project));

        $response->assertNoContent();

        $this->assertDeleted($project);
    }
}
