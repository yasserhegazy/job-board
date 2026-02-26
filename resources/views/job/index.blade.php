<x-layout title="Browse Jobs">
    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">Find Your Next Job</h1>
        <p class="mt-2 text-lg text-slate-500">Browse through the latest job openings</p>
    </div>

    <div class="flex flex-col gap-8 lg:flex-row">
        {{-- Sidebar Filters --}}
        <aside class="w-full shrink-0 lg:w-72">
            <x-card class="sticky top-20 text-sm" x-data="">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-base font-semibold text-slate-800">Filters</h2>
                    <a href="{{ route('jobs.index') }}" class="text-xs text-indigo-600 hover:text-indigo-700 transition-colors">Reset All</a>
                </div>
                <form x-ref="filter" id="filtering-form" action="{{ route('jobs.index') }}" method="GET">
                    <div class="space-y-5">
                        <div>
                            <div class="mb-1.5 text-xs font-semibold uppercase tracking-wider text-slate-500">Search</div>
                            <x-text-input name="search" value="{{ request('search') }}" placeholder="Job title, keyword..." form-ref="filter" />
                        </div>
                        <div>
                            <div class="mb-1.5 text-xs font-semibold uppercase tracking-wider text-slate-500">Salary Range</div>
                            <div class="flex gap-2">
                                <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="Min" form-ref="filter" />
                                <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="Max" form-ref="filter" />
                            </div>
                        </div>
                        <div>
                            <div class="mb-1.5 text-xs font-semibold uppercase tracking-wider text-slate-500">Experience</div>
                            <x-radio-group name="experience"
                           :options="array_combine(
                        array_map('ucfirst', \App\Models\Job::$experience),
                        \App\Models\Job::$experience,
                    )" />
                        </div>
                        <div>
                            <div class="mb-1.5 text-xs font-semibold uppercase tracking-wider text-slate-500">Category</div>
                            <x-radio-group name="category" :options="\App\Models\Job::$categories" />
                        </div>
                    </div>
                    <x-button class="mt-5 w-full !bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700">Apply Filters</x-button>
                </form>
            </x-card>
        </aside>

        {{-- Job Listings --}}
        <div class="min-w-0 flex-1">
            @forelse ($jobs as $job)
                <x-job-card class="mb-4" :$job>
                    <div>
                        <x-link-button :href="route('jobs.show', $job)">
                            Show
                        </x-link-button>
                    </div>
                </x-job-card>
            @empty
                <div class="rounded-xl border border-dashed border-slate-300 bg-white p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <div class="mt-4 text-lg font-medium text-slate-600">No jobs found</div>
                    <div class="mt-1 text-sm text-slate-500">Try adjusting your search filters or <a href="{{ route('jobs.index') }}" class="text-indigo-600 hover:underline">browse all jobs</a></div>
                </div>
            @endforelse
            <div class="mt-6">
                {{ $jobs->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-layout>
