<?php

namespace App\Support;

use App\Models\Exhibitor;
use App\Models\NonExhibitor;
use App\Models\Student;
use App\Models\VirtualAttendant;
use Illuminate\Database\Eloquent\Model;

/**
 * Registrants live across four separate tables (Exhibitor, NonExhibitor,
 * Student, VirtualAttendant) rather than one `users` table, since each
 * type has a different schema. This centralizes the "which table is this
 * email/type in" lookup so login, the dashboard, and tickets don't each
 * reimplement it.
 */
class RegistrantLocator
{
    public const TYPES = [
        'exhibitor' => Exhibitor::class,
        'non_exhibitor' => NonExhibitor::class,
        'student' => Student::class,
        'virtual_attendant' => VirtualAttendant::class,
    ];

    public static function modelClassFor(string $type): ?string
    {
        return self::TYPES[$type] ?? null;
    }

    public static function find(string $type, int $id): ?Model
    {
        $modelClass = self::modelClassFor($type);

        return $modelClass ? $modelClass::find($id) : null;
    }

    /**
     * Finds the (type, model) pair for an email across all registrant
     * tables. Returns null if no match. If the same email somehow exists
     * in more than one table, the first match wins.
     */
    public static function findByEmail(string $email): ?array
    {
        foreach (self::TYPES as $type => $modelClass) {
            $registrant = $modelClass::where('company_contact_email', $email)->first();

            if ($registrant) {
                return ['type' => $type, 'registrant' => $registrant];
            }
        }

        return null;
    }

    public static function label(string $type): string
    {
        return match ($type) {
            'exhibitor' => 'Exhibitor',
            'non_exhibitor' => 'Non-Exhibitor',
            'student' => 'Student',
            'virtual_attendant' => 'Virtual Attendant',
            default => $type,
        };
    }
}
