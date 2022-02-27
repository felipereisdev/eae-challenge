<?php

use App\Models\Job;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 90);
            $table->enum('contract', Job::JOB_CONTRACTS);
            $table->string('location');
            $table->string('created_at');
            $table->foreignId('role_id')->constrained();
            $table->foreignId('level_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->boolean('active')->default(true);
            $table->boolean('new')->default(true);
            $table->boolean('featured')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
