<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel E-Commerce - Modern Shopping Experience</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }
            @keyframes gradient-shift {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
            .animate-gradient {
                background-size: 200% 200%;
                animation: gradient-shift 8s ease infinite;
            }
        </style>
    </head>
    <body class="antialiased font-sans overflow-x-hidden">
        <div class="relative min-h-screen bg-gradient-to-br from-slate-950 via-purple-950 to-slate-900">
            
            {{-- Animated Background Blobs --}}
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-40 -right-40 h-96 w-96 rounded-full bg-purple-500/30 blur-3xl animate-pulse"></div>
                <div class="absolute top-60 -left-40 h-96 w-96 rounded-full bg-blue-500/30 blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-20 right-60 h-80 w-80 rounded-full bg-pink-500/20 blur-3xl animate-pulse" style="animation-delay: 4s;"></div>
            </div>

            {{-- Navigation --}}
            <nav class="relative z-50 border-b border-white/10 backdrop-blur-xl bg-white/5">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-20 items-center justify-between">
                        {{-- Logo --}}
                        <div class="flex items-center gap-3 group cursor-pointer">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity"></div>
                                <div class="relative h-12 w-12 bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl flex items-center justify-center shadow-2xl transform group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-7 h-7">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                            </div>
                            <span class="text-2xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">
                                ShopZen
                            </span>
                        </div>

                        @if (Route::has('login'))
                            <div class="flex items-center gap-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="group relative px-6 py-2.5 overflow-hidden rounded-xl bg-white/10 text-white font-semibold transition-all hover:scale-105">
                                        <span class="relative z-10">Dashboard</span>
                                        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="px-6 py-2.5 text-white/80 hover:text-white font-medium transition-colors">
                                        Log in
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="group relative px-6 py-2.5 overflow-hidden rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold shadow-lg shadow-purple-500/50 transition-all hover:scale-105 hover:shadow-xl hover:shadow-purple-500/60">
                                            <span class="relative z-10">Get Started</span>
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </nav>

            {{-- Hero Section --}}
            <main class="relative z-10">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    
                    {{-- Hero Content --}}
                    <div class="pt-20 pb-16 text-center lg:pt-32">
                        <div class="animate-float">
                            <div class="inline-flex items-center gap-2 rounded-full border border-purple-500/50 bg-purple-500/10 px-4 py-2 text-sm font-medium text-purple-300 backdrop-blur-sm mb-8">
                                <span class="relative flex h-2 w-2">
                                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-purple-400 opacity-75"></span>
                                    <span class="relative inline-flex h-2 w-2 rounded-full bg-purple-500"></span>
                                </span>
                                Built with Laravel & Livewire
                            </div>
                        </div>

                        <h1 class="text-5xl font-extrabold tracking-tight sm:text-6xl lg:text-7xl mb-6">
                            <span class="block text-white mb-2">Next-Gen</span>
                            <span class="block bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 bg-clip-text text-transparent animate-gradient">
                                E-Commerce Experience
                            </span>
                        </h1>

                        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-300 sm:text-xl">
                            Lightning-fast shopping cart with real-time updates, automated inventory management, and seamless checkout powered by modern Laravel technologies.
                        </p>

                        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                            <a href="{{ route('dashboard') }}" class="group relative w-full sm:w-auto px-8 py-4 overflow-hidden rounded-2xl bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold shadow-2xl shadow-purple-500/50 transition-all hover:scale-105 hover:shadow-purple-500/60">
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    Explore Products
                                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </span>
                            </a>
                            <a href="https://github.com/AboNady/Laravel-Task" target="_blank" class="group w-full sm:w-auto px-8 py-4 rounded-2xl border-2 border-white/20 bg-white/5 text-white font-semibold backdrop-blur-sm transition-all hover:bg-white/10 hover:border-white/30">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                    View Source
                                </span>
                            </a>
                        </div>

                        {{-- Stats --}}
                        <div class="mt-16 grid grid-cols-2 gap-8 sm:grid-cols-4">
                            <div class="group cursor-pointer">
                                <div class="text-3xl font-bold text-white group-hover:text-purple-400 transition-colors">100%</div>
                                <div class="mt-1 text-sm text-gray-400">Real-time</div>
                            </div>
                            <div class="group cursor-pointer">
                                <div class="text-3xl font-bold text-white group-hover:text-purple-400 transition-colors">0ms</div>
                                <div class="mt-1 text-sm text-gray-400">Lag Time</div>
                            </div>
                            <div class="group cursor-pointer">
                                <div class="text-3xl font-bold text-white group-hover:text-purple-400 transition-colors">∞</div>
                                <div class="mt-1 text-sm text-gray-400">Scalability</div>
                            </div>
                            <div class="group cursor-pointer">
                                <div class="text-3xl font-bold text-white group-hover:text-purple-400 transition-colors">24/7</div>
                                <div class="mt-1 text-sm text-gray-400">Automated</div>
                            </div>
                        </div>
                    </div>

                    {{-- Features Section --}}
                    <div class="pb-24 pt-12">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl font-bold text-white sm:text-4xl mb-4">
                                Powerful Features
                            </h2>
                            <p class="text-gray-400 max-w-2xl mx-auto">
                                Built with enterprise-grade technologies for performance, reliability, and scale
                            </p>
                        </div>

                        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                            
                            {{-- Feature 1 --}}
                            <div class="group relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-sm transition-all hover:scale-105 hover:border-purple-500/50 hover:bg-white/10">
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                
                                <div class="relative">
                                    <div class="mb-6 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-500 to-pink-500 shadow-lg shadow-purple-500/50">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 5.059a4.5 4.5 0 0 1-1.34 4.817 10.924 10.924 0 0 1-1.794 1.187C16.3 19.96 14.654 20.25 13 20.25c-1.657 0-3.3-.29-4.68-.687a10.919 10.919 0 0 1-1.794-1.187 4.5 4.5 0 0 1-1.34-4.817l1.263-5.059a1.75 1.75 0 0 1 1.708-1.344h10.95a1.75 1.75 0 0 1 1.708 1.344Z" />
                                        </svg>
                                    </div>
                                    
                                    <h3 class="mb-3 text-xl font-bold text-white">Dynamic Cart</h3>
                                    <p class="text-sm text-gray-400 leading-relaxed">
                                        Real-time Livewire cart with instant quantity updates and price calculations. No page reloads, pure SPA experience.
                                    </p>
                                </div>
                            </div>

                            {{-- Feature 2 --}}
                            <div class="group relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-sm transition-all hover:scale-105 hover:border-purple-500/50 hover:bg-white/10">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                
                                <div class="relative">
                                    <div class="mb-6 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-500 shadow-lg shadow-blue-500/50">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                        </svg>
                                    </div>
                                    
                                    <h3 class="mb-3 text-xl font-bold text-white">Queue System</h3>
                                    <p class="text-sm text-gray-400 leading-relaxed">
                                        Background job processing for email alerts and notifications. Blazing fast checkout with queued operations.
                                    </p>
                                </div>
                            </div>

                            {{-- Feature 3 --}}
                            <div class="group relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-sm transition-all hover:scale-105 hover:border-purple-500/50 hover:bg-white/10">
                                <div class="absolute inset-0 bg-gradient-to-br from-pink-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                
                                <div class="relative">
                                    <div class="mb-6 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-500 to-rose-500 shadow-lg shadow-pink-500/50">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>
                                    
                                    <h3 class="mb-3 text-xl font-bold text-white">Auto Reports</h3>
                                    <p class="text-sm text-gray-400 leading-relaxed">
                                        Daily sales reports generated at 11 PM automatically. Beautiful HTML emails with comprehensive analytics.
                                    </p>
                                </div>
                            </div>

                            {{-- Feature 4 --}}
                            <div class="group relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-sm transition-all hover:scale-105 hover:border-purple-500/50 hover:bg-white/10">
                                <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                
                                <div class="relative">
                                    <div class="mb-6 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-green-500 to-emerald-500 shadow-lg shadow-green-500/50">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>
                                    
                                    <h3 class="mb-3 text-xl font-bold text-white">Secure Transactions</h3>
                                    <p class="text-sm text-gray-400 leading-relaxed">
                                        Database transactions ensure data integrity. Stock deductions only on successful orders with atomic operations.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </main>

            {{-- Footer --}}
            <footer class="relative z-10 border-t border-white/10 bg-white/5 backdrop-blur-xl">
                <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <p class="text-sm text-gray-400">
                            Laravel v{{ Illuminate\Foundation\Application::VERSION }} • PHP v{{ PHP_VERSION }}
                        </p>
                        <div class="flex items-center gap-6 text-sm text-gray-400">
                            <a href="#" class="hover:text-white transition-colors">Documentation</a>
                            <a href="#" class="hover:text-white transition-colors">API</a>
                            <a href="#" class="hover:text-white transition-colors">Support</a>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </body>
</html>
