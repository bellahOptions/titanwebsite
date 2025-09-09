<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $types = ['Duplex', 'Bungalow', 'Terrace', 'Semi-detached', 'Detached'];
        $leaseTerms = ['Per Day', 'Per Month', 'Per Year'];
        $featuresList = [
            'Swimming Pool', 'BQ', 'Parking Space', 'Green Area', 'Gym', 'CCTV Security', '24/7 Power', 'Smart Home System'
        ];

        for ($i = 0; $i < 20; $i++) {
            Property::create([
                'name' => $faker->words(3, true),
                'description' => $faker->paragraph(5),
                'features' => implode(', ', $faker->randomElements($featuresList, rand(3, 6))),
                'type' => $faker->randomElement($types),
                'listing_price' => $faker->numberBetween(5000000, 200000000),
                'sale_price' => $faker->numberBetween(4000000, 180000000),
                'lease_term' => $faker->randomElement($leaseTerms),
                'address' => $faker->address,
                'image' => 'https://source.unsplash.com/600x400/?house,home&' . uniqid(),
                'featured' => $faker->boolean(30), // optional featured property
            ]);
        }
    }
}
