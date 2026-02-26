<x-layout title="{{ $job->title }}">
    <x-breadcrumbs class="mb-6" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />

    <div class="flex flex-col gap-8 lg:flex-row">
        {{-- Main Content --}}
        <div class="min-w-0 flex-1">
            <x-job-card :$job>
                <div class="mt-2 border-t border-slate-100 pt-4">
                    <h3 class="mb-2 text-sm font-semibold uppercase tracking-wider text-slate-500">Job Description</h3>
                    <div class="prose prose-sm prose-slate max-w-none text-slate-600 leading-relaxed">
                        {!! nl2br(e($job->description)) !!}
                    </div>
                </div>
                <div class="mt-6">
                    @can('apply', $job)
                        <x-link-button :href="route('job.application.create', $job)" class="!bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700 !px-8 !py-3">
                            Apply Now
                        </x-link-button>
                    @else
                        <div class="rounded-lg bg-slate-50 px-4 py-3 text-center text-sm font-medium text-slate-500">
                            You have already applied to this job
                        </div>
                    @endcan
                </div>
            </x-job-card>
        </div>

        {{-- Sidebar --}}
        <aside class="w-full shrink-0 lg:w-80">
            <x-card class="sticky top-20">
                <h2 class="mb-4 text-base font-semibold text-slate-800">
                    More from {{ $job->employer->company_name }}
                </h2>
                <div class="space-y-3">
                    @forelse ($job->employer->jobs->except($job->id) as $other_job)
                        <a href="{{ route('jobs.show', $other_job) }}" class="block rounded-lg border border-slate-100 p-3 transition hover:border-indigo-200 hover:bg-indigo-50/50">
                            <div class="font-medium text-slate-700">{{ $other_job->title }}</div>
                            <div class="mt-1 flex items-center justify-between text-xs text-slate-500">
                                <span>{{ $other_job->created_at->diffForHumans() }}</span>
                                <span class="font-semibold text-green-600">${{ number_format($other_job->salary) }}</span>
                            </div>
                        </a>
                    @empty
                        <p class="text-sm text-slate-400">No other openings from this company</p>
                    @endforelse
                </div>
            </x-card>
        </aside>
    </div>
</x-layout>
