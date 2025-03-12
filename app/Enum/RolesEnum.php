<?php

namespace App\Enum;

use Spatie\Permission\Traits\HasRoles;

enum RolesEnum: string
{
    case Customer = 'customer';
    case Driver = 'driver';
    case Manager = 'manager';

    public static function labels(): array {
        return [
            self::Customer->value => 'Customer',
            self::Driver->value => 'Driver',
            self::Manager->value => 'Manager',
        ];
    }

    public function label() {
        return match($this) {
            self::Customer => 'Customer',
            self::Driver => 'Driver',
            self::Manager => 'Manager',
        };
    }
}