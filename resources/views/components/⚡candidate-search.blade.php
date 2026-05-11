<?php

use Livewire\Component; 
use App\Models\Candidate;
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
            'candidates' => Candidate::where('name', 'like', '%' . $this->search . '%')
                ->latest() 
                ->paginate(12), 
        ];
    }
};
?>
{{-- 
<div>
    <div style="margin-bottom: 20px; padding: 10px;">
       
        <input 
            type="text" 
           wire:model.live='search' 
            placeholder="Search candidates by name..." 
            style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;"
        >
    </div>

     <div>
       @foreach ($candidates as $candidate)
       <a href="{{route('candidate.show',$candidate)}}">
         <div>
            <h1>Name:{{$candidate->name}}</h1>
        <p>Age:{{$candidate->age}}</p>
       
         </div>
       </a>
        
  <hr>
    @endforeach
   </div>

   <div>
    @if ($candidates->isEmpty())
    <div style="text-align: center; color: gray; padding: 20px;">
                No candidates found for "{{ $search }}"
            </div>
        
    @endif
   </div>
</div> --}}

<div>
    <div class="relative max-w-xl mx-auto mb-12">
        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input 
            type="text" 
            wire:model.live='search' 
            placeholder="Search candidates by name..." 
            class="block w-full p-4 pl-12 text-sm text-slate-900 border border-slate-200 rounded-2xl bg-white shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all outline-none"
        >
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach ($candidates as $candidate)
            <a href="{{ route('candidate.show', $candidate) }}" class="group">
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <div class="relative h-64 bg-slate-200">
                        <img 
                            src="{{ $candidate->imagepath ? asset($candidate->imagepath) : asset('images/default-candidate.jpg') }}" 
                            alt="{{ $candidate->name }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>

                    <div class="p-6 text-center">
                        <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight group-hover:text-blue-600 transition-colors">
                            {{ $candidate->name }}
                        </h3>
                        <p class="text-slate-400 text-sm font-bold mt-1">
                            Age: {{ $candidate->age }} | {{ $candidate->nation }}
                        </p>
                        
                        <div class="mt-4 inline-flex items-center text-blue-600 text-xs font-black uppercase tracking-widest">
                            View Profile
                            <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-12">
        {{ $candidates->links() }}
    </div>

    @if ($candidates->isEmpty())
        <div class="py-20 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-slate-100 mb-4 text-slate-400">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-slate-800">No results found</h3>
            <p class="text-slate-500">We couldn't find any candidates matching "{{ $search }}"</p>
        </div>
    @endif
</div>