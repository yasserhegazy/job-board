<x-layout title="Register">
    <div class="flex min-h-[60vh] items-center justify-center">
        <div class="w-full max-w-md">
            <div class="mb-8 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-indigo-100">
                    <svg class="h-7 w-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">Create Account</h1>
                <p class="mt-2 text-slate-500">Join Job Board to find or post jobs</p>
            </div>
            <x-card class="!p-8">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <x-label for="name" :required="true">Full Name</x-label>
                        <x-text-input name="name" placeholder="John Doe" />
                    </div>
                    <div class="mb-5">
                        <x-label for="email" :required="true">E-mail</x-label>
                        <x-text-input name="email" type="email" placeholder="you@example.com" />
                    </div>
                    <div class="mb-5">
                        <x-label for="password" :required="true">Password</x-label>
                        <x-text-input name="password" type="password" placeholder="••••••••" />
                    </div>
                    <div class="mb-6">
                        <x-label for="password_confirmation" :required="true">Confirm Password</x-label>
                        <x-text-input name="password_confirmation" type="password" placeholder="••••••••" />
                    </div>
                    <x-button class="w-full !bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700 !py-3">
                        Create Account
                    </x-button>
                </form>
            </x-card>
            <p class="mt-6 text-center text-sm text-slate-500">
                Already have an account?
                <a href="{{ route('auth.create') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in</a>
            </p>
        </div>
    </div>
</x-layout>
