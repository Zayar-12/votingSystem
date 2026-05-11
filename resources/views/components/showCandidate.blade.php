@extends('layouts.app')

@section('title', $candidate->name . ' - Profile')

@section('content')
<div class="min-h-screen bg-slate-50 py-12">
    <div class="max-w-5xl mx-auto px-4">
        
        <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-bold text-slate-500 hover:text-blue-600 transition-colors mb-8 group">
            <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            BACK TO CANDIDATES
        </a>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden border border-slate-100">
            <div class="flex flex-col md:flex-row">
                
                <div class="md:w-5/12 relative h-[400px] md:h-auto bg-slate-200">
                    <img 
                        src="{{ $candidate->imagepath ? asset($candidate->imagepath) : asset('images/default-profile.jpg') }}" 
                        alt="{{ $candidate->name }}"
                        class="w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-8 left-8">
                        <span class="bg-blue-600 text-white text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest mb-2 inline-block">Official Candidate</span>
                        <h1 class="text-4xl font-black text-white uppercase">{{ $candidate->name }}</h1>
                    </div>
                </div>

                <div class="md:w-7/12 p-8 md:p-12">
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 rounded-2xl border border-red-100">
                            @foreach ($errors->all() as $error)
                                <p class="text-red-600 text-sm font-bold flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    {{ $error }}
                                </p>
                            @endforeach
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Age</p>
                            <p class="text-lg font-bold text-slate-800">{{ $candidate->age }} Years</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nation</p>
                            <p class="text-lg font-bold text-slate-800">{{ $candidate->nation }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Height</p>
                            <p class="text-lg font-bold text-slate-800">{{ $candidate->height }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Hobby</p>
                            <p class="text-lg font-bold text-slate-800">{{ $candidate->hobby }}</p>
                        </div>
                    </div>

                    <div class="mb-10">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Biography</p>
                        <p class="text-slate-600 leading-relaxed italic">"{{ $candidate->bio }}"</p>
                    </div>

                    <form action="{{ route('vote') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $candidate->id }}" name="id">

                        @if ( ! Auth::user() || Auth::user()->candidates_id == null )
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-600/30 transition-all active:scale-[0.98] flex items-center justify-center gap-3 group">
                                <svg class="w-6 h-6 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m8 0h-3m4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                                VOTE FOR THIS CANDIDATE
                            </button>
                        @else
                            <button type="button" disabled class="w-full bg-slate-100 text-slate-400 font-black py-4 rounded-2xl cursor-not-allowed flex items-center justify-center gap-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                YOU HAVE ALREADY VOTED
                            </button>
                            <p class="text-center text-[11px] text-slate-400 mt-3 font-medium italic">You can only vote for one candidate per season.</p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection