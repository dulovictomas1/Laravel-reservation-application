<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::updateOrcreate(
            ['slug' => 'masaze'],
            [
                'name' => 'Masážne služby',
            ]
        );

        Tag::updateOrcreate(
            ['slug' => 'barber'],
            [
                'name' => 'Kaderníctvo a holičtvo',
            ]
        );
    }
}
