<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'bike_id' => ['required', 'exists:bikes,id'],
            'renter_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'duration' => ['required', 'string', 'max:255'],
            'status_payment' => ['required', 'string', 'max:255'],
            'start_at' => ['nullable', 'date'],
            'total' => ['required', 'integer', 'min:0'],
        ]);

        Booking::create($data);

        Transaction::create([
            'type' => 'Pemasukan',
            'category' => 'Sewa Sepeda',
            'description' => $data['renter_name'] . ' - ' . $data['duration'],
            'amount' => $data['total'],
            'occurred_at' => now()->toDateString(),
        ]);

        return redirect('/admin')->with('success', 'Booking tersimpan');
    }

    public function update(Request $request, Booking $booking): RedirectResponse
    {
        $data = $request->validate([
            'duration' => ['required', 'string', 'max:255'],
            'status_payment' => ['required', 'string', 'max:255'],
            'total' => ['required', 'integer', 'min:0'],
        ]);

        $booking->update($data);

        return redirect('/admin')->with('success', 'Booking diperbarui');
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();

        return redirect('/admin')->with('success', 'Booking terhapus');
    }
}
