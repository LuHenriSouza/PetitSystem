<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        \App\Models\Product::factory(50)->create();


        // \App\Models\OutflowType::create([
        //     'outflow_type' => 'Transporte'
        // ]);

        // \App\Models\OutflowType::create([
        //     'outflow_type' => 'Ao mosso'
        // ]);

        // \App\Models\Fincash::create([
        //     'fincash_name' => 'luiz Henrique',
        // 'fincash_value' => 450,
        // 'fincash_isFinished' => true,
        // 'fincash_finalValue' => 400,
        // 'fincash_finalDate' => now()
        // ]);

        // \App\Models\CashOutflow::create([
        //     'outflow_type_id' => 1,
        //     'fincash_id' => 2,
        //     'outflow_value' => 150
        // ]);
    }
}
