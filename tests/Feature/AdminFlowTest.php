<?php

namespace Tests\Feature;

use App\Models\Bike;
use App\Models\Booking;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminFlowTest extends TestCase
{
    public function test_admin_can_store_bike(): void
    {
        Storage::fake('public');

        $response = $this->post('/admin/login', [
            'username' => 'sepedaetam.tgr',
            'password' => 'sepedaetam26',
        ]);

        $response->assertRedirect('/admin');

        $this->post('/admin/bikes', [
            'name' => 'Test Bike',
            'category' => 'Test',
            'description' => 'Desc',
            'status' => 'Tersedia',
            'price_1h' => 10000,
            'price_2h' => 25000,
            'price_1day' => 55000,
            'photo' => UploadedFile::fake()->image('bike.jpg'),
        ])->assertRedirect('/admin');

        $this->assertDatabaseHas('bikes', ['name' => 'Test Bike']);
    }

    public function test_admin_can_update_bike(): void
    {
        $bike = Bike::create([
            'name' => 'Bike Lama',
            'category' => 'Test',
            'description' => 'Desc',
            'status' => 'Tersedia',
            'price_1h' => 10000,
            'price_2h' => 25000,
            'price_1day' => 55000,
            'photo_path' => null,
        ]);

        $this->post('/admin/login', [
            'username' => 'sepedaetam.tgr',
            'password' => 'sepedaetam26',
        ]);

        $this->patch('/admin/bikes/' . $bike->id, [
            'name' => 'Bike Baru',
            'category' => 'Update',
            'description' => 'Desc Baru',
            'status' => 'Disewa',
            'price_1h' => 12000,
            'price_2h' => 25000,
            'price_1day' => 60000,
        ])->assertRedirect('/admin');

        $this->assertDatabaseHas('bikes', ['name' => 'Bike Baru', 'price_2h' => 25000]);
    }

    public function test_admin_can_store_booking(): void
    {
        $bike = Bike::create([
            'name' => 'Bike A',
            'category' => 'Test',
            'description' => 'Desc',
            'status' => 'Tersedia',
            'price_1h' => 10000,
            'price_2h' => 25000,
            'price_1day' => 55000,
            'photo_path' => null,
        ]);

        $this->post('/admin/login', [
            'username' => 'sepedaetam.tgr',
            'password' => 'sepedaetam26',
        ]);

        $this->post('/admin/bookings', [
            'bike_id' => $bike->id,
            'renter_name' => 'Budi',
            'phone' => '081234567890',
            'duration' => '1 Jam (Rp10.000)',
            'status_payment' => 'Lunas',
            'start_at' => now()->toDateTimeString(),
            'total' => 10000,
        ])->assertRedirect('/admin');

        $this->assertDatabaseHas('bookings', ['renter_name' => 'Budi']);
    }
}
