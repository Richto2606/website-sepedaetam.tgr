<?php

namespace Database\Seeders;

use App\Models\Bike;
use App\Models\Booking;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'name' => 'Admin Sepeda',
            'username' => 'sepedaetam.tgr',
            'email' => 'admin@sepedaetam.tgr',
            'password' => 'sepedaetam26',
        ]);

        $mountain = Bike::create(['name' => 'Mountain XC', 'category' => 'Gunung', 'description' => '29″ suspensi, 21 speed', 'status' => 'Tersedia', 'price_1h' => 10000, 'price_2h' => 25000, 'price_1day' => 55000, 'photo_path' => null]);
        $city = Bike::create(['name' => 'City Cruiser', 'category' => 'Perkotaan', 'description' => 'step-through, 7 speed', 'status' => 'Disewa', 'price_1h' => 10000, 'price_2h' => 18000, 'price_1day' => 55000, 'photo_path' => null]);
        Bike::create(['name' => 'E-Bike Urban', 'category' => 'Elektrik', 'description' => 'elektrik, 50km range', 'status' => 'Tersedia', 'price_1h' => 10000, 'price_2h' => 18000, 'price_1day' => 55000, 'photo_path' => null]);
        Bike::create(['name' => 'Road Racer', 'category' => 'Road', 'description' => 'carbon frame, 22 speed', 'status' => 'Tersedia', 'price_1h' => 12000, 'price_2h' => 22000, 'price_1day' => 60000, 'photo_path' => null]);
        Bike::create(['name' => 'Foldie Pro', 'category' => 'Lipat', 'description' => 'ringkas, gampang dibawa', 'status' => 'Perawatan', 'price_1h' => 9000, 'price_2h' => 16000, 'price_1day' => 50000, 'photo_path' => null]);
        Bike::create(['name' => 'Tandem Joy', 'category' => 'Tandem', 'description' => '2 kursi, fun ride', 'status' => 'Tersedia', 'price_1h' => 15000, 'price_2h' => 28000, 'price_1day' => 75000, 'photo_path' => null]);

        Booking::create(['bike_id' => $mountain->id, 'renter_name' => 'Andi', 'phone' => '081234567890', 'duration' => '1 Jam (Rp10.000)', 'status_payment' => 'DP', 'start_at' => now()->subDay(), 'total' => 10000]);
        Booking::create(['bike_id' => $city->id, 'renter_name' => 'Siti', 'phone' => '081234567891', 'duration' => '2 Jam (Rp18.000)', 'status_payment' => 'Lunas', 'start_at' => now()->subHours(6), 'total' => 18000]);

        Transaction::create(['type' => 'Pemasukan', 'category' => 'Sewa Sepeda', 'description' => 'Andi - 1 Jam', 'amount' => 10000, 'occurred_at' => now()->toDateString()]);
        Transaction::create(['type' => 'Pemasukan', 'category' => 'Sewa Sepeda', 'description' => 'Siti - 2 Jam', 'amount' => 18000, 'occurred_at' => now()->toDateString()]);
        Transaction::create(['type' => 'Pengeluaran', 'category' => 'Operasional', 'description' => 'Servis sepeda', 'amount' => 150000, 'occurred_at' => now()->subDay()->toDateString()]);
    }
}
