<x-layout title="{{ $job->title }}">

    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />

    <x-job-card :$job>
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>
        @can('apply', $job)
            <x-link-button :href="route('job.application.create', $job)">
                Apply
            </x-link-button>
        @else
            <div class="text-center text-sm font-medium text-slate-500">
                You already applied to this job
            </div>
        @endcan
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More from {{ $job->employer->company_name }}
        </h2>
        <div class="text-sm text-slate-500">
            @forelse ($job->employer->jobs->except($job->id) as $other_job)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('jobs.show', $other_job) }}">{{ $other_job->title }}</a>
                        </div>
                        <div class="text-xs">
                            {{ $other_job->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        ${{ number_format($other_job->salary) }}
                    </div>
                </div>
            @empty
                <p class="text-sm text-slate-400">No other jobs from this company</p>
            @endforelse
        </div>
    </x-card>

</x-layout>
