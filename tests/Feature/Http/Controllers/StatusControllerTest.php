<?php

namespace Tests\Feature\Http\Controllers;

use App\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StatusController
 */
class StatusControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $statuses = Status::factory()->count(3)->create();

        $response = $this->get(route('status.index'));

        $response->assertOk();
        $response->assertViewIs('status.index');
        $response->assertViewHas('statuses');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('status.create'));

        $response->assertOk();
        $response->assertViewIs('status.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StatusController::class,
            'store',
            \App\Http\Requests\StatusStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('status.store'), [
            'name' => $name,
        ]);

        $statuses = Status::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $statuses);
        $status = $statuses->first();

        $response->assertRedirect(route('status.index'));
        $response->assertSessionHas('status.id', $status->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $status = Status::factory()->create();

        $response = $this->get(route('status.show', $status));

        $response->assertOk();
        $response->assertViewIs('status.show');
        $response->assertViewHas('status');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $status = Status::factory()->create();

        $response = $this->get(route('status.edit', $status));

        $response->assertOk();
        $response->assertViewIs('status.edit');
        $response->assertViewHas('status');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StatusController::class,
            'update',
            \App\Http\Requests\StatusUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $status = Status::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('status.update', $status), [
            'name' => $name,
        ]);

        $status->refresh();

        $response->assertRedirect(route('status.index'));
        $response->assertSessionHas('status.id', $status->id);

        $this->assertEquals($name, $status->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $status = Status::factory()->create();

        $response = $this->delete(route('status.destroy', $status));

        $response->assertRedirect(route('status.index'));

        $this->assertDeleted($status);
    }
}
