<x-layout title="Register as Employer">
    <div class="mx-auto max-w-md">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-slate-800">Become an Employer</h1>
            <p class="mt-2 text-slate-500">Register your company to start posting jobs</p>
        </div>
        <x-card class="p-8">
            <form action="{{ route('employer.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <x-label for="company_name" :required="true">Company Name</x-label>
                    <x-text-input name="company_name" placeholder="Acme Inc." />
                </div>

                <x-button class="w-full !bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700">Register Company</x-button>
            </form>
        </x-card>
    </div>
</x-layout>
