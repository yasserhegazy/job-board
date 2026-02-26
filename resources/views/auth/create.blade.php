<x-layout title="Sign In">
    <div class="flex min-h-[60vh] items-center justify-center">
        <div class="w-full max-w-md">
            <div class="mb-8 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-indigo-100">
                    <svg class="h-7 w-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">Welcome Back</h1>
                <p class="mt-2 text-slate-500">Sign in to your account to continue</p>
            </div>
            <x-card class="!p-8">
                <form action="{{ route('auth.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <x-label for="email" :required="true">E-mail</x-label>
                        <x-text-input name="email" type="email" placeholder="you@example.com" />
                    </div>
                    <div class="mb-5">
                        <x-label for="password" :required="true">Password</x-label>
                        <x-text-input name="password" type="password" placeholder="••••••••" />
                    </div>
                    <div class="mb-6 flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="remember" class="ml-2 text-sm text-slate-600">Remember me</label>
                    </div>
                    <x-button class="w-full !bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700 !py-3">
                        Sign In
                    </x-button>
                </form>
            </x-card>
            <p class="mt-6 text-center text-sm text-slate-500">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Create one</a>
            </p>
        </div>
    </div>
</x-layout>
