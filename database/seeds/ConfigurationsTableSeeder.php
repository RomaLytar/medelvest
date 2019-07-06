<?php

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Стандарт', 'Люкс', 'Премиум'];
        foreach ($titles as $title) {
            $title = [
                'title' => $title,
            ];
            \App\Model\Configuration::create($title);
        }
    }
}
