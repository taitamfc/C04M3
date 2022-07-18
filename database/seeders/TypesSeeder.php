<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Văn Học','Vật Lý','Sinh Học'];
        foreach( $types as $type ){
            DB::table('types')->insert([
                'name' => $type
            ]);
        }
    }
}
