<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoadImagesInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $dir = base_path().'/public/assets/img/birds';
        $subclassdir = scandir($dir);
        array_shift($subclassdir);
        array_shift($subclassdir);

        foreach($subclassdir as $subclass){
            $split = explode('.', $subclass);
            $class_id = intval($split[0]);
            $class_name = $split[1];
            DB::table('subclass')->insert(
                ['class_name' => $class_name, 'class_id' => $class_id]
            );
            $class_dir = $dir.'/'.$subclass;
            $images = scandir($class_dir);
            foreach($images as $image){
                DB::table('birdimage')->insert(
                    ['subclass' => $class_name, 'class_id' => $class_id, 'file_path' => 'assets/img/birds/'.$subclass.'/'.$image]
                );
            }
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::table('subclass')->delete();
        DB::table('birdimage')->delete();
    }
}
