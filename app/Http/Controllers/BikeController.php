<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BikeController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'string', 'max:255'],
            'price_1h' => ['required', 'integer', 'min:0'],
            'price_2h' => ['required', 'integer', 'min:0'],
            'price_1day' => ['required', 'integer', 'min:0'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:5120'],
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = str_replace(' ', '-', strtolower(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)));
            $photoPath = $file->storeAs('bikes', $name . '-' . time() . '.' . $file->getClientOriginalExtension(), 'public');
        }

        Bike::create([
            'name' => $data['name'],
            'category' => $data['category'] ?? null,
            'description' => $data['description'] ?? null,
            'status' => $data['status'],
            'price_1h' => $data['price_1h'],
            'price_2h' => $data['price_2h'],
            'price_1day' => $data['price_1day'],
            'photo_path' => $photoPath,
        ]);

        return redirect('/admin')->with('success', 'Sepeda tersimpan');
    }

    public function destroy(Bike $bike): RedirectResponse
    {
        if ($bike->photo_path) {
            Storage::disk('public')->delete($bike->photo_path);
        }

        $bike->delete();

        return redirect('/admin')->with('success', 'Sepeda terhapus');
    }
}
