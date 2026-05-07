<?php

use Livewire\Component; 
use App\Models\Candidate;

new class extends Component
{
    //
   

    public function with():array{
        return [
     'topCandidates'=>Candidate::withCount('users')->orderBy('users_count','desc')->take(3)->get(),

        ];
    }
}
?>

<div wire:poll>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($topCandidates as $index => $candidate)
        @php
            $colors = [0 => 'border-amber-400', 1 => 'border-slate-400', 2 => 'border-orange-400'];
            $badges = [0 => '🥇 1st Place', 1 => '🥈 2nd Place', 2 => '🥉 3rd Place'];
        @endphp
        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 {{ $colors[$index] ?? 'border-gray-200' }}">
            <p class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">{{ $badges[$index] ?? 'Ranked' }}</p>
            <h3 class="text-xl font-bold text-gray-800">{{ $candidate->name }}</h3>
            <div class="mt-4 flex items-end justify-between">
                <div>
                    <span class="text-3xl font-black text-gray-900">{{ $candidate->users_count ?? 0 }}</span>
                    <span class="text-gray-500 ml-1">votes</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>