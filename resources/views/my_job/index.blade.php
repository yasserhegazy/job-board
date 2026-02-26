<x-layout title="My Jobs">
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-slate-900">My Jobs</h1>
            <p class="mt-1 text-slate-500">Manage your job postings and view applications</p>
        </div>
        <x-link-button href="{{ route('my-jobs.create') }}" class="!bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700 shrink-0">
            + Post New Job
        </x-link-button>
    </div>

    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="mt-2 border-t border-slate-100 pt-4">
                <div class="mb-3 flex items-center gap-2">
                    <h3 class="text-sm font-semibold text-slate-700">Applications</h3>
                    <span class="inline-flex items-center rounded-full bg-indigo-50 px-2 py-0.5 text-xs font-medium text-indigo-700">{{ $job->jobApplications->count() }}</span>
                </div>
                @forelse ($job->jobApplications as $application)
                    <div class="flex items-center justify-between rounded-lg border border-slate-100 p-3 mb-2 transition hover:bg-slate-50">
                        <div>
                            <div class="font-medium text-slate-700">{{ $application->user->name }}</div>
                            <div class="mt-0.5 text-xs text-slate-500">Applied {{ $application->created_at->diffForHumans() }}</div>
                            <a href="{{ route('job-applications.download-cv', $application) }}"
                                class="mt-1 inline-flex items-center gap-1 text-xs text-indigo-600 hover:text-indigo-700 hover:underline">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg>
                                Download CV
                            </a>
                        </div>
                        <div class="text-sm font-semibold text-green-600">${{ number_format($application->expected_salary) }}</div>
                    </div>
                @empty
                    <div class="rounded-lg bg-slate-50 px-4 py-3 text-center text-sm text-slate-500">No applications yet</div>
                @endforelse

                <div class="mt-4 flex gap-2">
                    @if ($job->trashed())
                        <form action="{{ route('my-jobs.restore', $job) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <x-button type="submit" class="!bg-green-600 !text-white !border-green-600 hover:!bg-green-700">Restore</x-button>
                        </form>
                    @else
                        <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>
                        <form action="{{ route('my-jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?')">
                            @csrf
                            @method('DELETE')
                            <x-button type="submit" class="!bg-red-600 !text-white !border-red-600 hover:!bg-red-700">Delete</x-button>
                        </form>
                    @endif
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-xl border border-dashed border-slate-300 bg-white p-12 text-center">
            <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="mt-4 text-lg font-medium text-slate-600">No jobs posted yet</div>
            <div class="mt-1 text-sm text-slate-500">
                Get started by <a class="text-indigo-600 hover:underline" href="{{ route('my-jobs.create') }}">posting your first job</a>
            </div>
        </div>
    @endforelse
</x-layout>
