<?php

namespace Database\Seeders;

use App\Models\AcademyFormField;
use Illuminate\Database\Seeder;

class AcademyFormFieldSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            ['key' => 'full_name', 'label' => 'Full Name', 'type' => 'text', 'required' => true, 'sort_order' => 1, 'system_key' => 'full_name'],
            ['key' => 'email', 'label' => 'Email Address', 'type' => 'email', 'required' => true, 'sort_order' => 2, 'system_key' => 'email'],
            ['key' => 'phone', 'label' => 'Phone Number', 'type' => 'tel', 'required' => true, 'sort_order' => 3],
            ['key' => 'program', 'label' => 'Program of Interest', 'type' => 'select', 'required' => true, 'sort_order' => 4, 'system_key' => 'program'],
            ['key' => 'motivation', 'label' => 'Why do you want to join?', 'type' => 'textarea', 'required' => true, 'sort_order' => 5],
        ];

        foreach ($defaults as $field) {
            AcademyFormField::firstOrCreate(['key' => $field['key']], $field);
        }
    }
}
