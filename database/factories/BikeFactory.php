<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bike;
class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Bike::class; 
    
    
    public function definition()
    {
        
       
        return [
            
            'marca' => $this->faker->company,
            'modelo' => $this->faker->word(),
            'kms' => $this->faker->numberBetween(0,100000),
            'precio' => $this->faker->randomFloat(2,1000,50000),
            'matriculada' => $this->faker->boolean,
            //
        ];
    }
}
