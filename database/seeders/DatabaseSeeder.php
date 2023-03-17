<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\StatusChangeDomainNs;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $statusChangeNs = ['Обрабатывается', 'Активен', 'Ошибка', 'Отменен'];

        collect($statusChangeNs)->each(function($status) {
            StatusChangeDomainNs::factory()->create(
                [
                    'title' => $status
                ]
            );
        });

    }
}
