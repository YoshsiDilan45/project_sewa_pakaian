<?php

namespace Database\Seeders;
use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PaymentMethod::create([
            'metode_pembayaran' => 'COD'
        ]);
        PaymentMethod::create([
            'metode_pembayaran' => 'TF'
        ]);
        PaymentMethod::create([
            'metode_pembayaran' => 'OUTLET'
        ]); 
    }
}
