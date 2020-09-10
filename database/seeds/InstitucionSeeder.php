<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class InstitucionSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('institucion')->insert([
            'nombre' => 'liceo',
            'codigo' => 'LCS1881',
        
            ]);

        // $institucion = new app\Models\Institucion();
        // $institucion ->nombre ="INEM";
        // $institucion ->codigo ="5165465";
        // //$institucion ->cuenta_bancaria="5416548";
        // $institucion ->save();

    }
}
