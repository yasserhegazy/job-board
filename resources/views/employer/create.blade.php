<x-layout title="Register as Employer">
    <div class="flex min-h-[60vh] items-center justify-center">
        <div class="w-full max-w-md">
            <div class="mb-8 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-indigo-100">
                    <svg class="h-7 w-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">Become an Employer</h1>
                <p class="mt-2 text-slate-500">Register your company to start posting jobs</p>
            </div>
            <x-card class="!p-8">
                <form action="{{ route('employer.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <x-label for="company_name" :required="true">Company Name</x-label>
                        <x-text-input name="company_name" placeholder="Acme Inc." />
                    </div>
                    <x-button class="w-full !bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700 !py-3">Register Company</x-button>
                </form>
            </x-card>
        </div>
    </div>
</x-layout>
