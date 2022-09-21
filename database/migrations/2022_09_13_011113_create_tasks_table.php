<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function (Blueprint $table) {
			$table->id();
			$table->foreignId('project_id')->references('id')->on('projects')->cascadeOnDelete();
			$table->foreignId('workspace_id')->references('id')->on('workspaces')->cascadeOnDelete();
			$table->string('title');
			$table->text('description');
			$table->string('priority');
			$table->string('stage');
			$table->string('start_date');
			$table->string('finish_date');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tasks');
	}
};
