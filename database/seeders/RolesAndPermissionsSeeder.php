<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Brand permissions gate access to a brand's Filament resources. Each
     * brand's data lives in entirely separate tables (FestivalXxx, MarketXxx,
     * academy_*), so gating whole resource classes on these permissions is a
     * real access boundary, not just a hidden menu item.
     */
    public function run(): void
    {
        $brands = ['group', 'academy', 'market', 'festival'];

        foreach ($brands as $brand) {
            Permission::findOrCreate("brand:{$brand}", 'web');
        }

        $superAdmin = Role::findOrCreate('super-admin', 'web');
        $superAdmin->syncPermissions(Permission::all());

        foreach ($brands as $brand) {
            Role::findOrCreate("{$brand}-admin", 'web')
                ->syncPermissions(["brand:{$brand}"]);
        }

        $owner = User::first();

        if ($owner && ! $owner->hasRole('super-admin')) {
            $owner->assignRole('super-admin');
        }
    }
}
