<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. Company Table
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('industry');
            $table->string('address');
            $table->string('website')->nullable();
            $table->timestamps();
        });

        // 2. Locations Table
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->string('name');
            $table->string('address');
            $table->timestamps();
        });

        // 3. Assets Table
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 4. Company Groups Table
        Schema::create('company_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('parent_group_id')->nullable()->constrained('company_groups');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 5. People Table
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->timestamps();
        });

        // 6. Managers Table
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('person_id')->constrained('people');
            $table->timestamps();
        });

        // 7. Employees Table
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('person_id')->constrained('people');
            $table->foreignId('company_group_id')->nullable()->constrained('company_groups');
            $table->string('position');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('assets');
        Schema::dropIfExists('company_groups');
        Schema::dropIfExists('managers');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('people');
    }
};
