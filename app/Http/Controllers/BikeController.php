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
            $photoPath = $this->savePhoto($request->file('photo'));
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

    public function update(Request $request, Bike $bike): RedirectResponse
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

        $photoPath = $bike->photo_path;

        if ($request->hasFile('photo')) {
            if ($photoPath) {
                $this->deletePhoto($photoPath);
            }
            $photoPath = $this->savePhoto($request->file('photo'));
        }

        $bike->update([
            'name' => $data['name'],
            'category' => $data['category'] ?? null,
            'description' => $data['description'] ?? null,
            'status' => $data['status'],
            'price_1h' => $data['price_1h'],
            'price_2h' => $data['price_2h'],
            'price_1day' => $data['price_1day'],
            'photo_path' => $photoPath,
        ]);

        return redirect('/admin')->with('success', 'Sepeda diperbarui');
    }

    public function destroy(Bike $bike): RedirectResponse
    {
        if ($bike->photo_path) {
            $this->deletePhoto($bike->photo_path);
        }

        $bike->delete();

        return redirect('/admin')->with('success', 'Sepeda terhapus');
    }

    /**
     * Save a photo to the configured filesystem disk. On serverless the
     * local disk is read-only, so failures are swallowed and a null path
     * stored to keep the rest of the flow working.
     */
    private function savePhoto($file): ?string
    {
        try {
            if (config('filesystems.default') !== 'local') {
                return $file->store('bikes', config('filesystems.default'));
            }

            $name = str_replace(' ', '-', strtolower(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)));
            return $file->storeAs('bikes', $name . '-' . time() . '.' . $file->getClientOriginalExtension(), 'public');
        } catch (\Throwable $e) {
            report($e);
            return null;
        }
    }

    private function deletePhoto(?string $path): void
    {
        if (!$path) {
            return;
        }

        try {
            if (config('filesystems.default') !== 'local') {
                Storage::disk(config('filesystems.default'))->delete($path);
            } else {
                Storage::disk('public')->delete($path);
            }
        } catch (\Throwable $e) {
            report($e);
        }
    }
}
