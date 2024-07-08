<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TodoTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['not started', 'pending', 'in progress', 'done'])->default('not started');
            $table->enum('priority', ['todo', 'low', 'medium', 'high'])->default('todo');
            $table->date('date_c')->default(DB::raw('CURRENT_DATE'));
            $table->date('date_f');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('todo');
    }
}
