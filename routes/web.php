<?php

use App\Http\Controllers\BikeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReportController;
use App\Models\Bike;
use App\Models\Booking;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $bikes = Bike::latest()->get();

    return view('public', compact('bikes'));
});

Route::get('/admin/login', function () {
    if (session('admin_auth')) {
        return redirect('/admin');
    }

    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {
    $data = $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required', 'string'],
    ]);

    $admin = User::where('username', $data['username'])->first();

    if ($admin && Hash::check($data['password'], $admin->password)) {
        $request->session()->put('admin_auth', true);
        return redirect('/admin');
    }

    return back()->withErrors(['username' => 'Login gagal'])->withInput();
})->name('admin.login.submit');

Route::get('/admin', function () {
    if (!session('admin_auth')) {
        return redirect('/admin/login');
    }

    $bikes = Bike::latest()->get();
    $bookings = Booking::latest()->get();
    $transactions = Transaction::latest()->get();
    $income = $transactions->where('type', 'Pemasukan')->sum('amount');
    $expense = $transactions->where('type', 'Pengeluaran')->sum('amount');
    $totalBikes = $bikes->count();
    $activeBikes = $bikes->where('status', 'Disewa')->count();
    $bookingToday = $bookings->whereBetween('created_at', [now()->startOfDay(), now()->endOfDay()])->count();

    return view('admin.dashboard', compact('bikes', 'bookings', 'transactions', 'income', 'expense', 'totalBikes', 'activeBikes', 'bookingToday'));
})->name('admin.dashboard');

Route::post('/admin/logout', function (Request $request) {
    if (!session('admin_auth')) {
        return redirect('/admin/login');
    }

    $request->session()->forget('admin_auth');
    $request->session()->regenerateToken();

    return redirect('/');
})->name('admin.logout');

Route::post('/admin/profile/password', function (Request $request) {
    if (!session('admin_auth')) {
        return redirect('/admin/login');
    }

    $data = $request->validate([
        'current_password' => ['required', 'string'],
        'new_password' => ['required', 'string', 'min:8'],
    ]);

    $admin = User::where('username', 'sepedaetam.tgr')->firstOrFail();

    if (!Hash::check($data['current_password'], $admin->password)) {
        return back()->withErrors(['current_password' => 'Password lama salah']);
    }

    $admin->update(['password' => $data['new_password']]);

    return redirect('/admin')->with('success', 'Password admin diperbarui');
})->name('admin.profile.password');

Route::post('/admin/bikes', [BikeController::class, 'store'])->name('admin.bikes.store');
Route::delete('/admin/bikes/{bike}', [BikeController::class, 'destroy'])->name('admin.bikes.destroy');
Route::post('/admin/bookings', [BookingController::class, 'store'])->name('admin.bookings.store');
Route::patch('/admin/bookings/{booking}', [BookingController::class, 'update'])->name('admin.bookings.update');
Route::delete('/admin/bookings/{booking}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
Route::post('/admin/reports', [ReportController::class, 'store'])->name('admin.reports.store');
Route::get('/admin/reports/export/pdf', [ReportController::class, 'exportPdf'])->name('admin.reports.export.pdf');
Route::get('/admin/reports/export/excel', [ReportController::class, 'exportExcel'])->name('admin.reports.export.excel');
