<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
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
			'workspace_id' => $workspace_id,
			'title'        => $this->faker->sentence(2),
		];
	}
}
