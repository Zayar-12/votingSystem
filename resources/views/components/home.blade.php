@extends('layouts.app')

@section('title', 'Candidates - The Voice Myanmar')

@section('content')
<div class="min-h-screen bg-slate-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-black text-slate-900 uppercase tracking-tight">Meet the Talent</h1>
            <p class="mt-2 text-slate-500 font-medium">သင်နှစ်သက်တဲ့ ပြိုင်ပွဲဝင်ကို ရှာဖွေပြီး မဲပေးလိုက်ပါ။</p>
        </div>
{{-- 
        @if (session('success'))
            <div id="success-message" class="mb-8 flex items-center p-4 text-green-800 border-t-4 border-green-500 bg-green-50 rounded-lg shadow-sm" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <div class="ml-3 text-sm font-bold uppercase tracking-wide">
                    {{ session('success') }}
                </div>
            </div>
        @endif --}}
       

        <livewire:candidate-search/>
        
    </div>
</div>
@endsection