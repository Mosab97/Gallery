<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePhotosTable extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("Album_id");
            $table->string("Photo");
            $table->string("Title");
            $table->string("Size");
            $table->string("description");
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
