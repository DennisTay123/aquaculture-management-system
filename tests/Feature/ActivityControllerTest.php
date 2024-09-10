<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Activity;
use App\Models\Inventory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_activity_index_page()
    {
        $response = $this->get(route('activity.index'));

        $response->assertStatus(200);
        $response->assertViewIs('activity.index');
    }

    /** @test */
    public function it_fetches_activity_events()
    {
        $activity = Activity::factory()->create();

        $response = $this->getJson(route('activity.events'));

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $activity->id,
                'title' => $activity->activity,
            ]);
    }

    /** @test */
    public function it_displays_the_create_activity_page()
    {
        $response = $this->get(route('activity.create'));

        $response->assertStatus(200);
        $response->assertViewIs('activity.create');
    }

    /** @test */
    public function it_stores_a_new_activity()
    {
        $inventory = Inventory::factory()->create(['category' => 'feed']);

        $activityData = [
            'tank_id' => 1,
            'employee_id' => 1,
            'activity' => 'Feeding',
            'feed_type' => $inventory->name,
            'unit_measurement' => 'kg',
            'quantity' => 10.5,
            'start_date' => now()->toDateString(),
            'end_date' => now()->addDay()->toDateString(),
        ];

        $response = $this->post(route('activity.store'), $activityData);

        $response->assertRedirect(route('activity.index'));
        $this->assertDatabaseHas('activities', $activityData);
    }

    /** @test */
    public function it_displays_an_activity()
    {
        $activity = Activity::factory()->create();

        $response = $this->get(route('activity.show', $activity->id));

        $response->assertStatus(200);
        $response->assertViewIs('activity.show');
        $response->assertViewHas('activity', $activity);
    }

    /** @test */
    public function it_updates_an_activity()
    {
        $activity = Activity::factory()->create();

        $updateData = [
            'tank_id' => 2,
            'employee_id' => 2,
            'activity' => 'Change Water',
            'feed_type' => 'N/A',
            'unit_measurement' => 'liters',
            'quantity' => 20.0,
            'start_date' => now()->toDateString(),
            'end_date' => now()->addDay()->toDateString(),
        ];

        $response = $this->put(route('activity.update', $activity->id), $updateData);

        $response->assertRedirect(route('activity.show', $activity->id));
        $this->assertDatabaseHas('activities', $updateData);
    }

    /** @test */
    public function it_validates_activity_creation()
    {
        $response = $this->post(route('activity.store'), []);

        $response->assertSessionHasErrors([
            'tank_id',
            'employee_id',
            'activity',
            'feed_type',
            'unit_measurement',
            'quantity',
            'start_date'
        ]);
    }

    /** @test */
    public function it_validates_activity_update()
    {
        $activity = Activity::factory()->create();

        $response = $this->put(route('activity.update', $activity->id), []);

        $response->assertSessionHasErrors([
            'tank_id',
            'employee_id',
            'activity',
            'feed_type',
            'unit_measurement',
            'quantity',
            'start_date'
        ]);
    }
}
