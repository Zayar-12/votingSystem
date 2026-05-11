@extends('layouts.app')

@section('title', 'Voting Status')

@section('content')
<div class="min-h-[80vh] flex flex-col items-center justify-center px-6">
    
    <livewire:winner /> <div class="w-full max-w-md text-center">
        <div class="my-8 border-t border-[#e3e3e0] dark:border-[#3E3E3A] w-16 mx-auto"></div>

        <div class="flex flex-col gap-3">
            <a href="/" class="inline-flex items-center justify-center px-6 py-2.5 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] text-sm font-medium rounded-lg hover:opacity-90 transition-all shadow-sm">
                ပင်မစာမျက်နှာသို့ ပြန်သွားမည်
            </a>
        </div>
    </div>
</div>
@endsection