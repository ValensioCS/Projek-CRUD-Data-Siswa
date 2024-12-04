<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;


class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Siswa::insert([
            ['nama' => 'Ahmad'],
            ['nama' => 'Budi'],
            ['nama' => 'Citra'],
        ]);
    }
}