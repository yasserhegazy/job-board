<x-layout title="Sign In">
    <div class="mx-auto max-w-md">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-slate-800">Welcome Back</h1>
            <p class="mt-2 text-slate-500">Sign in to your account to continue</p>
        </div>
        <x-card class="p-8">
            <form action="{{ route('auth.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <x-label for="email" :required="true">E-mail</x-label>
                    <x-text-input name="email" type="email" placeholder="you@example.com" />
                </div>
                <div class="mb-6">
                    <x-label for="password" :required="true">Password</x-label>
                    <x-text-input name="password" type="password" placeholder="••••••••" />
                </div>

                <div class="mb-6 flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="remember" class="ml-2 text-sm text-slate-600">Remember me</label>
                </div>
                <x-button class="w-full !bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700">
                    Sign In
                </x-button>
            </form>
        </x-card>
        <p class="mt-6 text-center text-sm text-slate-500">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Create one</a>
        </p>
    </div>
</x-layout>
