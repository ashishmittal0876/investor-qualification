<?php

namespace Database\Factories;

use App\Enums\SubmissionStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement([
                SubmissionStatus::Submitted->value,
                SubmissionStatus::InReview->value,
                SubmissionStatus::Accepted->value,
                SubmissionStatus::Rejected->value
            ]),
        ];
    }
}
