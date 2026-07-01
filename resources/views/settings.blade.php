<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Woldemariam Abi</title>
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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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
                <a href="/settings" class="text-sm font-medium text-primary dark:text-indigo-400 transition-colors duration-200">Settings</a>
                <a href="/contact" class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-200">Contact</a>
            </div>
            <button onclick="toggleTheme()" class="text-sm px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-100 transition-colors duration-200">🌓</button>
        </div>
    </nav>

    <main class="mx-auto max-w-3xl px-6 py-20">
        <h1 class="text-3xl font-bold mb-8 transition-colors duration-200">Settings</h1>
        
        @if(session('status'))
            <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg text-green-700 dark:text-green-300">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ url('/upload-images') }}" method="POST" enctype="multipart/form-data" 
              x-data="imageUploader()" 
              class="space-y-8">
            @csrf
            
            <!-- Profile Image Upload -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
                <h2 class="text-xl font-semibold mb-4 transition-colors duration-200">Profile Image</h2>
                <div class="flex flex-col items-center">
                    <div class="relative mb-4">
                        <template x-if="profilePreview">
                            <img :src="profilePreview" alt="Profile Preview" class="w-32 h-32 rounded-full object-cover border-4 border-primary">
                        </template>
                        <template x-if="!profilePreview && '{{ asset($settings->profile_image ?? '') }}'">
                            <img src="{{ asset($settings->profile_image ?? '') }}" alt="Current Profile" class="w-32 h-32 rounded-full object-cover border-4 border-gray-200 dark:border-gray-700">
                        </template>
                        <template x-if="!profilePreview && !'{{ $settings->profile_image ?? '' }}'">
                            <div class="w-32 h-32 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-4xl border-4 border-gray-200 dark:border-gray-700">
                                👤
                            </div>
                        </template>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <label class="cursor-pointer px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition">
                            Choose File
                            <input type="file" name="profile_image" accept="image/*" class="hidden" 
                                   @change="handleProfileImage($event)" x-ref="profileInput">
                        </label>
                        <span x-text="profileFileName" class="text-sm text-gray-500"></span>
                    </div>
                    <input type="hidden" name="profile_image_uploaded" :value="profileUploaded">
                </div>
            </div>

            <!-- Header Image Upload -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
                <h2 class="text-xl font-semibold mb-4 transition-colors duration-200">Header Image</h2>
                <div class="flex flex-col">
                    <div class="relative mb-4 h-48 rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800">
                        <template x-if="headerPreview">
                            <img :src="headerPreview" alt="Header Preview" class="w-full h-full object-cover">
                        </template>
                        <template x-if="!headerPreview && '{{ asset($settings->header_image ?? '') }}'">
                            <img src="{{ asset($settings->header_image ?? '') }}" alt="Current Header" class="w-full h-full object-cover">
                        </template>
                        <template x-if="!headerPreview && !'{{ $settings->header_image ?? '' }}'">
                            <div class="w-full h-full flex items-center justify-center text-gray-400 dark:text-gray-500">
                                No header image uploaded
                            </div>
                        </template>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <label class="cursor-pointer px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition">
                            Choose File
                            <input type="file" name="header_image" accept="image/*" class="hidden" 
                                   @change="handleHeaderImage($event)" x-ref="headerInput">
                        </label>
                        <span x-text="headerFileName" class="text-sm text-gray-500"></span>
                    </div>
                </div>
            </div>

            <!-- Upload Button -->
            <div class="flex justify-between items-center">
                <a href="/contacts" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 font-medium text-sm">
                    View Contact Submissions
                </a>
                <button type="submit" class="px-6 py-3 bg-secondary text-white rounded-lg hover:bg-secondary/90 transition-colors duration-200 font-medium">
                    Save Images
                </button>
            </div>
        </form>
    </main>

    <script>
        function imageUploader() {
            return {
                profilePreview: null,
                headerPreview: null,
                profileFileName: '',
                headerFileName: '',
                profileUploaded: false,
                
                handleProfileImage(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.profileFileName = file.name;
                        this.profileUploaded = true;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.profilePreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                },
                
                handleHeaderImage(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.headerFileName = file.name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.headerPreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                }
            }
        }
    </script>
</body>
</html>