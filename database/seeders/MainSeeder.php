<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Jasa;
use App\Models\Kontraktor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'username' => 'kontraktor',
            'password' => bcrypt('kontraktor123'),
            'nama_lengkap' => 'PT. Kontraktor Cirebon',
            'no_wa' => '089699757575',
            'status' => 'kontraktor',
        ]);

        $kontraktor = Kontraktor::create([
            'user_id' => $user1->id,
            'alamat' => 'bandung',
            'pemilik' => 'Asep Sedunia',
            'TTL' => '19 mei 2000',
            'email' => 'kontraktor@gmail.com',
            'jenis_kelamin' => 'laki-laki',
            'foto' => 'foto.jpg',
            'jumlah_tukang' => '20',
            'keterangan' => 'keterangan',
        ]);

        Jasa::create([
            'kontraktor_id' => $kontraktor->id,
            'foto_kontraktor' => 'foto.png',
            'nama' => 'kontraktor',
            'alamat' => 'Cirebon',
            'jumlah_tukang' => '20',
            'riwayat_pembangunan' => 'riwayat pembangunan',
            'foto_pembangunan' => 'foto.png',
            'deskripsi' => 'deskripsi',
        ]);

        $user2 = User::create([
            'username' => 'client',
            'password' => bcrypt('client123'),
            'nama_lengkap' => 'client2',
            'no_wa' => '089699757575',
            'status' => 'client',
        ]);

        Client::create([
            'user_id' => $user2->id,
            'alamat' => 'Cirebon',
            'ttl' => 'Bandung',
            'jenis_kelamin' => 'laki-laki',
            'foto' => 'foto.png',
        ]);
    }
}
