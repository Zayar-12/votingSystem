@extends('layouts.app')

@section('title', 'My Profile - The Voice Myanmar')

@section('content')
<div class="min-h-screen bg-slate-50 py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8 text-center md:text-left">
            <h1 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Account Settings</h1>
            <p class="text-slate-500 font-medium text-sm mt-1">သင်၏ ကိုယ်ရေးအချက်အလက်နှင့် Profile ကို ဤနေရာတွင် စီမံနိုင်ပါသည်။</p>
        </div>

        <div class="grid grid-cols-1 gap-8">
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="p-8 md:p-10 flex flex-col md:flex-row items-center gap-8">
                    
                    <div class="relative group">
                        <div class="w-32 h-32 rounded-[2.5rem] overflow-hidden ring-4 ring-blue-50 bg-slate-100 shadow-inner">
                            @if(Auth::user()->imgpath)
                                <img src="{{ asset(Auth::user()->imgpath) }}" alt="Profile" class="w-full h-full object-cover">
                            @else
                                <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile" class="w-full h-full object-cover opacity-60">
                            @endif
                        </div>
                        <div class="absolute inset-0 bg-black/40 rounded-[2.5rem] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                    </div>

                    <div class="flex-1 text-center md:text-left space-y-4">
                        <div>
                            <h3 class="text-lg font-black text-slate-800 uppercase tracking-tight">Profile Picture</h3>
                            <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-1">PNG, JPG up to 2MB</p>
                        </div>
                        
                        <form action="{{route('ProfilePhoto')}}" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row gap-3">
                            @csrf
                            <input type="file" name="profile" id="profile-input" class="hidden" onchange="this.form.submit()">
                            
                            <label for="profile-input" class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold text-xs uppercase tracking-widest shadow-lg shadow-blue-200 transition-all active:scale-95 text-center">
                                Change Photo
                            </label>
                            
                            @if(Auth::user()->imgpath)
                                <button type="button" class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-400 font-bold text-xs uppercase tracking-widest hover:bg-slate-50 transition-all">
                                    Remove
                                </button>
                            @endif
                        </form>
                    </div>
                </div>

                <div class="border-t border-slate-50 p-8 md:p-10 bg-slate-50/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Full Name</p>
                            <p class="text-lg font-bold text-slate-800">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Email Address</p>
                            <p class="text-lg font-bold text-slate-800">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Account Type</p>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-700 uppercase tracking-wide">
                                Verified Voter
                            </span>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Member Since</p>
                            <p class="text-lg font-bold text-slate-800">{{ Auth::user()->created_at->format('M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between px-4">
                <a href="{{ route('home') }}" class="text-sm font-bold text-slate-400 hover:text-blue-600 transition-colors">
                    ← Back to Voting List
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-red-400 hover:text-red-600 transition-colors">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection