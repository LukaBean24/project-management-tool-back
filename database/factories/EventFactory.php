<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$workspaces = [1, 2];
		$workspace_id = $workspaces[array_rand($workspaces)];
		return [
			'creator_id'   => 1,
			'workspace_id' => $workspace_id,
			'title'        => $this->faker->sentence(3),
			'description'  => $this->faker->paragraph(10),
			'start_date'   => Carbon::today()->addDays(rand(1, 15))->addMinutes(rand(600, 1200)),
		];
	}
}
