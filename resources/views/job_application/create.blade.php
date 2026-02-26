<x-layout title="Apply for {{ $job->title }}">
    <x-breadcrumbs class="mb-6" :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']" />

    <div class="mx-auto max-w-3xl">
        <x-job-card :$job />
        <x-card class="mt-4">
            <h2 class="mb-1 text-lg font-semibold text-slate-800">Submit Your Application</h2>
            <p class="mb-6 text-sm text-slate-500">Fill in the details below to apply for this position</p>
            <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <x-label for="expected_salary" :required="true">Expected Salary ($)</x-label>
                    <x-text-input type="number" name="expected_salary" placeholder="e.g. 75000"/>
                </div>
                <div class="mb-6">
                    <x-label for="cv" :required="true">Upload Your CV</x-label>
                    <x-text-input type="file" name="cv" />
                    <p class="mt-1 text-xs text-slate-400">PDF, DOC, or DOCX (max 5MB)</p>
                </div>
                <x-button class="w-full !bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700 !py-3">Submit Application</x-button>
            </form>
        </x-card>
    </div>
</x-layout>
