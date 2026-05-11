<?php

use Livewire\Component;
use App\Models\Candidate;

new class extends Component
{
    public function with(): array
    {
        return [
           
            'winner' => Candidate::withCount('users')->where('winner', true)->first()
        ];
    }
};
?>

<div wire:poll.5s> <div class="w-full max-w-md text-center">
        @if($winner)
            <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 dark:bg-amber-900/20 rounded-full mb-6 animate-bounce">
                <span class="text-3xl">🏆</span>
            </div>

            <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] tracking-tight">
                Winner Declared!
            </h1>

            <div class="mt-8 p-6 bg-white dark:bg-[#161615] border-2 border-amber-400 rounded-2xl shadow-xl transform scale-105 transition-all">
                <p class="text-xs font-bold text-amber-600 uppercase tracking-widest mb-2 italic">Official Result</p>
                <h2 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-1">{{ $winner->name }}</h2>
                <div class="mt-3 py-2 px-4 bg-amber-50 dark:bg-amber-900/10 rounded-lg inline-block text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    စုစုပေါင်းမဲအရေအတွက်: <span class="font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ $winner->users_count }}</span> မဲ
                </div>
            </div>
        @else
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 dark:bg-[#1a1a1a] rounded-full mb-6">
                <svg class="w-10 h-10 text-gray-400 dark:text-[#706f6c]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] tracking-tight">
                Voting has Closed
            </h1>
            
            <p class="mt-4 text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">
                ဤမဲပေးပွဲအတွက် သတ်မှတ်ထားသော အချိန်ကုန်ဆုံးသွားပြီ ဖြစ်ပါသည်။ <br>
                ရလဒ်များကို မကြာမီ ကြေညာပေးပါမည်။
            </p>
        @endif
    </div>
</div>