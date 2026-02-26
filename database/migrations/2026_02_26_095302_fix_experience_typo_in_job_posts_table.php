<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('job_posts')->where('experience', 'intermidiate')->update(['experience' => 'intermediate']);
    }

    public function down(): void
    {
        DB::table('job_posts')->where('experience', 'intermediate')->update(['experience' => 'intermidiate']);
    }
};
