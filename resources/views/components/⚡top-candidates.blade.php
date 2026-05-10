<?php

use Livewire\Component;
use App\Models\Candidate;
use App\Models\User; 
use Livewire\WithPagination;
new class extends Component


{
use WithPagination;
   
    public function with(): array {
        $allCandidates = Candidate::withCount('users')->orderBy('users_count', 'desc')->paginate(10);
        $totalVotes = Candidate::withCount('users')->get()->sum('users_count');

        return [
            'topCandidates' => $allCandidates->take(3),
            'allCandidates' => $allCandidates,
            'totalVotes'    => $totalVotes > 0 ? $totalVotes : 1, 
        ];
    }
}
?>

<div wire:poll.5s class="space-y-10 p-6 bg-gray-50/50 min-h-screen">
    
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b pb-6">
        <div>
            <h2 class="text-3xl font-black text-gray-900 tracking-tight">Live Election Results</h2>
            <p class="text-gray-500 font-medium">Real-time updates of the Miss Universe voting.</p>
        </div>
        <div class="bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg shadow-blue-200">
            <p class="text-xs uppercase font-bold opacity-80">Total Votes Cast</p>
            <p class="text-2xl font-black">{{ $totalVotes == 1 ? 0 : $totalVotes }}</p>
        </div>
    </div>
 <livewire:topthree-list/>
    

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-50 bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-800">Full Standings & Percentages</h3>
        </div>
        <div class="p-8 space-y-6">
            @foreach($allCandidates as $candidate)
            @php
                $percentage = ($candidate->users_count / $totalVotes) * 100;
            @endphp
            <div class="space-y-2">
                <div class="flex justify-between items-end">
                    <div class="flex items-center gap-3">
                        <span class="text-sm font-black text-gray-400 w-6">#{{ $loop->iteration }}</span>
                        <span class="text-sm font-bold text-gray-700">{{ $candidate->name }}</span>
                    </div>
                    <div class="text-right">
                        <span class="text-sm font-black text-gray-900">{{ number_format($percentage, 1) }}%</span>
                        <span class="text-[10px] text-gray-400 font-bold uppercase ml-1">({{ $candidate->users_count }} votes)</span>
                    </div>
                </div>
                <div class="w-full bg-gray-100 h-3 rounded-full overflow-hidden flex">
                    <div 
                        class="h-full rounded-full transition-all duration-1000 ease-out {{ $loop->first ? 'bg-blue-600' : 'bg-gray-400' }}"
                        style="width: {{ $percentage }}%"
                    ></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="px-8 py-4 bg-gray-50 border-t border-gray-100">
        {{ $allCandidates->links() }}
    </div>

</div>