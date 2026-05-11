@extends('layouts.app')

@section('title', 'Sign In - The Voice Myanmar')

@section('content')
<div class="min-h-[calc(100vh-80px)] flex items-center justify-center bg-slate-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-blue-600 shadow-lg shadow-blue-200 mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Sign In</h2>
            <p class="mt-2 text-sm text-slate-500 font-medium">သင်၏ အကောင့်သို့ ဝင်ရောက်ပြီး မဲပေးလိုက်ပါ။</p>
        </div>

        <div class="bg-white p-8 sm:p-10 rounded-[2rem] shadow-xl shadow-slate-200/60 border border-slate-100">
            
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 rounded-xl border border-red-100">
                    <ul class="list-disc list-inside text-xs text-red-600 font-bold">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="space-y-2">
                    <label for="email" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path></svg>
                        </div>
                        <input id="email" name="email" type="email" required 
                            class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-500 transition-all outline-none" 
                            placeholder="example@mail.com">
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between ml-1">
                        <label for="password" class="text-xs font-black text-slate-400 uppercase tracking-widest">Password</label>
                        {{-- <a href="#" class="text-[11px] font-bold text-blue-600 hover:underline">Forgot password?</a> --}}
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input id="password" name="password" type="password" required 
                            class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-500 transition-all outline-none" 
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300 rounded transition-all cursor-pointer">
                    <label for="remember" class="ml-2 block text-sm text-slate-600 font-medium cursor-pointer">Remember me</label>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-black rounded-xl text-white bg-slate-900 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-lg transition-all active:scale-[0.98]">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-slate-400 group-hover:text-blue-200 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </span>
                        SIGN IN
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center border-t border-slate-50 pt-6">
                <p class="text-sm text-slate-500 font-medium">
                    အကောင့်မရှိသေးဘူးလား? 
                    <a href="{{ route('register') }}" class="font-black text-blue-600 hover:text-blue-700 hover:underline decoration-2 underline-offset-4 ml-1 transition-all">
                        Register Now
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection