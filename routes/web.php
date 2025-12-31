<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // 1. DATA PROFIL (Ganti di sini)
    $profile = (object) [
        'name' => 'Luthfi', // Nama Kamu
        'tagline' => 'Web Developer & Visual Content Creator',
        'bio' => 'I am a Computer Science student at Universitas Buana Perjuangan Karawang who bridges the gap between code and creativity. Unlike typical developers, I offer a dual skillset: building functional websites and producing high-quality photography and videography. My background includes winning 1st Place at Technovision 2025 for app development and working as a freelance photographer for sports and events. I help clients build their digital presence not just with clean code, but with compelling visual storytelling.',
        'email' => 'luthfi.rafanandanaufal@gmail.com',
        'github' => 'https://github.com/Luthfi-2004',
        'linkedin' => 'https://www.linkedin.com/in/luthfirafanandanaufal/',
        'photo' => 'profile.jpg', // Masukkan foto bernama 'profile.jpg' di folder public/images
        'resume_file' => 'cv.pdf', // Masukkan file 'cv.pdf' di folder public/files
    ];

    // 2. DATA SKILL (Ganti angkanya)
    $skillsByCategory = [
        'Backend' => [
            (object)['name' => 'Laravel', 'level' => 90],
            (object)['name' => 'PHP', 'level' => 85],
            (object)['name' => 'MySQL', 'level' => 80],
        ],
        'Frontend' => [
            (object)['name' => 'Tailwind CSS', 'level' => 95],
            (object)['name' => 'JavaScript', 'level' => 75],
            (object)['name' => 'Vue.js', 'level' => 70],
        ],
        'Tools' => [
            (object)['name' => 'Git & GitHub', 'level' => 85],
            (object)['name' => 'Vercel', 'level' => 80],
            (object)['name' => 'Figma', 'level' => 60],
        ]
    ];

    // 3. DATA PROJECT
    $projects = collect([
        (object) [
            'title' => 'Resdigaza: Integrated Digital Restaurant Management System.',
            'description' => 'Winner of the 1st Place Innovation Award at Technovision 2025. Resdigaza is a comprehensive digital solution engineered to modernize culinary business operations. The application bridges the gap between traditional service and digital efficiency by streamlining the ordering process, payment integration, and kitchen workflow management. Developed with a user-centric approach, this project demonstrates high-level problem-solving skills and the ability to deploy functional software that addresses real-world industry challenges.',
            'tech_stack' => ['Laravel', 'MySQL', 'Bootstrap', 'Midtrans'],
            'live_url' => 'https://resdigaza.my.id/',
            'github_url' => 'https://github.com/Luthfi-2004/mobile',
            'featured_image' => 'project1.jpg', // Masukkan di public/images
            'is_featured' => true
        ],
        (object) [
            'title' => 'Portfolio Website',
            'description' => 'Website portofolio pribadi yang menggunakan data statis untuk performa maksimal.',
            'tech_stack' => ['Laravel', 'Vercel'],
            'live_url' => '#',
            'github_url' => '#',
            'featured_image' => null, // null jika tidak ada gambar
            'is_featured' => true
        ],
    ]);

    return view('portfolio.index', [
        'profile' => $profile,
        'skillsByCategory' => $skillsByCategory,
        'projects' => $projects,
        // Helper kecil biar view tidak error
        'featuredProjects' => $projects->where('is_featured', true)
    ]);
});