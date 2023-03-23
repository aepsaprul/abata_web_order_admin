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
      $url_city = "https://pro.rajaongkir.com/api/city?key=06f5c93c31ef48c91c6260c011014d37";
      $json_str = file_get_contents($url_city);
      $json_obj = json_decode($json_str);
      $cities = [];
      foreach ($json_obj->rajaongkir->results as $city) {
        $cities[] = [
          'id' => $city->city_id,
          'provinsi_id' => $city->province_id,
          'provinsi' => $city->province,
          'type' => $city->type,
          'kabupaten' => $city->city_name,
          'kodepos' => $city->postal_code,
        ];
      }
      DB::table('wil_kabupatens')->insert($cities);
    }
}
