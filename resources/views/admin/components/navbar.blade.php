<!-- Sidebar + Content Wrapper -->
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white flex-shrink-0 hidden md:flex flex-col sticky top-0 h-screen">
        <!-- Logo Section -->
        <div class="p-6 text-2xl font-bold border-b border-slate-800">
            Voting Admin
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('admin.home') }}" class="flex items-center p-3 rounded-lg {{ Request::is('admin/home*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                <span class="ml-3">Dashboard</span>
            </a>
            
            <a href="#" class="flex items-center p-3 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition">
                <span class="ml-3">Candidates</span>
            </a>

            <a href="#" class="flex items-center p-3 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition">
                <span class="ml-3">Voters List</span>
            </a>

            <a href="#" class="flex items-center p-3 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition">
                <span class="ml-3">Results</span>
            </a>
        </nav>

        <!-- User Profile / Logout -->
        <div class="p-4 border-t border-slate-800">
            <div class="flex items-center p-2">
                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-sm font-bold uppercase">
                    {{ substr(Auth::user()->name ?? 'AD', 0, 2) }}
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs text-slate-400 hover:text-red-400">logout</button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area Wrapper -->
    <div class="flex-1 flex flex-col">
        <!-- Top Bar (Optional, can be empty or have a title) -->
        <header class="bg-white shadow-sm h-16 flex items-center px-6 md:hidden">
            <span class="text-xl font-bold">Voting Admin</span>
        </header>

        <!-- Content Placeholder -->
        <main class="p-6">
            @yield('admin_content')
        </main>
    </div>
</div>