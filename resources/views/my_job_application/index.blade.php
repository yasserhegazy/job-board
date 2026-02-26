<x-layout title="My Applications">
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">My Applications</h1>
        <p class="mt-1 text-slate-500">Track the status of your job applications</p>
    </div>

    @forelse($applications as $application)
        <x-job-card :job="$application->job">
            <div class="mt-2 border-t border-slate-100 pt-4">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="grid grid-cols-2 gap-x-8 gap-y-2 text-sm">
                        <div>
                            <span class="text-slate-500">Applied:</span>
                            <span class="ml-1 font-medium text-slate-700">{{ $application->created_at->diffForHumans() }}</span>
                        </div>
                        <div>
                            <span class="text-slate-500">Your salary:</span>
                            <span class="ml-1 font-semibold text-green-600">${{ number_format($application->expected_salary) }}</span>
                        </div>
                        <div>
                            <span class="text-slate-500">Other applicants:</span>
                            <span class="ml-1 font-medium text-slate-700">{{ $application->job->job_applications_count - 1 }}</span>
                        </div>
                        <div>
                            <span class="text-slate-500">Avg. salary:</span>
                            <span class="ml-1 font-medium text-slate-700">${{ number_format($application->job->job_applications_avg_expected_salary) }}</span>
                        </div>
                    </div>
                    <form action="{{ route('my-job-applications.destroy', $application) }}" method="post" onsubmit="return confirm('Are you sure you want to cancel this application?')">
                        @csrf
                        @method('DELETE')
                        <x-button class="!bg-red-50 !text-red-700 !border-red-200 hover:!bg-red-100 shrink-0">Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-xl border border-dashed border-slate-300 bg-white p-12 text-center">
            <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
            <div class="mt-4 text-lg font-medium text-slate-600">No Applications Yet</div>
            <div class="mt-1 text-sm text-slate-500">
                Start by <a href="{{ route('jobs.index') }}" class="text-indigo-600 hover:underline">browsing available jobs</a>
            </div>
        </div>
    @endforelse

    <div class="mt-6">
        {{ $applications->links() }}
    </div>
</x-layout>
