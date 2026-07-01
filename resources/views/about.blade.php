<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - Woldemariam Abi</title>
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
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased transition-colors duration-200 dark:bg-gray-900 dark:text-gray-100">

    <nav class="bg-white/80 backdrop-blur border-b border-gray-200 dark:bg-gray-900/80 dark:border-gray-800 dark:text-gray-100 sticky top-0 z-50 transition-colors duration-200">
        <div class="mx-auto max-w-6xl px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-xl font-bold text-primary dark:text-indigo-400 transition-colors duration-200">Woldemariam Abi</a>
            <div class="hidden md:flex items-center gap-6">
                <a href="/" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Home</a>
                <a href="/about" class="text-sm font-medium text-primary dark:text-indigo-400 transition-colors duration-200">About</a>
                <a href="/projects" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Projects</a>
                <a href="/skills" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Skills</a>
                <a href="/resume" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Resume</a>
                <a href="/contact" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Contact</a>
            </div>
            <button onclick="toggleTheme()" class="text-sm px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-100 transition-colors duration-200">🌓</button>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl px-6 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h1 class="text-4xl font-bold mb-4 transition-colors duration-200">About Me</h1>
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-4 transition-colors duration-200">
                    I am currently learning Software Engineering and focusing on Laravel, PHP, MySQL, JavaScript, and modern web development practices.
                </p>
                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-200">
                    Passionate about building clean, responsive web applications and always eager to learn new technologies.
                </p>
            </div>
            <div class="flex justify-center">
                @php
                    $profileImage = \Illuminate\Support\Facades\DB::table('portfolio_settings')->value('profile_image');
                @endphp
                @if($profileImage)
                    <img src="{{ asset('storage/' . $profileImage) }}" alt="Profile" class="w-48 h-48 rounded-full object-cover border-4 border-white dark:border-gray-800 shadow-2xl">
                @else
                    <div class="w-48 h-48 bg-gradient-to-br from-primary to-purple-600 rounded-full flex items-center justify-center text-white text-6xl font-bold shadow-2xl">ZA</div>
                @endif
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 transition-colors duration-200">
                <h3 class="font-semibold text-lg mb-3 text-primary transition-colors duration-200">Education</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">BSc Software Engineering (Current)</p>
            </div>
            <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 transition-colors duration-200">
                <h3 class="font-semibold text-lg mb-3 text-primary transition-colors duration-200">Career Goals</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">Become a Full-Stack Web Developer and contribute to impactful software projects.</p>
            </div>
            <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 transition-colors duration-200">
                <h3 class="font-semibold text-lg mb-3 text-primary transition-colors duration-200">Interests</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">Web Development, Cybersecurity, Open Source, Problem Solving.</p>
            </div>
        </div>
    </main>
</body>
</html>