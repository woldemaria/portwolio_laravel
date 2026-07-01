<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume - Woldemariam Abi</title>
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
                <a href="/about" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">About</a>
                <a href="/projects" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Projects</a>
                <a href="/skills" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Skills</a>
                <a href="/resume" class="text-sm font-medium text-primary dark:text-indigo-400 transition-colors duration-200">Resume</a>
                <a href="/contact" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Contact</a>
            </div>
            <button onclick="toggleTheme()" class="text-sm px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-100 transition-colors duration-200">🌓</button>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl px-6 py-20">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-12">
            <h1 class="text-4xl font-bold transition-colors duration-200">Resume</h1>
            <a href="/download-cv" download class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors duration-200">
                📄 Download CV
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-12">
            <div class="md:col-span-1">
                <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 space-y-6 transition-colors duration-200">
                    <div>
                        <h3 class="font-semibold mb-2 transition-colors duration-200">Personal Info</h3>
                        <div class="space-y-1 text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">
                            <p>Woldemariam Abi</p>
                            <p>abiwoldemary@gmail.com</p>
                            <p>📍 Addis Ababa, Ethiopia</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-2 transition-colors duration-200">Education</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">BSc Software Engineering (Current)</p>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-2 transition-colors duration-200">Technical Skills</h3>
                        <ul class="text-sm text-gray-600 dark:text-gray-300 space-y-1 transition-colors duration-200">
                            <li>• PHP</li>
                            <li>• Laravel</li>
                            <li>• JavaScript</li>
                            <li>• MySQL</li>
                            <li>• Git</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="md:col-span-2">
                <h2 class="text-2xl font-bold mb-6 transition-colors duration-200">Projects</h2>
                <div class="space-y-6">
                    <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 transition-colors duration-200">
                        <h3 class="font-semibold text-lg transition-colors duration-200">Student Management System</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">Laravel + MySQL • CRUD, Authentication, Search, Pagination</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>