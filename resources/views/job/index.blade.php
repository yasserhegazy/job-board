<x-layout title="Browse Jobs">
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />
    <x-card class="mb-4 text-sm" x-data="">
        <h2 class="mb-4 text-lg font-semibold text-slate-700">Filter Jobs</h2>
        <form x-ref="filter" id="filtering-form" action="{{ route('jobs.index') }}" method="GET">

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">
                        Search
                    </div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" form-ref="filter" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Salary
                    </div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" form-ref="filter" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" form-ref="filter" />
                    </div>

                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Experience
                    </div>
                    <x-radio-group name="experience"
                   :options="array_combine(
                array_map('ucfirst', \App\Models\Job::$experience),
                \App\Models\Job::$experience,
            )" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Category
                    </div>
                    <x-radio-group name="category" :options="\App\Models\Job::$categories" />
                </div>

            </div>
            <div class="flex items-center gap-4">
                <x-button class="flex-1 !bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700">Filter</x-button>
                <a href="{{ route('jobs.index') }}" class="text-sm text-slate-500 hover:text-indigo-600 transition-colors">Reset Filters</a>
            </div>
        </form>
    </x-card>
    @forelse ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8 text-center">
            <div class="mb-2 text-lg font-medium text-slate-600">No jobs found</div>
            <div class="text-sm text-slate-500">Try adjusting your search filters</div>
        </div>
    @endforelse
    {{ $jobs->withQueryString()->links() }}
</x-layout>
