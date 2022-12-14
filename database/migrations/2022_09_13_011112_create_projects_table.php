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
		Schema::create('projects', function (Blueprint $table) {
			$table->id();
			$table->foreignId('workspace_id')->references('id')->on('workspaces')->cascadeOnDelete();
			$table->string('title');
			$table->text('description');
			$table->string('stage');
			$table->string('priority');
			$table->date('start_date');
			$table->date('finish_date');
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
		Schema::dropIfExists('projects');
	}
};
