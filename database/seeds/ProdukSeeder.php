<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert([

            "id_produk" => 3,
            "nama_produk" => "Tas",
            "tipe_produk" => "kerajinan Tangan",
            "stok" => 24,
            "harga" => 500000,
            "gambar" => "60ea6b2d163aa.2915573_b8eb2f5a-57d5-47ff-b5dc-1c96e6ac0e1b_1080_1080.jpg",
            "status_produk" => "Tidak Tersedia"

        ]);

        DB::table('produk')->insert([

            "id_produk" => 4,
            "nama_produk" => "Sendal",
            "tipe_produk" => "kerajinan Tangan",
            "stok" => "24",
            "harga" => "500000",
            "gambar" => "60ea6b2d163aa.2915573_b8eb2f5a-57d5-47ff-b5dc-1c96e6ac0e1b_1080_1080.jpg",
            "status_produk" => "Tidak Tersedia"

        ]);
    }
}

