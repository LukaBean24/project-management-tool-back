<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\Project;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			'name'              => 'Luka',
			'last_name'         => 'Kochloshvili',
			'email'             => 'lkochlo24@gmail.com',
			'password'          => bcrypt('luka2001'),
			'email_verified_at' => now(),
		]);
		User::create([
			'name'              => 'Giorgi',
			'last_name'         => 'Karmazanashvili',
			'email'             => 'giorgi@gmail.com',
			'password'          => bcrypt('luka2001'),
			'email_verified_at' => now(),
		]);
		User::create([
			'name'              => 'Dachi',
			'last_name'         => 'Tsitsilashvili',
			'email'             => 'dachi@gmail.com',
			'password'          => bcrypt('luka2001'),
			'email_verified_at' => now(),
		]);
		User::create([
			'name'              => 'Levani',
			'last_name'         => 'Bojgua',
			'email'             => 'bojgua@gmail.com',
			'password'          => bcrypt('luka2001'),
			'email_verified_at' => now(),
		]);

		User::factory(10)->create();

		Workspace::create([
			'title' => 'Qokhi',
		]);
		Workspace::create([
			'title' => 'Redberry',
		]);

		Workspace::find(1)->users()->attach(1, ['role' => 'admin', 'status' => 'Joined', 'created_at' => now(), 'updated_at' => now()]);
		Workspace::find(2)->users()->attach(1, ['role' => 'admin', 'status' => 'Joined', 'created_at' => now(), 'updated_at' => now()]);
		Workspace::find(1)->users()->attach([2, 3, 4, 5, 6, 7, 8, 9], ['role' => 'member', 'status' => 'Joined', 'created_at' => now(), 'updated_at' => now()]);
		Workspace::find(2)->users()->attach([10, 11, 12, 13, 14], ['role' => 'member', 'status' => 'Joined', 'created_at' => now(), 'updated_at' => now()]);

		Project::factory(5)->create();
		Task::factory(5)->create();
		Team::factory(5)->create();

		foreach (Workspace::find(Team::find(1)->workspace->id)->users->toArray() as $member)
		{
			Team::find(1)->members()->attach($member['id']);
		}
		foreach (Workspace::find(Team::find(2)->workspace->id)->users->toArray() as $member)
		{
			Team::find(2)->members()->attach($member['id']);
		}
		foreach (Workspace::find(Team::find(3)->workspace->id)->users->toArray() as $member)
		{
			Team::find(3)->members()->attach($member['id']);
		}
		foreach (Workspace::find(Team::find(4)->workspace->id)->users->toArray() as $member)
		{
			Team::find(4)->members()->attach($member['id']);
		}
		foreach (Workspace::find(Team::find(5)->workspace->id)->users->toArray() as $member)
		{
			Team::find(5)->members()->attach($member['id']);
		}

		Event::factory(5)->create();

		foreach (Workspace::find(Event::find(1)->workspace->id)->users->toArray() as $member)
		{
			Event::find(1)->members()->attach($member['id']);
		}
		foreach (Workspace::find(Event::find(2)->workspace->id)->users->toArray() as $member)
		{
			Event::find(2)->members()->attach($member['id']);
		}
		foreach (Workspace::find(Event::find(3)->workspace->id)->users->toArray() as $member)
		{
			Event::find(3)->members()->attach($member['id']);
		}
		foreach (Workspace::find(Event::find(4)->workspace->id)->users->toArray() as $member)
		{
			Event::find(4)->members()->attach($member['id']);
		}
		foreach (Workspace::find(Event::find(5)->workspace->id)->users->toArray() as $member)
		{
			Event::find(5)->members()->attach($member['id']);
		}
	}
}
