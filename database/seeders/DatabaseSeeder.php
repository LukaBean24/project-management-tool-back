<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chat;
use App\Models\Event;
use App\Models\Message;
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
			'profile_picture'   => 'https://i.pinimg.com/originals/35/b5/49/35b549a74bd709c3cb3e8e499442e90a.jpg',
		]);
		User::create([
			'name'              => 'Giorgi',
			'last_name'         => 'Karmazanashvili',
			'email'             => 'giorgi@gmail.com',
			'password'          => bcrypt('luka2001'),
			'email_verified_at' => now(),
			'profile_picture'   => 'https://tennisbuzz.net/.image/t_share/MTkxODQyNDExOTMwOTg1OTcw/roger-federer-at-wimbledon-2021.jpg',
		]);
		User::create([
			'name'              => 'Dachi',
			'last_name'         => 'Tsitsilashvili',
			'email'             => 'dachi@gmail.com',
			'password'          => bcrypt('luka2001'),
			'email_verified_at' => now(),
			'profile_picture'   => 'https://media.gettyimages.com/photos/kawhi-leonard-of-the-clippers-of-the-clippers-dribbles-the-ball-the-picture-id1272714063?s=594x594',
		]);
		User::create([
			'name'              => 'Levani',
			'last_name'         => 'Bojgua',
			'email'             => 'bojgua@gmail.com',
			'password'          => bcrypt('luka2001'),
			'email_verified_at' => now(),
			'profile_picture'   => 'https://m.media-amazon.com/images/I/41QKA2SQ8LL._AC_SY580_.jpg',
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

		Chat::factory(5)->create();
		Chat::find(1)->users()->attach([1, 2], ['created_at' => now(), 'updated_at' => now()]);
		Chat::find(2)->users()->attach([1, 3], ['created_at' => now(), 'updated_at' => now()]);
		Chat::find(3)->users()->attach([1, 4], ['created_at' => now(), 'updated_at' => now()]);

		Message::factory(5)->create([
			'user_id'    => 1,
			'chat_id'    => 1,
		]);
		Message::factory(5)->create([
			'user_id'    => 2,
			'chat_id'    => 1,
		]);
		Message::factory(5)->create([
			'user_id'    => 1,
			'chat_id'    => 2,
		]);
		Message::factory(5)->create([
			'user_id'    => 3,
			'chat_id'    => 2,
		]);
		Message::factory(5)->create([
			'user_id'    => 1,
			'chat_id'    => 3,
		]);
		Message::factory(5)->create([
			'user_id'    => 4,
			'chat_id'    => 3,
		]);
	}
}
