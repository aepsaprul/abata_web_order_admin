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
      $url_province = "https://api.rajaongkir.com/starter/province?key=b26ad9c38f1ea6354da405ce736b0371";
      $json_str = file_get_contents($url_province);
      $json_obj = json_decode($json_str);
      $provinces = [];
      foreach ($json_obj->rajaongkir->results as $province) {
        $provinces[] = [
          'id' => $province->province_id,
          'province' => $province->province
        ];
      }
      DB::table('wilayah_provinsis')->insert($provinces);
    }
}