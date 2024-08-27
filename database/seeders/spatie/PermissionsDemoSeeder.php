<?php

namespace Database\Seeders\spatie;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions instansi
        Permission::create(['name' => 'edit instansi']);
        Permission::create(['name' => 'delete instansi']);
        Permission::create(['name' => 'add instansi']);
        Permission::create(['name' => 'view instansi']);

        // create permissions data kegiatan
        Permission::create(['name' => 'edit kegiatan']);
        Permission::create(['name' => 'delete kegiatan']);
        Permission::create(['name' => 'add kegiatan']);
        Permission::create(['name' => 'view kegiatan']);

        // create permissions data rincian kegiatan
        Permission::create(['name' => 'edit rincian kegiatan']);
        Permission::create(['name' => 'delete rincian kegiatan']);
        Permission::create(['name' => 'add rincian kegiatan']);
        Permission::create(['name' => 'view rincian kegiatan']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('view kegiatan');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('view instansi');
        $role2->givePermissionTo('add instansi');
        $role2->givePermissionTo('delete instansi');
        $role2->givePermissionTo('edit instansi');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user_siswa = \App\Models\User::factory()->create([
            'name' => 'Siswa',
            'email' => 'siswa@example.com',
        ]);
        $user_mahasiswa = \App\Models\User::factory()->create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@example.com',
        ]);
        $user_siswa->assignRole($role1);
        $user_mahasiswa->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
    }
}
