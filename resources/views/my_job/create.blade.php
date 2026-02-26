<x-layout title="Post New Job">
  <div class="mx-auto max-w-3xl">
    <div class="mb-8">
      <h1 class="text-3xl font-bold tracking-tight text-slate-900">Post a New Job</h1>
      <p class="mt-1 text-slate-500">Fill in the details to create a new job listing</p>
    </div>

    <x-card>
      <form action="{{ route('my-jobs.store') }}" method="POST">
        @csrf

        <div class="space-y-6">
          <div class="grid gap-6 sm:grid-cols-2">
            <div>
              <x-label for="title" :required="true">Job Title</x-label>
              <x-text-input name="title" placeholder="e.g. Senior Laravel Developer" />
            </div>
            <div>
              <x-label for="location" :required="true">Location</x-label>
              <x-text-input name="location" placeholder="e.g. New York, Remote" />
            </div>
          </div>

          <div>
            <x-label for="salary" :required="true">Annual Salary ($)</x-label>
            <x-text-input name="salary" type="number" placeholder="e.g. 85000" />
          </div>

          <div>
            <x-label for="description" :required="true">Job Description</x-label>
            <x-text-input name="description" type="textarea" placeholder="Describe the role, responsibilities, and requirements..." />
          </div>

          <div class="grid gap-6 sm:grid-cols-2">
            <div>
              <x-label for="experience" :required="true">Experience Level</x-label>
              <x-radio-group name="experience" :value="old('experience')"
                :all-option="false"
                :options="array_combine(
                    array_map('ucfirst', \App\Models\Job::$experience),
                    \App\Models\Job::$experience,
                )" />
            </div>
            <div>
              <x-label for="category" :required="true">Category</x-label>
              <x-radio-group name="category" :all-option="false" :value="old('category')"
                :options="\App\Models\Job::$categories" />
            </div>
          </div>

          <x-button class="w-full !bg-indigo-600 !text-white !border-indigo-600 hover:!bg-indigo-700 !py-3">Publish Job</x-button>
        </div>
      </form>
    </x-card>
  </div>
</x-layout>
