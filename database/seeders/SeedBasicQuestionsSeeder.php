<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedBasicQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'Are you an accredited investor?',
                'slug' => 'accredited-investor',
                'type' => 'checkbox',
                'options' => [
                    'Your annual income is greater than $200k (for the last two years).',
                    'Your household income (jointly with your spouse, if married) is greater than $300k (for the last two years).',
                    'Your net worth is greater than $1M (excluding your primary residence).',
                    'You are a holderin good standing of a Series 7, Series 65 or Series 82 license.',
                    'I am not an Accredited Investor'
                ],
            ],
            [
                'question' => 'Are you a qualified purchaser?',
                'slug' => 'qualified-purchaser',
                'type' => 'checkbox',
                'options' => [
                    'You (individually or jointly with your spouse) own at least $5M in investments.',
                    'You invest on behalf of a family investment entity with at least $5M in investments.',
                    'You invest at least $25M on a discretionary basis on behalf of yourself or other qualified purchasers.',
                    'I am not a Qualified Purchaser'
                ],
            ],
            [
                'question' => 'Are you a qualified client?',
                'slug' => 'qualified-client',
                'type' => 'checkbox',
                'options' => [
                    'You have at least $1.1M under management',
                    'You have a net worth (individually or jointly with your spouse) of more than $2.2M, excluding your primary residence',
                    'You invest on behalf of a company that meets any of the foregoing tests.',
                    'I am not a Qualified Client'
                ],
            ],
            [
                'question' => 'What is your current net worth (jointly with your spouse, if married)?',
                'slug' => 'current-net-worth',
                'type' => 'radio',
                'options' => [
                    'Greater than $100.000.000',
                    'Between $50.000.000 and $100.000.000',
                    'Between $25.000.000 and $50.000.000',
                    'Between $10.000.000 and $25.000.000',
                    'Between $5.000.000 and $10.000.000',
                    'Less than $5.000.000'
                ],
            ],
            [
                'question' => 'Have you invested in the following areas in the past?',
                'slug' => 'invested-areas',
                'type' => 'checkbox',
                'options' => [
                    'Private companies and/or startups',
                    'Hedge funds',
                    'Private equity funds',
                    'Venture capital funds',
                    'Real estate, real estate securities and/or real estate funds',
                    'Private credit/direct lending and/or private credit funds',
                    'None of the above'
                ],
            ],
            [
                'question' => 'What is your typical investment amount in a private market opportunity?',
                'slug' => 'investment-amount',
                'type' => 'radio',
                'options' => [
                    'More than $5,000,000',
                    '$3,000,000 - $5,000,000',
                    '$1,000,000 -$3,000,000',
                    '$250.000 -$1.000.000',
                    '$100.000- $250.000',
                    'Less than $50.000'
                ],
            ],
            [
                'question' => 'Please share any additional information that may help our evaluation process.',
                'slug' => 'additional-information',
                'type' => 'textarea',
                'options' => [
                    'Write your answer here'
                ],
            ],
        ];

        collect($questions)->each(function ($entry) {
            /** @var Question $question */
            $question = Question::factory()->create([
                'body' => $entry['question'],
                'slug' => $entry['slug'],
                'type' => $entry['type'],
            ]);

            collect($entry['options'])->each(function ($option) use ($question) {
                Option::factory()->create([
                    'question_id' => $question->id,
                    'body' => $option,
                ]);
                // via ORM
                //$question->options()->create(['body' => $option]);
            });
        });

    }
}
