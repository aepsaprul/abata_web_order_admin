<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $url_province = "https://pro.rajaongkir.com/api/province?key=06f5c93c31ef48c91c6260c011014d37";
      $json_str = file_get_contents($url_province);
      $json_obj = json_decode($json_str);
      $provinces = [];
      foreach ($json_obj->rajaongkir->results as $province) {
        $provinces[] = [
          'id' => $province->province_id,
          'provinsi' => $province->province
        ];
      }
      DB::table('wil_provinsis')->insert($provinces);
    }
}
