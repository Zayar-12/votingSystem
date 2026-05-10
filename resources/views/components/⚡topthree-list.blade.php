<?php

use Livewire\Component;
use App\Models\Candidate;
use App\Models\User; 

new class extends Component
{
    public function  with():array{
        return 
        [
            'topCandidates'=>Candidate::withCount('users')->orderBy('users_count','desc')->take(3)->get(),
        ];
    }
}
?>

<div wire:poll.5s>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($topCandidates as $index => $candidate)
        @php
            $colors = [0 => 'border-amber-400', 1 => 'border-slate-300', 2 => 'border-orange-300'];
            $badges = [0 => '🥇 Winner', 1 => '🥈 1st Runner Up', 2 => '🥉 2nd Runner Up'];
            $glow   = [0 => 'shadow-amber-100', 1 => 'shadow-slate-100', 2 => 'shadow-orange-100'];
        @endphp
        <div class="relative bg-white p-2 rounded-3xl shadow-xl {{ $glow[$index] ?? '' }} border-b-8 {{ $colors[$index] ?? 'border-gray-100' }} transition-transform hover:scale-[1.02]">
            <div class="relative h-72 w-full overflow-hidden rounded-2xl">
                <img 
                    src="{{ $candidate->imagepath ? asset($candidate->imagepath) : asset('images/default-profile.jpg') }}" 
                    alt="{{ $candidate->name }}"
                    class="w-full h-full object-cover"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                <div class="absolute bottom-4 left-4">
                    <span class="bg-white/20 backdrop-blur-md text-white text-[10px] px-3 py-1 rounded-full uppercase font-bold tracking-widest border border-white/30">
                        {{ $badges[$index] }}
                    </span>
                </div>
            </div>
            
            <div class="p-5 text-center">
                <h3 class="text-xl font-black text-gray-800 mb-1 uppercase tracking-tight">{{ $candidate->name }}</h3>
                <p class="text-sm font-bold text-gray-400 mb-4">{{ $candidate->nation }}</p>
                
                <div class="bg-gray-50 rounded-2xl py-3 px-4 flex items-center justify-between">
                    <span class="text-gray-400 text-xs font-bold uppercase">Votes</span>
                    <span class="text-2xl font-black text-gray-900">{{ $candidate->users_count ?? 0 }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>  {{-- Well begun is half done. - Aristotle --}}
</div>