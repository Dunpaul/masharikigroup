<?php

namespace App\Filament\Resources\Admins\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Role;

class AdminForm
{
    /**
     * Friendly labels for role slugs, keyed by the role's `name` column.
     */
    public const ROLE_LABELS = [
        'super-admin' => 'Super Admin (all sections)',
        'group-admin' => 'Group only',
        'academy-admin' => 'Academy only',
        'market-admin' => 'MashaRket only',
        'festival-admin' => 'Festival only',
    ];

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->required(fn (string $operation) => $operation === 'create')
                    ->dehydrated(fn (?string $state) => filled($state))
                    ->dehydrateStateUsing(fn (string $state) => bcrypt($state))
                    ->helperText('Leave blank to keep the current password when editing.'),
                Select::make('roles')
                    ->label('Section access')
                    ->relationship('roles', 'name')
                    ->options(fn () => Role::query()->pluck('name', 'id')
                        ->map(fn (string $name) => self::ROLE_LABELS[$name] ?? $name))
                    ->multiple()
                    ->preload()
                    ->required()
                    ->helperText('An admin can be scoped to one or more sections, or made a Super Admin.'),
            ]);
    }
}
