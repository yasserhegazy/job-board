<x-layout title="Register">
    <div class="mx-auto max-w-md">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-slate-800">Create Account</h1>
            <p class="mt-2 text-slate-500">Join Job Board to find or post jobs</p>
        </div>
        <x-card class="p-8">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <x-label for="name" :required="true">Full Name</x-label>
                    <x-text-input name="name" placeholder="John Doe" />
                </div>
                <div class="mb-6">
                    <x-label for="email" :required="true">E-mail</x-label>
                    <x-text-input name="email" type="email" placeholder="you@example.com" />
                </div>
                <div class="mb-6">
                    <x-label for="password" :required="true">Password</x-label>
                    <x-text-input name="password" type="password" placeholder="••••••••" />
                </div>
                <div class="mb-6">
                    <x-label for="password_confirmation" :required="true">Confirm Password</x-label>
                    <x-text-input name="password_confirmation" type="password" placeholder="••••••••" />
                </div>
                <x-button class="w-full !bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700">
                    Create Account
                </x-button>
            </form>
        </x-card>
        <p class="mt-6 text-center text-sm text-slate-500">
            Already have an account?
            <a href="{{ route('auth.create') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in</a>
        </p>
    </div>
</x-layout>
