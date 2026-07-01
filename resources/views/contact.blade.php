<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Woldemariam Abi</title>
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
                <a href="/resume" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Resume</a>
                <a href="/contact" class="text-sm font-medium text-primary dark:text-indigo-400 transition-colors duration-200">Contact</a>
            </div>
            <button onclick="toggleTheme()" class="text-sm px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-100 transition-colors duration-200">🌓</button>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl px-6 py-20">
        <h1 class="text-4xl font-bold mb-12 transition-colors duration-200">Contact Me</h1>
        <div class="grid md:grid-cols-2 gap-12">
            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 transition-colors duration-200">
                    <h3 class="font-semibold text-lg mb-4 transition-colors duration-200">Contact Information</h3>
                    <div class="space-y-3 text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">
                        <p>📧 abiwoldemary@gmail.com</p>
                        <p>💻 github.com/woldemaria</p>
                        <p>💼 linkedin.com/in/woldemariam</p>
                        <p>📍 Addis Ababa, Ethiopia</p>
                    </div>
                </div>
            </div>
            <form action="{{ url('/contact') }}" method="POST" class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 space-y-4 transition-colors duration-200">
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
    </main>
</body>
</html>