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
		Schema::create('messages', function (Blueprint $table) {
			$table->id();
			$table->foreignId('from_id')->references('id')->on('users')->cascadeOnDelete();
			$table->foreignId('chat_id')->references('id')->on('chats')->cascadeOnDelete();
			$table->foreignId('to_id')->references('id')->on('users')->cascadeOnDelete();
			$table->text('body');
			$table->text('attachement')->nullable();
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
		Schema::dropIfExists('messages');
	}
};
