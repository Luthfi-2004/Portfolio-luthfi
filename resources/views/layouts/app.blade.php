<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->name ?? 'Portfolio' }} - Professional Portfolio</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-slate-900 antialiased selection:bg-blue-600 selection:text-white">
    
    <nav class="fixed w-full top-0 z-50 transition-all duration-300 bg-white/80 backdrop-blur-md border-b border-gray-100" id="navbar">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="#home" class="text-xl font-bold text-slate-900 tracking-tight hover:text-blue-600 transition-colors">
                    {{ $profile->name ?? 'Portfolio' }}<span class="text-blue-600">.</span>
                </a>
                
                <div class="hidden md:flex items-center gap-8">
                    <a href="#about" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">About</a>
                    <a href="#skills" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">Skills</a>
                    <a href="#projects" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">Projects</a>
                    
                    @if($profile->resume_file)
                    <a href="{{ asset('files/' . $profile->resume_file) }}" 
                       download
                       class="px-5 py-2.5 bg-slate-900 text-white text-sm font-bold rounded-lg hover:bg-blue-600 transition-all shadow-lg hover:shadow-blue-600/20 transform hover:-translate-y-0.5">
                        Download CV
                    </a>
                    @endif
                </div>

                <button class="md:hidden p-2 text-slate-600 hover:bg-gray-100 rounded-lg transition-colors" id="mobile-menu-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <div class="hidden md:hidden mt-4 border-t border-gray-100 pt-4 space-y-2 bg-white" id="mobile-menu">
                <a href="#about" class="block py-2 px-4 text-slate-600 hover:bg-gray-50 hover:text-blue-600 rounded-lg font-medium">About</a>
                <a href="#skills" class="block py-2 px-4 text-slate-600 hover:bg-gray-50 hover:text-blue-600 rounded-lg font-medium">Skills</a>
                <a href="#projects" class="block py-2 px-4 text-slate-600 hover:bg-gray-50 hover:text-blue-600 rounded-lg font-medium">Projects</a>
                
                @if($profile->resume_file)
                <div class="pt-2">
                    <a href="{{ asset('files/' . $profile->resume_file) }}" 
                       download
                       class="block w-full text-center py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">
                        Download Resume
                    </a>
                </div>
                @endif
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-white py-12 border-t border-slate-800">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="text-center md:text-left">
                    <h3 class="text-2xl font-bold mb-2">{{ $profile->name ?? 'Portfolio' }}</h3>
                    <p class="text-slate-400 text-sm max-w-sm">
                        {{ $profile->tagline ?? 'Building digital products, brands, and experiences.' }}
                    </p>
                </div>
                
                <div class="flex gap-4">
                    @if($profile->github)
                    <a href="{{ $profile->github }}" target="_blank" class="w-10 h-10 bg-white/5 border border-white/10 rounded-lg flex items-center justify-center hover:bg-white hover:text-slate-900 transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    </a>
                    @endif
                    @if($profile->linkedin)
                    <a href="{{ $profile->linkedin }}" target="_blank" class="w-10 h-10 bg-white/5 border border-white/10 rounded-lg flex items-center justify-center hover:bg-white hover:text-slate-900 transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    @endif
                </div>
            </div>
            <div class="border-t border-slate-800 mt-8 pt-8 text-center text-slate-500 text-sm">
                &copy; {{ date('Y') }} {{ $profile->name }}. Crafted with Laravel & Tailwind.
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        if(btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });

            // Close menu when clicking link
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                });
            });
        }

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 20) {
                navbar.classList.add('shadow-sm');
                navbar.classList.add('bg-white/90');
            } else {
                navbar.classList.remove('shadow-sm');
                navbar.classList.remove('bg-white/90');
            }
        });
    </script>
</body>
</html>