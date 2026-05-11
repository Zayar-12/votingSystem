@extends('layouts.app')

@section('title', 'Welcome to The Voice Myanmar Voting')

@section('content')
<div class="relative min-h-screen flex items-center justify-center overflow-hidden bg-slate-950">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] rounded-full bg-blue-600/20 blur-[120px] animate-pulse"></div>
        <div class="absolute -bottom-[10%] -right-[10%] w-[40%] h-[40%] rounded-full bg-amber-500/10 blur-[120px]"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6 text-center">
        <div class="space-y-8 max-w-4xl mx-auto">
            
            <div class="inline-block px-4 py-1.5 mb-4 rounded-full border border-blue-500/30 bg-blue-500/10 backdrop-blur-md">
                <span class="text-blue-400 text-xs font-bold uppercase tracking-[0.2em]">The Voice Myanmar 2026</span>
            </div>

            <h1 class="text-5xl md:text-8xl font-black text-white leading-tight">
                YOUR VOICE <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-yellow-200 to-amber-500">
                    DECIDES THE WINNER
                </span>
            </h1>

            <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto font-medium leading-relaxed">
                ထိပ်တန်းပြိုင်ပွဲဝင်တွေထဲက မင်းအကြိုက်ဆုံး အနုပညာရှင်ကို အခုပဲ မဲပေးပြီး အောင်မြင်မှုရဲ့ အစိတ်အပိုင်းတစ်ခု ဖြစ်လိုက်ပါ။
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-8">
                <a href="{{ route('home') }}" class="group relative px-8 py-4 w-full sm:w-auto bg-blue-600 text-white font-black rounded-2xl overflow-hidden shadow-[0_0_20px_rgba(37,99,235,0.4)] transition-all hover:scale-105 active:scale-95">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-700 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <span class="relative flex items-center justify-center gap-2">
                        GET STARTED NOW
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </span>
                </a>

               
            </div>

            <div class="grid grid-cols-3 gap-4 pt-16 border-t border-white/5">
                <div>
                    <p class="text-2xl font-black text-white">Live</p>
                    <p class="text-xs text-gray-500 uppercase tracking-widest font-bold">Voting Status</p>
                </div>
                <div class="border-x border-white/10">
                    <p class="text-2xl font-black text-white">24/7</p>
                    <p class="text-xs text-gray-500 uppercase tracking-widest font-bold">Support</p>
                </div>
                <div>
                    <p class="text-2xl font-black text-white">Secure</p>
                    <p class="text-xs text-gray-500 uppercase tracking-widest font-bold">Encryption</p>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-slate-950 to-transparent"></div>
</div>

<style>
    @keyframes pulse {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 0.8; }
    }
    body {
        background-color: #020617; /* Matches slate-950 */
    }
</style>
@endsection