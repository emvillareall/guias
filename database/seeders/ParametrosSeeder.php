<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Parametro;
use DB;

class ParametrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parametros')->insert([
            'recargo_paypal' => 0.0525,
            'cambio_moneda' => 0.0624
        ]);
    }
}
