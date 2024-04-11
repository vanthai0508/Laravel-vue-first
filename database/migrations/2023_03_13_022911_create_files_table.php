<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
class CreateFilesTable extends Migration
{
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
            $table->string('type')->nullable(true);
            $table->string('size')->nullable(true);
            $table->string('code');
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
