<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Lokasi;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create lokasi
        $fa = Lokasi::create(['nama_lokasi' => 'FA']);
        $fb = Lokasi::create(['nama_lokasi' => 'FB']);
        $fc = Lokasi::create(['nama_lokasi' => 'FC']);
        $mtc = Lokasi::create(['nama_lokasi' => 'MTC']);

        // Create departments for FA (lokasi_id=1)
        Department::create(['lokasi_id' => 1, 'nama_department' => 'Line 01']);
        Department::create(['lokasi_id' => 1, 'nama_department' => 'Line 02']);
        Department::create(['lokasi_id' => 1, 'nama_department' => 'Line 03']);
        Department::create(['lokasi_id' => 1, 'nama_department' => 'Line 04']);
        Department::create(['lokasi_id' => 1, 'nama_department' => 'OFFLINE']);
        Department::create(['lokasi_id' => 1, 'nama_department' => 'Line 01 frams area']);

        // Departments for FB (lokasi_id=2)
        Department::create(['lokasi_id' => 2, 'nama_department' => 'FINISING']);
        Department::create(['lokasi_id' => 2, 'nama_department' => 'Line 05']);
        Department::create(['lokasi_id' => 2, 'nama_department' => 'Line 06']);
        Department::create(['lokasi_id' => 2, 'nama_department' => 'GEDUNG SAMPLE MAKER']);

        // Departments for FC (lokasi_id=3)
        Department::create(['lokasi_id' => 3, 'nama_department' => 'Glass store']);
        Department::create(['lokasi_id' => 3, 'nama_department' => 'Warehouse']);
        Department::create(['lokasi_id' => 3, 'nama_department' => 'Crating']);

        // Departments for MTC (lokasi_id=4)
        Department::create(['lokasi_id' => 4, 'nama_department' => 'WORKSHOP']);

        // Create users with bcrypt password
        User::create([
            'nama' => 'Bayu',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'level' => 'admin',
        ]);

        User::create([
            'nama' => 'AripL',
            'username' => '4608',
            'password' => bcrypt('aripl'),
            'level' => 'admin',
        ]);
    }
}
