<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uruns', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->text('aciklama');
            $table->decimal('fiyat');
            $table->integer('stok')->unsigned();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->string('mensei');
            $table->string('garanti');
            $table->string('boyut');
            $table->string('onbellek');
            $table->string('ekran_ozellikleri');
            $table->string('wifi');
            $table->string('ethernet');
            $table->string('siyah_baski_hizi');
            $table->string('renkli_baski_hizi');
            $table->string('ilk_baski_suresi');
            $table->string('dubleks_baski');
            $table->string('a3_baski');
            $table->string('baski_kalitesi_renkli');
            $table->string('baski_kalitesi_siyah');
            $table->string('faks');
            $table->string('renkli_tarama');
            $table->string('tarayici_bit_derinligi');
            $table->string('tarayici_cozunurlugu');
            $table->string('kagit_turleri');
            $table->string('agirlik');
            $table->string('toner_kartus_sayisi');
            $table->string('toner_kartus_kapasitesi');
            $table->boolean('satis_durumu');
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
        Schema::dropIfExists('uruns');
    }
}
