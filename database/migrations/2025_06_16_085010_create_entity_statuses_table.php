   <?php

   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   class CreateEntityStatusesTable extends Migration
   {
       public function up()
       {
           Schema::create('entity_statuses', function (Blueprint $table) {
               $table->id();
               $table->string('name'); // e.g., 'Visible', 'Disabled'
               $table->timestamps();
           });
       }

       public function down()
       {
           Schema::dropIfExists('entity_statuses');
       }
   }
