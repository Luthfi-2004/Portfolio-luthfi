@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900">
    <!-- Subtle Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMThoNXY1aC01eiIvPjwvZz48L2c+PC9zdmc+')] opacity-30"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Content -->
            <div class="text-white space-y-8">
                <!-- Status Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    <span class="text-sm font-medium">Available for opportunities</span>
                </div>
                
                <!-- Name -->
                <div class="space-y-4">
                    <h1 class="text-5xl lg:text-7xl font-bold leading-tight">
                        {{ $profile->name ?? 'Your Name' }}
                    </h1>
                    <div class="h-1 w-24 bg-blue-500 rounded-full"></div>
                </div>
                
                <!-- Tagline -->
                <p class="text-2xl lg:text-3xl text-blue-200 font-light">
                    {{ $profile->tagline ?? 'Software Engineer & Problem Solver' }}
                </p>
                
                <!-- Description -->
                <p class="text-lg text-gray-300 leading-relaxed max-w-xl">
                    {{ Str::limit($profile->bio ?? 'Crafting digital experiences with precision and passion.', 180) }}
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#projects" class="group px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg transition-all duration-300 hover:bg-blue-700 hover:shadow-2xl hover:shadow-blue-600/50 hover:scale-105 flex items-center gap-2">
                        Explore My Work
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    
                    @if($profile->resume_file)
                    <a href="{{ Storage::url($profile->resume_file) }}" 
                       download
                       class="px-8 py-4 bg-white/10 backdrop-blur-md border-2 border-white/20 text-white font-semibold rounded-lg hover:bg-white hover:text-slate-900 transition-all duration-300 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Download Resume
                    </a>
                    @endif
                </div>
                
                <!-- Social Links -->
                <div class="flex gap-4 pt-4">
                    @if($profile->github)
                    <a href="{{ $profile->github }}" target="_blank" class="w-12 h-12 flex items-center justify-center bg-white/10 backdrop-blur-md border border-white/20 rounded-lg hover:bg-white hover:text-slate-900 transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    </a>
                    @endif
                    @if($profile->linkedin)
                    <a href="{{ $profile->linkedin }}" target="_blank" class="w-12 h-12 flex items-center justify-center bg-white/10 backdrop-blur-md border border-white/20 rounded-lg hover:bg-white hover:text-slate-900 transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    @endif
                    @if($profile->email)
                    <a href="mailto:{{ $profile->email }}" class="w-12 h-12 flex items-center justify-center bg-white/10 backdrop-blur-md border border-white/20 rounded-lg hover:bg-white hover:text-slate-900 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </a>
                    @endif
                </div>
            </div>
            
            <!-- Profile Image -->
            <div class="relative hidden lg:block">
                @if($profile->photo)
                <div class="relative">
                    <div class="absolute -inset-4 bg-blue-600 rounded-3xl blur-2xl opacity-30"></div>
                    <img src="{{ Storage::url($profile->photo) }}" 
                         alt="{{ $profile->name }}" 
                         class="relative w-full aspect-square object-cover rounded-3xl border-4 border-white/20 shadow-2xl">
                </div>
                @else
                <div class="relative w-full aspect-square bg-blue-600 rounded-3xl flex items-center justify-center border-4 border-white/20 shadow-2xl">
                    <span class="text-9xl font-bold text-white">{{ substr($profile->name ?? 'U', 0, 1) }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-32 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Get to know me</span>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mt-4 mb-6">About Me</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
            </div>
            
            <!-- Content -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 lg:p-16 border border-gray-100">
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Story -->
                    <div class="space-y-6">
                        <h3 class="text-2xl font-bold text-gray-900">My Story</h3>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            {{ $profile->bio ?? 'I am a passionate developer dedicated to creating exceptional digital experiences. With a strong foundation in both design and development, I bring ideas to life through clean code and thoughtful interfaces.' }}
                        </p>
                        <div class="pt-4">
                            <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Currently</h4>
                            <p class="text-gray-700">{{ $profile->tagline ?? 'Building innovative solutions' }}</p>
                        </div>
                    </div>
                    
                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <h3 class="text-2xl font-bold text-gray-900">Let's Connect</h3>
                        <div class="space-y-4">
                            @if($profile->email)
                            <a href="mailto:{{ $profile->email }}" class="group flex items-center gap-4 p-4 bg-blue-50 rounded-xl hover:bg-blue-100 hover:shadow-lg transition-all duration-300">
                                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Email</p>
                                    <p class="text-gray-900 font-semibold">{{ $profile->email }}</p>
                                </div>
                            </a>
                            @endif
                            
                            <div class="grid grid-cols-2 gap-3">
                                @if($profile->github)
                                <a href="{{ $profile->github }}" target="_blank" class="p-4 bg-gray-900 text-white rounded-xl hover:bg-gray-800 transition-all duration-300 text-center font-semibold hover:scale-105">
                                    GitHub
                                </a>
                                @endif
                                @if($profile->linkedin)
                                <a href="{{ $profile->linkedin }}" target="_blank" class="p-4 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-300 text-center font-semibold hover:scale-105">
                                    LinkedIn
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-32 bg-gray-50">
    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">My Expertise</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mt-4 mb-6">Skills & Technologies</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        
        <div class="max-w-6xl mx-auto space-y-12">
            @foreach($skillsByCategory as $category => $categorySkills)
            <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-12 border border-gray-100 hover:shadow-2xl transition-shadow duration-300">
                <h3 class="text-2xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                    <span class="w-2 h-8 bg-blue-600 rounded-full"></span>
                    {{ $category }}
                </h3>
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($categorySkills as $skill)
                    <div class="group">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">{{ $skill->name }}</h4>
                            <span class="text-blue-600 font-bold text-lg">{{ $skill->level }}%</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-600 rounded-full transition-all duration-1000 ease-out"
                                 style="width: 0%"
                                 data-width="{{ $skill->level }}%">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-32 bg-white">
    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Portfolio</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mt-4 mb-6">Featured Projects</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:-translate-y-2">
                <!-- Image -->
                <div class="relative aspect-video overflow-hidden bg-gray-200">
                    @if($project->featured_image)
                    <img src="{{ Storage::url($project->featured_image) }}" 
                         alt="{{ $project->title }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                    <div class="w-full h-full bg-blue-600"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-4 left-4 right-4 flex gap-2">
                            @if($project->live_url)
                            <a href="{{ $project->live_url }}" target="_blank" class="flex-1 py-2 px-4 bg-white text-gray-900 rounded-lg text-center font-semibold text-sm hover:bg-gray-100 transition-colors">
                                Live Demo
                            </a>
                            @endif
                            @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="flex-1 py-2 px-4 bg-gray-900 text-white rounded-lg text-center font-semibold text-sm hover:bg-gray-800 transition-colors">
                                Code
                            </a>
                            @endif
                        </div>
                    </div>
                    @if($project->is_featured)
                    <div class="absolute top-4 right-4 px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full">
                        FEATURED
                    </div>
                    @endif
                </div>
                
                <!-- Content -->
                <div class="p-6 space-y-4">
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">
                        {{ $project->title }}
                    </h3>
                    <p class="text-gray-600 line-clamp-2">
                        {!! Str::limit(strip_tags($project->description), 100) !!}
                    </p>
                    @if($project->tech_stack)
                    <div class="flex flex-wrap gap-2 pt-2">
                        @foreach(array_slice($project->tech_stack, 0, 3) as $tech)
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<script>
// Animate skill bars
const skillBars = document.querySelectorAll('[data-width]');
const skillObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.style.width = entry.target.getAttribute('data-width');
            }, 200);
            skillObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.3 });

skillBars.forEach(bar => skillObserver.observe(bar));
</script>

@endsection