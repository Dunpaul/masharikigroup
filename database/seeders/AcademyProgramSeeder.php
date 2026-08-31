<?php

namespace Database\Seeders;

use App\Models\AcademyProgram;
use Illuminate\Database\Seeder;

class AcademyProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Videography & Lighting Techniques',
                'specialization_key' => 'videography_lighting',
                'description' => 'Develop professional skills in camera operation, composition, shot planning, lighting techniques, and visual storytelling. Students gain practical experience producing high-quality video content using industry-standard equipment and workflows.',
                'image_url' => 'https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=1200&q=80',
                'sort_order' => 1,
            ],
            [
                'title' => 'Sound Design',
                'specialization_key' => 'sound_design',
                'description' => 'Learn the complete audio production process including location sound recording, dialogue capture, sound editing, sound effects, mixing, and audio mastering to create immersive soundtracks for film and digital media.',
                'image_url' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=1200&q=80',
                'sort_order' => 2,
            ],
            [
                'title' => 'Screenwriting & Directing',
                'specialization_key' => 'screenwriting_directing',
                'description' => 'Master the art of storytelling by developing compelling scripts, creating memorable characters, directing actors, planning productions, and transforming creative ideas into impactful films.',
                'image_url' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?w=1200&q=80',
                'sort_order' => 3,
            ],
            [
                'title' => 'Art Direction',
                'specialization_key' => 'art_direction',
                'description' => 'Explore production design, set decoration, props, costumes, colour palettes, and visual aesthetics to create believable cinematic worlds that strengthen storytelling.',
                'image_url' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=1200&q=80',
                'sort_order' => 4,
            ],
            [
                'title' => 'Editing',
                'specialization_key' => 'editing',
                'description' => 'Learn professional post-production workflows including video editing, colour correction, audio synchronization, visual pacing, storytelling through editing, and exporting for multiple platforms.',
                'image_url' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=1200&q=80',
                'sort_order' => 5,
            ],
        ];

        foreach ($programs as $program) {
            AcademyProgram::query()->firstOrCreate(['specialization_key' => $program['specialization_key']], $program);
        }
    }
}
