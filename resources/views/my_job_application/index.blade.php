<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />

        @forelse($applications as $application)
            <x-job-card :job="$application->job">
                <div class="flex items-center justify-between text-sm text-slate-500">
                    <div>
                        <div>
                            Applied {{ $application->created_at->diffForHumans() }}
                        </div>
                        <div>
                            Your asking salary: ${{ number_format($application->expected_salary) }}
                        </div>
                        <div>
                            Other: {{ Str::plural('applicant', $application->job->job_applications_count - 1) }}
                            {{ $application->job->job_applications_count - 1 }}
                        </div>
                        <div>
                            Average asking salary: ${{ number_format($application->job->job_applications_avg_expected_salary) }}
                        </div>
                    </div>
                    {{-- <div>{{ $application->expected_salary }}</div> --}}
                    <div>
                        <form action="{{ route('my-job-applications.destroy', $application) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <x-button>Cancel</x-button>
                        </form>
                    </div>
                </div>
            </x-job-card>

        @empty
            <div class="rounded-md border border-dashed border-slate-300 p-8">
                <div class="text-center font-medium">
                    No Job Applications Yet
                </div>
                <div class="text-center">
                    Go find some jobs <a href="{{ route('jobs.index') }}" class="text-indigo-500 hover:underline">here</a>.
                </div>
            </div>
        @endforelse
</x-layout>
