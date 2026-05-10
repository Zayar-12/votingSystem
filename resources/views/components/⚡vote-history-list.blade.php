<?php

use Livewire\Component;
use App\Models\Candidate;
use App\Models\User;
use Livewire\WithPagination; 

new class extends Component
{
     use WithPagination;
    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function with(): array {
        return [
            'voterList' => User::with('candidate')->whereNotNull('candidates_id')
            ->where('name', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
        ];
    }
};
?>

<div class="space-y-6 p-6 bg-white rounded-3xl shadow-sm border border-gray-100">
    
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Voting History Logs</h2>
            <p class="text-sm text-gray-500">Track which voter supported which delegate.</p>
        </div>
        
        <div class="relative w-full md:w-72">
            <input 
                type="text" 
                wire:model.live="search" 
                placeholder="Search by voter name..." 
                class="w-full pl-10 pr-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm"
            >
            <svg class="w-4 h-4 absolute left-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-xs font-bold text-gray-500 uppercase tracking-widest border-b border-gray-100">
                    <th class="px-6 py-4">Voter Details</th>
                    <th class="px-6 py-4">Voted To (Candidate)</th>
                   
                    <th class="px-6 py-4 text-right">Vote Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($voterList as $voter)
                    <tr class="hover:bg-blue-50/30 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs">
                                    {{ substr($voter->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-800">{{ $voter->name }}</p>
                                    <p class="text-[11px] text-gray-400">{{ $voter->email }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            @if($voter->candidate)
                              
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset($voter->candidate->imagepath) }}" class="w-8 h-8 rounded-lg object-cover border border-gray-200">
                                    <span class="text-sm font-semibold text-gray-700">{{$voter->candidate->name }}</span>
                                    <span class="text-[10px] bg-gray-100 px-2 py-0.5 rounded text-gray-500">{{ $voter->candidate->nation }}</span>
                                </div>
                               
                            @else
                                <span class="text-xs italic text-gray-400">No vote cast yet</span>
                            @endif
                        </td>

                        

                        <td class="px-6 py-4 text-right">
                            <p class="text-sm text-gray-600 font-medium">{{ $voter->created_at->format('M d, Y') }}</p>
                            <p class="text-[10px] text-gray-400">{{ $voter->created_at->format('h:i A') }}</p>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-500">No voting records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pt-4 border-t border-gray-50">
        {{ $voterList->links() }}
    </div>
</div>