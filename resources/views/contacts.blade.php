<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts - Woldemariam Abi</title>
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
                <a href="/settings" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Settings</a>
                <a href="/contact" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Contact</a>
            </div>
            <button onclick="toggleTheme()" class="text-sm px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-100 transition-colors duration-200">🌓</button>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl px-6 py-20">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold transition-colors duration-200">Contact Submissions</h1>
            <a href="/settings" class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors duration-200 text-sm">Settings</a>
        </div>

        @if($contacts->count() > 0)
            <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden transition-colors duration-200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-500 dark:text-gray-400">Name</th>
                                <th class="px-6 py-3 font-medium text-gray-500 dark:text-gray-400">Email</th>
                                <th class="px-6 py-3 font-medium text-gray-500 dark:text-gray-400">Phone</th>
                                <th class="px-6 py-3 font-medium text-gray-500 dark:text-gray-400">Message</th>
                                <th class="px-6 py-3 font-medium text-gray-500 dark:text-gray-400">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            @foreach($contacts as $contact)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100 font-medium">{{ $contact->name }}</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $contact->email }}</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $contact->phone ?? '—' }}</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300 max-w-xs truncate">{{ $contact->message }}</td>
                                    <td class="px-6 py-4 text-gray-500 dark:text-gray-400 whitespace-nowrap">{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-white dark:bg-gray-900 p-12 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 text-center transition-colors duration-200">
                <p class="text-gray-500 dark:text-gray-400">No contact submissions yet.</p>
            </div>
        @endif
    </main>

    <footer class="bg-gray-900 text-white py-12">
        <div class="mx-auto max-w-6xl px-6 text-center">
            <p class="text-lg font-semibold mb-2">Woldemariam Abi</p>
            <p class="text-sm text-gray-400 mb-4">Software Engineering Student | Web Developer</p>
            <p class="text-xs text-gray-500">© 2026 Woldemariam Abi. Built with Laravel & Tailwind CSS.</p>
        </div>
    </footer>
</body>
</html>
