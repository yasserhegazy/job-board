<x-layout title="My Jobs">
    <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-jobs.create') }}">Add New</x-link-button>
    </div>

    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="text-xs text-slate-500">
                <div class="mb-2 text-sm font-medium text-slate-600">
                    Applications ({{ $job->jobApplications->count() }})
                </div>
                @forelse ($job->jobApplications as $application)
                    <div class="flex items-center justify-between rounded-md p-3 odd:bg-slate-50">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>
                                Applied {{ $application->created_at->diffForHumans() }}
                            </div>
                            <div>
                                <a href="{{ route('job-applications.download-cv', $application) }}"
                                    class="text-indigo-500 hover:underline">
                                    Download CV
                                </a>
                            </div>
                        </div>

                        <div>${{ number_format($application->expected_salary) }}</div>
                    </div>

                @empty
                    <div>No applications yet</div>
                @endforelse

                <div class="flex space-x-2">
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
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No jobs yet
            </div>
            <div class="text-center">
                Post your first job <a class="text-indigo-500 hover:underline"
                    href="{{ route('my-jobs.create') }}">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>
