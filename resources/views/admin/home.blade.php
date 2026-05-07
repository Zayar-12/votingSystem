    @extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('admin_content')
<div class="p-6 space-y-6">
    <!-- Header with Start/Stop Buttons -->
    <div class="flex flex-col md:flex-row md:items-center justify-between bg-white p-6 rounded-xl shadow-sm border border-gray-100 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Voting Control Panel</h1>
            <p class="text-sm text-gray-500 italic">Current Status: 
                <span class="font-bold {{ $is_voting_open ? 'text-green-600' : 'text-red-600' }}">
                    {{ $is_voting_open ? 'Active' : 'Stopped' }}
                </span>
            </p>
        </div>
        <div class="flex gap-3">
            <button class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition shadow-md">Declare Winner</button>
            <form action="{{ route('toggleStartStop') }}" method="POST">
                @csrf
                @if($is_voting_open)
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition shadow-md">
                        Stop Voting
                    </button>
                @else
                    <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition shadow-md">
                        Start Voting
                    </button>
                @endif
            </form>
        </div>
    </div>

    <!-- Leaderboard (Top 3) -->
  <livewire:top-candidates/>
  <livewire:candidates-list/>

</div>
@endsection