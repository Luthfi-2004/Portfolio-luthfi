<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Profile
        Profile::create([
            'name' => 'John Doe',
            'tagline' => 'Full Stack Web Developer',
            'bio' => 'Passionate developer with 3+ years of experience in building modern web applications. Specialized in Laravel, React, and Vue.js. Love creating clean, efficient code and user-friendly interfaces.',
            'email' => 'john.doe@example.com',
            'github' => 'https://github.com/johndoe',
            'linkedin' => 'https://linkedin.com/in/johndoe',
        ]);

        // Create Projects
        Project::create([
            'title' => 'E-Commerce Platform',
            'description' => '<p>Full-featured e-commerce platform with payment integration, inventory management, and admin dashboard. Built with Laravel and Vue.js.</p>',
            'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS'],
            'live_url' => 'https://example.com',
            'github_url' => 'https://github.com/johndoe/ecommerce',
            'order' => 1,
            'is_featured' => true,
        ]);

        Project::create([
            'title' => 'Task Management App',
            'description' => '<p>Collaborative task management application with real-time updates, team collaboration features, and project tracking.</p>',
            'tech_stack' => ['React', 'Node.js', 'MongoDB', 'Socket.io'],
            'live_url' => 'https://example.com/tasks',
            'github_url' => 'https://github.com/johndoe/task-app',
            'order' => 2,
            'is_featured' => true,
        ]);

        Project::create([
            'title' => 'Portfolio Website',
            'description' => '<p>Modern portfolio website with admin panel for content management. Features include project showcase, blog, and contact form.</p>',
            'tech_stack' => ['Laravel', 'Filament', 'Tailwind CSS'],
            'github_url' => 'https://github.com/johndoe/portfolio',
            'order' => 3,
            'is_featured' => false,
        ]);

        // Create Skills
        $frontendSkills = [
            ['name' => 'HTML & CSS', 'level' => 95],
            ['name' => 'JavaScript', 'level' => 90],
            ['name' => 'React.js', 'level' => 85],
            ['name' => 'Vue.js', 'level' => 80],
            ['name' => 'Tailwind CSS', 'level' => 90],
        ];

        $backendSkills = [
            ['name' => 'PHP', 'level' => 90],
            ['name' => 'Laravel', 'level' => 95],
            ['name' => 'Node.js', 'level' => 75],
            ['name' => 'RESTful API', 'level' => 85],
        ];

        $databaseSkills = [
            ['name' => 'MySQL', 'level' => 85],
            ['name' => 'PostgreSQL', 'level' => 75],
            ['name' => 'MongoDB', 'level' => 70],
        ];

        $toolsSkills = [
            ['name' => 'Git & GitHub', 'level' => 90],
            ['name' => 'Docker', 'level' => 70],
            ['name' => 'VS Code', 'level' => 95],
        ];

        $order = 1;
        foreach ($frontendSkills as $skill) {
            Skill::create([
                'name' => $skill['name'],
                'category' => 'Frontend',
                'level' => $skill['level'],
                'order' => $order++,
            ]);
        }

        foreach ($backendSkills as $skill) {
            Skill::create([
                'name' => $skill['name'],
                'category' => 'Backend',
                'level' => $skill['level'],
                'order' => $order++,
            ]);
        }

        foreach ($databaseSkills as $skill) {
            Skill::create([
                'name' => $skill['name'],
                'category' => 'Database',
                'level' => $skill['level'],
                'order' => $order++,
            ]);
        }

        foreach ($toolsSkills as $skill) {
            Skill::create([
                'name' => $skill['name'],
                'category' => 'Tools',
                'level' => $skill['level'],
                'order' => $order++,
            ]);
        }
    }
}