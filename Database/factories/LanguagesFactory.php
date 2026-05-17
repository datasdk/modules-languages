<?php

namespace Modules\Languages\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Languages\Models\Languages;

class LanguagesFactory extends Factory
{
    protected $model = Languages::class;

    public function definition()
    {
        return [
            'locale' => $this->faker->randomElement(['en', 'da', 'de', 'fr', 'it', 'sv', 'no', 'pl']),
        ];
    }
}
