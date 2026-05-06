<?php

use Livewire\Component;
use App\Models\Candidate;
new class extends Component
{
    public $search='';

    public function with(): array{
      return [
            'candidates'=>Candidate::where('name','like','%'.$this->search.'%')->get(),
      ]  ;
    }
};
?>

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
</div>