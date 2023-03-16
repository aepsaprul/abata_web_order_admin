<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $url_city = "https://api.rajaongkir.com/starter/city?key=b26ad9c38f1ea6354da405ce736b0371";
      $json_str = file_get_contents($url_city);
      $json_obj = json_decode($json_str);
      $cities = [];
      foreach ($json_obj->rajaongkir->results as $city) {
        $cities[] = [
          'id' => $city->city_id,
          'provinsi_id' => $city->province_id,
          'kabupaten' => $city->city_name,
          'type' => $city->type,
          'kodepos' => $city->postal_code,
        ];
      }
      DB::table('wilayah_kabupatens')->insert($cities);
    }
}
