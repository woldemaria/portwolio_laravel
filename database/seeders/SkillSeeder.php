<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'HTML5', 'category' => 'Frontend', 'level' => 'advanced', 'icon' => '🌐'],
            ['name' => 'CSS3', 'category' => 'Frontend', 'level' => 'advanced', 'icon' => '🎨'],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'level' => 'intermediate', 'icon' => '⚡'],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'level' => 'intermediate', 'icon' => '💨'],
            ['name' => 'Bootstrap', 'category' => 'Frontend', 'level' => 'intermediate', 'icon' => '🅱️'],
            ['name' => 'PHP', 'category' => 'Backend', 'level' => 'advanced', 'icon' => '🐘'],
            ['name' => 'Laravel', 'category' => 'Backend', 'level' => 'advanced', 'icon' => '🔴'],
            ['name' => 'Django', 'category' => 'Backend', 'level' => 'beginner', 'icon' => '🐍'],
            ['name' => 'Python', 'category' => 'Backend', 'level' => 'beginner', 'icon' => '🐍'],
            ['name' => 'MySQL', 'category' => 'Database', 'level' => 'advanced', 'icon' => '🗄️'],
            ['name' => 'SQL', 'category' => 'Database', 'level' => 'intermediate', 'icon' => '📊'],
            ['name' => 'Eloquent ORM', 'category' => 'Database', 'level' => 'intermediate', 'icon' => '🔗'],
            ['name' => 'Git', 'category' => 'Tools', 'level' => 'intermediate', 'icon' => '📦'],
            ['name' => 'GitHub', 'category' => 'Tools', 'level' => 'intermediate', 'icon' => '💻'],
            ['name' => 'Composer', 'category' => 'Tools', 'level' => 'intermediate', 'icon' => '📦'],
            ['name' => 'Linux', 'category' => 'Tools', 'level' => 'beginner', 'icon' => '🐧'],
            ['name' => 'VS Code', 'category' => 'Tools', 'level' => 'advanced', 'icon' => '💻'],
        ];

        foreach ($skills as $index => $skill) {
            Skill::updateOrCreate(
                ['id' => $index + 1],
                array_merge($skill, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}
