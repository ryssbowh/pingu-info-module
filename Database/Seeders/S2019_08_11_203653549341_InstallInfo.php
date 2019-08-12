<?php

use Pingu\Core\Seeding\DisableForeignKeysTrait;
use Pingu\Core\Seeding\MigratableSeeder;
use Pingu\Menu\Entities\Menu;
use Pingu\Menu\Entities\MenuItem;
use Pingu\Permissions\Entities\Permission;

class S2019_08_11_203653549341_InstallInfo extends MigratableSeeder
{
    use DisableForeignKeysTrait;

    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $admin = Menu::findByName('admin');
        $perm = Permission::create(['name' => 'view infos']);

        Permission::create(['name' => 'view server infos']);
        Permission::create(['name' => 'view site infos']);
        Permission::create(['name' => 'view database infos']);
        Permission::create(['name' => 'view php infos']);
        Permission::create(['name' => 'view about you infos']);
        
        $menuItem = MenuItem::create([
            'name' => 'Info',
            'weight' => 100,
            'active' => 1,
            'deletable' => false,
            'url' => 'info.admin.info',
            'permission_id' => $perm->id
        ], $admin);
    }

    /**
     * Reverts the database seeder.
     */
    public function down(): void
    {
        // Remove your data
    }
}
