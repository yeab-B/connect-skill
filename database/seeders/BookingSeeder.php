<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Skill;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Fetch all learners and teachers
        $learners = User::role('learner')->get();
        $teachers = User::role('teacher')->get();
        $skills = Skill::all();

        if ($learners->isEmpty() || $teachers->isEmpty() || $skills->isEmpty()) {
            $this->command->warn("Cannot seed bookings: missing learners, teachers, or skills.");
            return;
        }

        // Create 10 bookings
        for ($i = 0; $i < 10; $i++) {
            $learner = $learners->random();
            $teacher = $teachers->random();
            $skill = $skills->random();

            Booking::create([
                'learner_id'   => $learner->id,
                'teacher_id'   => $teacher->id,
                'skill_id'     => $skill->id,
                'scheduled_at' => Carbon::now()->addDays(rand(1, 14))->setTime(rand(9, 17), 0),
                'status'       => ['pending', 'approved', 'cancelled'][rand(0, 2)],
            ]);
        }

        $this->command->info('Bookings seeded successfully.');
    }
}
