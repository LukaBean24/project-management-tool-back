<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$workspaces = [1, 2];
		$days = [5, 8, 10, 3, 15, 18, 12];
		$stages = ['Ongoing', 'Completed', 'Archived'];
		$priority = ['Low', 'Medium', 'High'];
		$workspace_id = $workspaces[array_rand($workspaces)];

		return [
			'workspace_id'     => $workspace_id,
			'title'            => $this->faker->sentence(4),
			'description'      => $this->faker->text(),
			'stage'            => $stages[array_rand($stages)],
			'priority'         => $priority[array_rand($priority)],
			'start_date'       => date_format(Carbon::now()->subDays($days[array_rand($days)]), 'd-m-Y'),
			'finish_date'      => date_format(Carbon::now()->addDays($days[array_rand($days)]), 'd-m-Y'),
		];
	}
}
