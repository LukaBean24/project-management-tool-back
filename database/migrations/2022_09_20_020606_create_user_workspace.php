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
		Schema::create('user_workspace', function (Blueprint $table) {
			$table->id();
			$table->foreignId('workspace_id')->references('id')->on('workspaces')->cascadeOnDelete();
			$table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
			$table->string('role')->nullable();
			$table->string('status')->default('Requested');
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
		Schema::dropIfExists('user_workspace');
	}
};
