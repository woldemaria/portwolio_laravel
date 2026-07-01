<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woldemariam Abi - Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#10B981',
                    }
                }
            }
        }
    </script>
    <script>
        (function () {
            const stored = localStorage.getItem('theme') || 'light';
            if (stored === 'dark') {
                document.documentElement.classList.add('dark');
            }
            window.toggleTheme = function () {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            };
        })();
    </script>
    <style>
        .fade-in { animation: fadeIn 0.6s ease-in-out both; }
        .fade-in-delay-1 { animation-delay: 0.1s; }
        .fade-in-delay-2 { animation-delay: 0.2s; }
        .fade-in-delay-3 { animation-delay: 0.3s; }
        .fade-in-delay-4 { animation-delay: 0.4s; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased transition-colors duration-200 dark:bg-gray-900 dark:text-gray-100">

    <nav class="bg-white/80 backdrop-blur border-b border-gray-200 dark:bg-gray-900/80 dark:border-gray-800 dark:text-gray-100 sticky top-0 z-50 transition-colors duration-200">
        <div class="mx-auto max-w-6xl px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-xl font-bold text-primary dark:text-indigo-400 transition-colors duration-200">Woldemariam Abi</a>
            <div class="hidden md:flex items-center gap-6">
                <a href="/" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Home</a>
                <a href="/about" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">About</a>
                <a href="/projects" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Projects</a>
                <a href="/skills" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Skills</a>
                <a href="/settings" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Settings</a>
                <a href="/contact" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Contact</a>
            </div>
            <button onclick="toggleTheme()" class="text-sm px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-100 transition-colors duration-200">🌓</button>
        </div>
    </nav>

    <div class="mx-auto max-w-6xl px-6">

        @php
            $headerImage = null;
            $profileImage = null;
            try {
                $headerImage = \Illuminate\Support\Facades\DB::table('portfolio_settings')->value('header_image');
                $profileImage = \Illuminate\Support\Facades\DB::table('portfolio_settings')->value('profile_image');
            } catch (\Throwable $e) {
                // Table may not exist in test database
            }
        @endphp

        @if($headerImage)
            <div class="relative w-full h-48 md:h-64 lg:h-72 overflow-hidden rounded-b-xl">
                <img src="{{ asset('storage/' . $headerImage) }}" alt="Header" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/20"></div>
            </div>
        @endif

        <!-- Hero Section -->
        <section class="py-10 md:py-16">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <p class="text-primary font-medium mb-2 transition-colors duration-200">Software Engineering Student </p>
                    <h1 class="text-4xl md:text-5xl font-bold tracking-tight mb-4">Hi, I'm <span class="text-primary transition-colors duration-200">Woldemariam Abi</span></h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-6 transition-colors duration-200">Web Development and Cybersecurity</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="/download-cv" download class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors duration-200">📄 Download CV</a>
                        <a href="/projects" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 rounded-lg hover:border-primary hover:text-primary dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:hover:text-indigo-400 transition-colors duration-200">💻 View Projects</a>
                        <a href="/contact" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors duration-200">✉️ Contact Me</a>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    @php
                        $profileImage = null;
                        $additionalImage = null;
                        try {
                            $profileImage = \Illuminate\Support\Facades\DB::table('portfolio_settings')->value('profile_image');
                            $additionalImage = \Illuminate\Support\Facades\DB::table('portfolio_settings')->value('additional_image');
                        } catch (\Throwable $e) {
                            // Table may not exist in test database
                        }
                    @endphp
                    @if($profileImage)
                        <img src="{{ asset('storage/' . $profileImage) }}" alt="Profile" class="w-48 h-48 md:w-56 md:h-56 rounded-full object-cover border-4 border-white dark:border-gray-800 shadow-2xl mb-4">
                    @else
                        <div class="w-48 h-48 md:w-56 md:h-56 bg-gradient-to-br from-primary to-purple-600 rounded-full flex items-center justify-center text-white text-5xl md:text-6xl font-bold shadow-2xl mb-4">ZA</div>
                    @endif

                    <form action="{{ url('/upload-images') }}" method="POST" enctype="multipart/form-data" class="text-center">
                        @csrf
                        <div>
                            <label for="profile_upload" class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition cursor-pointer text-sm">
                                📷 Add Profile 
                            </label>
                            <input type="file" name="profile_image" id="profile_upload" accept="image/*" class="hidden" onchange="this.form.submit()">
                        </div>
                    </form>
                </div>
        </div>

        <div class="mt-10 bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 max-w-2xl mx-auto">
            <h3 class="font-semibold text-lg mb-4 text-primary transition-colors duration-200">Add Skill</h3>
            <form action="{{ url('/skills') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1">Skill Name</label>
                    <input type="text" name="name" required placeholder="e.g. Laravel" class="w-full px-3 py-2 border rounded-lg bg-white dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Category</label>
                    <input type="text" name="category" required placeholder="e.g. Backend" class="w-full px-3 py-2 border rounded-lg bg-white dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Level</label>
                    <select name="level" class="w-full px-3 py-2 border rounded-lg bg-white dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                        <option value="expert">Expert</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Icon (emoji)</label>
                    <input type="text" name="icon" placeholder="⚡" class="w-full px-3 py-2 border rounded-lg bg-white dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition text-sm">Add Skill</button>
                </div>
            </form>
        </div>
    </section>
    </div>

    <!-- Social Links -->
    <section class="mx-auto max-w-6xl px-6 py-8">
        <div class="flex flex-wrap justify-center gap-6">
            <a href="https://github.com/woldemaria" target="_blank" rel="noopener" class="flex items-center gap-2 px-4 py-2 bg-white rounded-lg shadow-sm hover:shadow-md border border-gray-100 dark:bg-gray-900 dark:border-gray-800 dark:text-gray-100 transition-colors duration-200">
                <span class="text-xl">💻</span> GitHub
            </a>
            <a href="https://linkedin.com/woldemariam" target="_blank" rel="noopener" class="flex items-center gap-2 px-4 py-2 bg-white rounded-lg shadow-sm hover:shadow-md border border-gray-100 dark:bg-gray-900 dark:border-gray-800 dark:text-gray-100 transition-colors duration-200">
                <span class="text-xl">💼</span> LinkedIn
            </a>
            <a href="mailto:abiwoldemary@gmail.com" class="flex items-center gap-2 px-4 py-2 bg-white rounded-lg shadow-sm hover:shadow-md border border-gray-100 dark:bg-gray-900 dark:border-gray-800 dark:text-gray-100 transition-colors duration-200">
                <span class="text-xl">📧</span> Email
            </a>
            <a href="https://t.me/myusernamewolde" target="_blank" rel="noopener" class="flex items-center gap-2 px-4 py-2 bg-white rounded-lg shadow-sm hover:shadow-md border border-gray-100 dark:bg-gray-900 dark:border-gray-800 dark:text-gray-100 transition-colors duration-200">
                <span class="text-xl">✈️</span> Telegram
            </a>
        </div>
    </section>

    <!-- Skills Overview -->
    <section class="mx-auto max-w-6xl px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 transition-colors duration-200">My Skills</h2>
        @php
            $skills = collect();
            $grouped = collect();
            try {
                $skills = \App\Models\Skill::orderBy('category')->get();
                $grouped = $skills->groupBy('category');
            } catch (\Throwable $e) {
                // Table may not exist in test database
            }
        @endphp
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($grouped as $category => $items)
                <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 transition-all duration-200 hover:shadow-lg hover:-translate-y-1 fade-in fade-in-delay-{{ $loop->index + 1 }}">
                    <h3 class="font-semibold text-lg mb-4 text-primary transition-colors duration-200">{{ $category }}</h3>
                    <ul class="space-y-3">
                        @foreach($items as $skill)
                            <li class="flex items-center gap-3 text-sm text-gray-700 dark:text-gray-300 transition-colors duration-200">
                                <span class="text-xl">{{ $skill->icon ?? '✓' }}</span>
                                <span class="font-medium">{{ $skill->name }}</span>
                                <span class="ml-auto text-xs px-2 py-0.5 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400">{{ ucfirst($skill->level) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        @if(session('status'))
            <div class="mt-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg text-green-700 dark:text-green-300 text-sm text-center">
                {{ session('status') }}
            </div>
        @endif
    </section>

    <!-- Statistics -->
    <section class="mx-auto max-w-6xl px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 transition-colors duration-200">Quick Facts</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 transition-colors duration-200">
                <p class="text-4xl font-bold text-primary transition-colors duration-200">5+</p>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 transition-colors duration-200">Projects Completed</p>
            </div>
            <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 transition-colors duration-200">
                <p class="text-4xl font-bold text-primary transition-colors duration-200">1+</p>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 transition-colors duration-200">Years Learning</p>
            </div>
            <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 transition-colors duration-200">
                <p class="text-4xl font-bold text-primary transition-colors duration-200">0+</p>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 transition-colors duration-200">GitHub Commits</p>
            </div>
            <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 transition-colors duration-200">
                <p class="text-4xl font-bold text-primary transition-colors duration-200">began</p>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 transition-colors duration-200">Technologies Mastered</p>
            </div>
        </div>
    </section>

    <!-- Tech Stack -->
    <section class="mx-auto max-w-6xl px-6 py-16 bg-white dark:bg-gray-900 border-y border-gray-100 dark:border-gray-800 transition-colors duration-200">
        <h2 class="text-3xl font-bold text-center mb-12 transition-colors duration-200">Tech Stack</h2>
        <div class="flex flex-wrap justify-center gap-4">
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">HTML</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">CSS</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">JavaScript</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">PHP</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">Laravel</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">MySQL</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">Git</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">Linux</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">python</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">Django</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">Vuejs</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">Tailwindcss</span>


            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">C++</span>
            <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-200">Java</span>
            



        </div>
    </section>



    <!-- Services -->
    <section class="mx-auto max-w-6xl px-6 py-16 bg-white dark:bg-gray-900 border-y border-gray-100 dark:border-gray-800 transition-colors duration-200">
        <h2 class="text-3xl font-bold text-center mb-12 transition-colors duration-200">Services</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center p-6">
                <div class="text-4xl mb-4">🌐</div>
                <h3 class="font-semibold mb-2 transition-colors duration-200">Web Development</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">Building responsive and modern websites.</p>
            </div>
            <div class="text-center p-6">
                <div class="text-4xl mb-4">🎨</div>
                <h3 class="font-semibold mb-2 transition-colors duration-200">Responsive Design</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">Mobile-first, cross-device compatible designs.</p>
            </div>
            <div class="text-center p-6">
                <div class="text-4xl mb-4">⚙️</div>
                <h3 class="font-semibold mb-2 transition-colors duration-200">Laravel Applications</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">Robust backend systems with Laravel.</p>
            </div>
            <div class="text-center p-6">
                <div class="text-4xl mb-4">🗄️</div>
                <h3 class="font-semibold mb-2 transition-colors duration-200">Database Design</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">Efficient MySQL database architecture.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="mx-auto max-w-6xl px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 transition-colors duration-200">Testimonials</h2>
        <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 max-w-2xl mx-auto transition-colors duration-200">
            <p class="text-lg italic text-gray-700 dark:text-gray-300 mb-4 transition-colors duration-200">"Wolde delivered a clean and responsive web application. His code is well-structured and easy to maintain."</p>
            <p class="text-sm font-medium transition-colors duration-200">— Instructor / Colleague</p>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="mx-auto max-w-6xl px-6 py-16 bg-white dark:bg-gray-900 border-y border-gray-100 dark:border-gray-800 transition-colors duration-200">
        <h2 class="text-3xl font-bold text-center mb-12 transition-colors duration-200">Contact Me</h2>
        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="font-semibold text-lg mb-4 transition-colors duration-200">Get in Touch</h3>
                <div class="space-y-4 text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">
                    <p>📧 abiwoldemary@gmail.com</p>
                    <p>💻 github.com/woldemaria</p>
                    <p>💼 linkedin.com/in/woldemariam</p>
                    <p>📍 Addis Ababa, Ethiopia</p>
                </div>
            </div>
            <form action="{{ url('/contact') }}" method="POST" class="bg-gray-50 dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 space-y-4 transition-colors duration-200">
                @csrf
                @if(session('status'))
                    <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg text-green-700 dark:text-green-300 text-sm">
                        {{ session('status') }}
                    </div>
                @endif
                <div>
                    <label class="block text-sm font-medium mb-1 transition-colors duration-200">Name</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1 transition-colors duration-200">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1 transition-colors duration-200">Phone</label>
                    <input type="tel" name="phone" class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1 transition-colors duration-200">Message</label>
                    <textarea rows="4" name="message" required class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200"></textarea>
                </div>
                <button type="submit" class="w-full py-3 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors duration-200">Send Message</button>
            </form>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-12">
        <div class="mx-auto max-w-6xl px-6 text-center">
            <p class="text-lg font-semibold mb-2">Woldemariam Abi</p>
            <p class="text-sm text-gray-400 mb-4">Software Engineering Student | Web Developer</p>
            <p class="text-xs text-gray-500">© 2026 Woldemariam Abi. Built with Laravel & Tailwind CSS.</p>
        </div>
    </footer>
</body>
</html>