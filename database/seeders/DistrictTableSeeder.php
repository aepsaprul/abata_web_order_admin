<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $kabupatens = DB::table('wil_kabupatens')->get();
      foreach ($kabupatens as $key => $kabupaten) {
        $url_subdistrict = "https://pro.rajaongkir.com/api/subdistrict?city=" . $kabupaten->id . "&key=06f5c93c31ef48c91c6260c011014d37";
        $json_str = file_get_contents($url_subdistrict);
        $json_obj = json_decode($json_str);
        $subdistricts = [];
        foreach ($json_obj->rajaongkir->results as $subdistrict) {
          $subdistricts[] = [
            'id' => $subdistrict->subdistrict_id,
            'provinsi_id' => $subdistrict->province_id,
            'provinsi' => $subdistrict->province,
            'kabupaten_id' => $subdistrict->city_id,
            'kabupaten' => $subdistrict->city,
            'type' => $subdistrict->type,
            'kecamatan' => $subdistrict->subdistrict_name,
          ];
        }
        DB::table('wil_kecamatans')->insert($subdistricts);
      }
    }
}
