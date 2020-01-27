<?php

use Pingu\Core\Seeding\DisableForeignKeysTrait;
use Pingu\Core\Seeding\MigratableSeeder;
use Pingu\Menu\Entities\Menu;
use Pingu\Menu\Entities\MenuItem;
use Pingu\Permissions\Entities\Permission;
use Pingu\User\Entities\Role;

class S2019_08_11_203653549341_InstallInfo extends MigratableSeeder
{
    use DisableForeignKeysTrait;

    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $admin = Menu::findByMachineName('admin-menu');
        $adminRole = Role::findByName('Admin');

        $perm = Permission::create(['name' => 'view infos', 'section' => 'Info']);
        $adminRole->givePermissionTo([
            $perm,
            Permission::create(['name' => 'view server infos', 'section' => 'Info']),
            Permission::create(['name' => 'view site infos', 'section' => 'Info']),
            Permission::create(['name' => 'view database infos', 'section' => 'Info']),
            Permission::create(['name' => 'view php infos', 'section' => 'Info']),
            Permission::create(['name' => 'view about you infos', 'section' => 'Info'])
        ]);
        
        $menuItem = MenuItem::create(
            [
            'name' => 'Info',
            'weight' => 100,
            'active' => 1,
            'deletable' => false,
            'url' => 'info.admin.info',
            'permission_id' => $perm->id
            ], $admin
        );
    }

    /**
     * Reverts the database seeder.
     */
    public function down(): void
    {
        if($perm = Permission::where(['name' => 'view infos'])->first()) {
            $perm->delete();
        }
        if($perm = Permission::where(['name' => 'view server infos'])->first()) {
            $perm->delete();
        }
        if($perm = Permission::where(['name' => 'view site infos'])->first()) {
            $perm->delete();
        }
        if($perm = Permission::where(['name' => 'view database infos'])->first()) {
            $perm->delete();
        }
        if($perm = Permission::where(['name' => 'view php infos'])->first()) {
            $perm->delete();
        }
        if($perm = Permission::where(['name' => 'view about you infos'])->first()) {
            $perm->delete();
        }
        if($item = MenuItem::where('machineName', 'admin-menu.info')->first()) {
            $item->delete();
        }
    }
}
