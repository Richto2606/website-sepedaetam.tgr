<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin · Sepedaetam.tgr</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * { font-family: 'Inter', system-ui, sans-serif; }
    body { background: #f1f5f9; }
    .shadow-soft { box-shadow: 0 4px 16px -4px rgba(0,0,0,0.04), 0 2px 4px -2px rgba(0,0,0,0.02); }
    .card-hover { transition: transform 0.15s ease, box-shadow 0.2s; }
    .card-hover:hover { transform: translateY(-2px); box-shadow: 0 12px 24px -8px rgba(0,0,0,0.06); }
    .badge-pill { border-radius: 9999px; padding: 0.2rem 0.9rem; font-weight: 500; font-size: 0.7rem; letter-spacing: 0.01em; }
    .bg-soft-gray { background: #f1f5f9; }
    .border-soft { border-color: #e9edf2; }
    .text-muted { color: #64748b; }
    .sidebar-link { transition: all 0.15s; border-radius: 0.75rem; cursor: pointer; }
    .sidebar-link:hover { background: #f1f5f9; }
    .sidebar-link.active { background: #eef2ff; color: #2563eb; font-weight: 600; }
    .tab-content { display: none; }
    .tab-content.active { display: block; }
    .file-upload-area { border: 2px dashed #e2e8f0; transition: all 0.15s; cursor: pointer; }
    .file-upload-area:hover { border-color: #2563eb; background: #f8fafc; }
    .file-upload-area.dragover { border-color: #2563eb; background: #eef2ff; }
    .photo-preview { width: 80px; height: 80px; object-fit: cover; border-radius: 0.75rem; border: 2px solid #e9edf2; }
    .filter-btn { border-radius: 9999px; padding: 0.3rem 1.2rem; font-size: 0.75rem; font-weight: 500; transition: all 0.15s; border: 1px solid #e2e8f0; background: white; cursor: pointer; }
    .filter-btn.active { background: #0f172a; color: white; border-color: #0f172a; }
    .filter-btn:hover:not(.active) { background: #f1f5f9; }
    .export-btn { border-radius: 9999px; padding: 0.4rem 1.2rem; font-size: 0.75rem; font-weight: 600; transition: all 0.15s; cursor: pointer; border: none; }
    .export-btn-pdf { background: #0f172a; color: white; }
    .export-btn-pdf:hover { background: #1e293b; }
    .export-btn-excel { background: #1e7e34; color: white; }
    .export-btn-excel:hover { background: #166b2b; }
    .modal-overlay { background: rgba(15, 23, 42, 0.5); backdrop-filter: blur(4px); }
    .table-row-hover:hover { background: #f8fafc; }
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 10px; }
    ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
  </style>
</head>
<body>
  <div class="flex h-screen overflow-hidden">
    <aside class="w-64 bg-white border-r border-soft flex-shrink-0 hidden md:flex flex-col h-screen sticky top-0">
      <div class="px-5 py-5 border-b border-soft">
        <div class="flex items-center gap-2">
          <img src="{{ asset('images/sepedaetam-logo.png') }}" alt="Sepeda Etam" class="h-8 w-auto object-contain">
          <span class="bg-[#2563eb]/10 text-[#2563eb] text-[0.5rem] font-bold uppercase px-2 py-0.5 rounded-full">admin</span>
        </div>
        <p class="text-xs text-muted mt-1">Dashboard manajemen</p>
      </div>
      @if (session('success'))
        <div class="mx-3 mt-3 rounded-xl bg-green-50 text-green-700 text-xs px-3 py-2">{{ session('success') }}</div>
      @endif
      <nav class="flex-1 px-3 py-4 overflow-y-auto">
        <div class="mb-6">
          <p class="text-[0.6rem] font-semibold text-muted uppercase tracking-wider px-3 mb-2">Menu Utama</p>
          <div class="sidebar-link active flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-[#0f172a]" data-tab="dashboard"><i class="fas fa-gauge-high w-5 text-center text-[#2563eb]"></i> Dashboard</div>
          <div class="sidebar-link flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-muted hover:text-[#0f172a]" data-tab="sepeda"><i class="fas fa-bicycle w-5 text-center"></i> Kelola Sepeda</div>
          <div class="sidebar-link flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-muted hover:text-[#0f172a]" data-tab="booking"><i class="fas fa-calendar-check w-5 text-center"></i> Booking</div>
          <div class="sidebar-link flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-muted hover:text-[#0f172a]" data-tab="laporan"><i class="fas fa-chart-pie w-5 text-center"></i> Laporan</div>
        </div>
          <div class="sidebar-link flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-muted hover:text-[#0f172a]" data-tab="profil">
            <i class="fas fa-user-cog w-5 text-center"></i> Profil
          </div>

      </nav>
      <div class="px-4 py-4 border-t border-soft text-[0.6rem] text-muted text-center">
        <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="text-[#2563eb] font-semibold">Logout</button></form>
      </div>
    </aside>

    <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8">
      <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
        <div>
          <h1 class="text-2xl font-bold text-[#0f172a]" id="pageTitle">Dashboard</h1>
          <p class="text-sm text-muted" id="pageDesc">Selamat datang, Admin! — kelola bisnis sepeda dengan mudah.</p>
        </div>
        <div class="flex items-center gap-3">
          <span class="text-sm text-muted hidden sm:inline"><i class="far fa-clock mr-1"></i> Kamis, 27 Agt 2026</span>
          <div class="w-9 h-9 rounded-full bg-[#2563eb] text-white flex items-center justify-center font-bold text-sm shadow-sm">A</div>
        </div>
      </div>

      <div id="tab-dashboard" class="tab-content active">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
          <div class="bg-white rounded-xl shadow-soft p-4 border border-soft"><div class="flex items-center justify-between"><span class="text-sm font-medium text-muted">Total Sepeda</span><span class="w-8 h-8 rounded-full bg-[#eef2ff] text-[#2563eb] flex items-center justify-center"><i class="fas fa-bicycle"></i></span></div><p class="text-2xl font-bold mt-2">{{ $totalBikes }}</p></div>
          <div class="bg-white rounded-xl shadow-soft p-4 border border-soft"><div class="flex items-center justify-between"><span class="text-sm font-medium text-muted">Aktif Disewa</span><span class="w-8 h-8 rounded-full bg-[#fef3c7] text-[#d97706] flex items-center justify-center"><i class="fas fa-clock"></i></span></div><p class="text-2xl font-bold mt-2">{{ $activeBikes }}</p></div>
          <div class="bg-white rounded-xl shadow-soft p-4 border border-soft"><div class="flex items-center justify-between"><span class="text-sm font-medium text-muted">Booking Hari Ini</span><span class="w-8 h-8 rounded-full bg-[#dbeafe] text-[#2563eb] flex items-center justify-center"><i class="fas fa-calendar-day"></i></span></div><p class="text-2xl font-bold mt-2">{{ $bookingToday }}</p></div>
          <div class="bg-white rounded-xl shadow-soft p-4 border border-soft"><div class="flex items-center justify-between"><span class="text-sm font-medium text-muted">Pendapatan (Bulan)</span><span class="w-8 h-8 rounded-full bg-[#d1fae5] text-[#059669] flex items-center justify-center"><i class="fas fa-coins"></i></span></div><p class="text-2xl font-bold mt-2">Rp{{ number_format($income, 0, ',', '.') }}</p></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <div class="lg:col-span-2 bg-white rounded-xl shadow-soft border border-soft p-5">
            <h2 class="font-bold text-[#0f172a] mb-3"><i class="fas fa-bicycle text-[#2563eb] mr-2"></i> Sepeda Terbaru</h2>
            <div class="space-y-2 text-sm">@forelse ($bikes->take(3) as $bike)<div class="flex justify-between items-center border-b border-soft/60 py-2"><span><span class="font-medium">{{ $bike->name }}</span> <span class="badge-pill {{ $bike->status === 'Tersedia' ? 'bg-green-100 text-green-700' : ($bike->status === 'Disewa' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700') }} ml-2">{{ $bike->status }}</span></span><span class="text-muted text-xs">{{ number_format($bike->price_1h, 0, ',', '.') }} / {{ number_format($bike->price_2h, 0, ',', '.') }} / {{ number_format($bike->price_1day, 0, ',', '.') }}</span></div>@empty<div class="text-sm text-muted">Belum ada sepeda.</div>@endforelse</div>
          </div>
          <div class="bg-white rounded-xl shadow-soft border border-soft p-5">
            <h2 class="font-bold text-[#0f172a] mb-3"><i class="fas fa-calendar-check text-[#2563eb] mr-2"></i> Booking Terakhir</h2>
            <div class="space-y-2 text-sm">@forelse ($bookings->take(2) as $booking)<div class="bg-soft-gray rounded-xl p-2.5"><span class="font-medium">{{ $booking->renter_name }}</span> — {{ $booking->bike?->name }} <span class="badge-pill {{ $booking->status_payment === 'Lunas' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }} ml-2">{{ $booking->status_payment }}</span></div>@empty<div class="text-sm text-muted">Belum ada booking.</div>@endforelse</div>
          </div>
        </div>
      </div>

      <div id="tab-sepeda" class="tab-content">
        <div class="bg-white rounded-xl shadow-soft border border-soft p-5">
          <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
            <h2 class="font-bold text-[#0f172a]"><i class="fas fa-bicycle text-[#2563eb] mr-2"></i> Daftar Sepeda</h2>
            <button onclick="document.getElementById('modalSepeda').classList.remove('hidden')" class="bg-[#0f172a] text-white text-xs font-semibold px-4 py-1.5 rounded-full hover:bg-[#1e293b] transition"><i class="fas fa-plus mr-1"></i> Tambah Sepeda</button>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-sm">
              <thead class="text-xs text-muted border-b border-soft"><tr><th class="text-left py-2 font-semibold">Foto</th><th class="text-left py-2 font-semibold">Nama</th><th class="text-left py-2 font-semibold hidden sm:table-cell">Kategori</th><th class="text-left py-2 font-semibold">Status</th><th class="text-left py-2 font-semibold hidden md:table-cell">Tarif</th><th class="text-right py-2 font-semibold">Aksi</th></tr></thead>
              <tbody>
                @forelse ($bikes as $bike)
                <tr class="border-b border-soft/60 table-row-hover">
                  <td class="py-2.5">
                    @if ($bike->photo_path)
                      <img src="{{ asset('storage/' . $bike->photo_path) }}" class="w-10 h-10 rounded-lg object-cover border border-soft">
                    @else
                      <div class="w-10 h-10 rounded-lg bg-soft-gray border border-soft flex items-center justify-center text-lg">🚲</div>
                    @endif
                  </td>
                  <td class="py-2.5 font-medium">{{ $bike->name }}</td>
                  <td class="py-2.5 hidden sm:table-cell text-muted">{{ $bike->category ?? '-' }}</td>
                  <td class="py-2.5"><span class="badge-pill {{ $bike->status === 'Tersedia' ? 'bg-green-100 text-green-700' : ($bike->status === 'Disewa' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700') }}">{{ $bike->status }}</span></td>
                  <td class="py-2.5 hidden md:table-cell text-xs text-muted">{{ number_format($bike->price_1h, 0, ',', '.') }} / {{ number_format($bike->price_2h, 0, ',', '.') }} / {{ number_format($bike->price_1day, 0, ',', '.') }}</td>
                  <td class="py-2.5 text-right flex items-center justify-end gap-2">
                    <button onclick="document.getElementById('modalSepeda').classList.remove('hidden')" class="text-[#2563eb] hover:underline text-xs font-medium"><i class="fas fa-edit"></i></button>
                    <form method="POST" action="{{ route('admin.bikes.destroy', $bike) }}" onsubmit="return confirm('Hapus sepeda ini?')">@csrf @method('DELETE')<button class="text-red-500 hover:underline text-xs font-medium"><i class="fas fa-trash"></i></button></form>
                  </td>
                </tr>
                @empty
                <tr><td colspan="6" class="py-4 text-center text-sm text-muted">Belum ada sepeda</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div id="tab-booking" class="tab-content">
        <div class="bg-white rounded-xl shadow-soft border border-soft p-5">
          <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
            <h2 class="font-bold text-[#0f172a]"><i class="fas fa-calendar-check text-[#2563eb] mr-2"></i> Manajemen Booking</h2>
            <button onclick="document.getElementById('modalBooking').classList.remove('hidden')" class="bg-[#0f172a] text-white text-xs font-semibold px-4 py-1.5 rounded-full hover:bg-[#1e293b] transition"><i class="fas fa-plus mr-1"></i> Booking Baru</button>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-sm">
              <thead class="text-xs text-muted border-b border-soft"><tr><th class="text-left py-2 font-semibold">Penyewa</th><th class="text-left py-2 font-semibold">Sepeda</th><th class="text-left py-2 font-semibold hidden sm:table-cell">Durasi</th><th class="text-left py-2 font-semibold">Status</th><th class="text-left py-2 font-semibold hidden md:table-cell">Total</th><th class="text-right py-2 font-semibold">Aksi</th></tr></thead>
              <tbody>
                @forelse ($bookings as $booking)
                <tr class="border-b border-soft/60 table-row-hover">
                  <td class="py-2.5 font-medium">{{ $booking->renter_name }}</td>
                  <td class="py-2.5">{{ $booking->bike?->name }}</td>
                  <td class="py-2.5 hidden sm:table-cell">{{ $booking->duration }}</td>
                  <td class="py-2.5"><span class="badge-pill {{ $booking->status_payment === 'Lunas' ? 'bg-green-100 text-green-700' : ($booking->status_payment === 'DP' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">{{ $booking->status_payment }}</span></td>
                  <td class="py-2.5 hidden md:table-cell">Rp{{ number_format($booking->total, 0, ',', '.') }}</td>
                  <td class="py-2.5 text-right flex items-center justify-end gap-2"><button type="button" class="text-[#2563eb] hover:underline text-xs font-medium" onclick="editBooking({{ $booking->id }}, '{{ e($booking->renter_name) }}', '{{ e($booking->phone) }}', '{{ e($booking->duration) }}', '{{ e($booking->status_payment) }}', {{ $booking->total }})"><i class="fas fa-edit"></i></button><form method="POST" action="{{ route('admin.bookings.destroy', $booking) }}" onsubmit="return confirm('Hapus booking ini?')">@csrf @method('DELETE')<button class="text-red-500 hover:underline text-xs font-medium"><i class="fas fa-trash"></i></button></form></td>
                </tr>
                @empty
                <tr><td colspan="6" class="py-4 text-center text-sm text-muted">Belum ada booking</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div id="tab-laporan" class="tab-content">
        <div class="bg-white rounded-xl shadow-soft border border-soft p-5 space-y-5">
          <div class="flex flex-wrap items-center justify-between gap-3">
            <h2 class="font-bold text-[#0f172a]"><i class="fas fa-chart-pie text-[#2563eb] mr-2"></i> Laporan Keuangan</h2>
            <div class="flex flex-wrap items-center gap-2"><button class="filter-btn active">Mingguan</button><button class="filter-btn">Bulanan</button><span class="w-px h-6 bg-soft-gray mx-1"></span><a href="{{ route('admin.reports.export.pdf', ['period' => 'mingguan']) }}" class="export-btn export-btn-pdf"><i class="fas fa-file-pdf mr-1"></i> PDF</a><a href="{{ route('admin.reports.export.excel', ['period' => 'mingguan']) }}" class="export-btn export-btn-excel"><i class="fas fa-file-excel mr-1"></i> Excel</a></div>
          </div>
          <form method="POST" action="{{ route('admin.reports.store') }}" class="grid grid-cols-1 md:grid-cols-5 gap-3">
            @csrf
            <select name="type" class="border border-soft rounded-xl px-3 py-2 text-sm"><option>Pemasukan</option><option>Pengeluaran</option></select>
            <input name="category" class="border border-soft rounded-xl px-3 py-2 text-sm" placeholder="Kategori">
            <input name="description" class="border border-soft rounded-xl px-3 py-2 text-sm md:col-span-2" placeholder="Deskripsi">
            <input name="amount" type="number" class="border border-soft rounded-xl px-3 py-2 text-sm" placeholder="Nominal">
            <input name="occurred_at" type="date" class="border border-soft rounded-xl px-3 py-2 text-sm">
            <button class="md:col-span-5 bg-[#0f172a] text-white text-sm font-semibold px-4 py-2 rounded-full">Simpan transaksi</button>
          </form>
          <div class="grid grid-cols-1 sm:grid-cols-3 gap-3"><div class="bg-soft-gray rounded-xl p-3 text-center"><p class="text-xs text-muted">Pemasukan</p><p class="text-xl font-bold text-[#0f172a]">Rp{{ number_format($income, 0, ',', '.') }}</p></div><div class="bg-soft-gray rounded-xl p-3 text-center"><p class="text-xs text-muted">Pengeluaran</p><p class="text-xl font-bold text-[#0f172a]">Rp{{ number_format($expense, 0, ',', '.') }}</p></div><div class="bg-[#eef2ff] rounded-xl p-3 text-center"><p class="text-xs text-muted">Laba Bersih</p><p class="text-xl font-bold text-[#2563eb]">Rp{{ number_format($income - $expense, 0, ',', '.') }}</p></div></div>
          <div class="overflow-x-auto"><table class="w-full text-sm"><thead class="text-xs text-muted border-b border-soft"><tr><th class="text-left py-2 font-semibold">Tanggal</th><th class="text-left py-2 font-semibold">Kategori</th><th class="text-left py-2 font-semibold">Deskripsi</th><th class="text-left py-2 font-semibold">Jenis</th><th class="text-right py-2 font-semibold">Nominal</th></tr></thead><tbody>@forelse ($transactions as $transaction)<tr class="border-b border-soft/60 table-row-hover"><td class="py-2.5">{{ $transaction->occurred_at->format('d/m/Y') }}</td><td class="py-2.5">{{ $transaction->category }}</td><td class="py-2.5">{{ $transaction->description }}</td><td class="py-2.5"><span class="badge-pill {{ $transaction->type === 'Pemasukan' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $transaction->type }}</span></td><td class="py-2.5 text-right font-medium">Rp{{ number_format($transaction->amount, 0, ',', '.') }}</td></tr>@empty<tr><td colspan="5" class="py-4 text-center text-sm text-muted">Belum ada transaksi</td></tr>@endforelse</tbody></table></div>
        </div>
      </div>

      <div id="tab-profil" class="tab-content">
        <div class="bg-white rounded-xl shadow-soft border border-soft p-5 space-y-5">
          <div class="flex items-center gap-3"><img src="{{ asset('images/sepedaetam-logo.png') }}" alt="Sepeda Etam" class="h-12 w-auto object-contain"><div><h2 class="font-bold text-[#0f172a]">Profil Sepedaetam.tgr</h2><p class="text-sm text-muted">Informasi usaha dan admin</p></div></div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div class="bg-soft-gray rounded-xl p-4"><div class="text-xs text-muted">Nama Usaha</div><div class="font-semibold">Sepedaetam.tgr</div></div>
            <div class="bg-soft-gray rounded-xl p-4"><div class="text-xs text-muted">Tipe</div><div class="font-semibold">Penyewaan sepeda modern</div></div>
            <div class="bg-soft-gray rounded-xl p-4"><div class="text-xs text-muted">Alamat Maps</div><div class="font-semibold">TGR Yogyakarta</div></div>
            <div class="bg-soft-gray rounded-xl p-4"><div class="text-xs text-muted">Jam Operasional</div><div class="font-semibold">07.00 - 21.00 WIB</div></div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-sm">
            <div class="bg-soft-gray rounded-xl p-4"><div class="text-xs text-muted">Admin 1</div><div class="font-semibold">0817-7639-3708</div></div>
            <div class="bg-soft-gray rounded-xl p-4"><div class="text-xs text-muted">Admin 2</div><div class="font-semibold">0822-1764-5783</div></div>
            <div class="bg-soft-gray rounded-xl p-4"><div class="text-xs text-muted">Admin 3</div><div class="font-semibold">0822-5080-4606</div></div>
          </div>
          <form method="POST" action="{{ route('admin.profile.password') }}" class="space-y-3 pt-4 border-t border-soft">
            @csrf
            <h3 class="font-bold text-[#0f172a]">Reset Password Admin</h3>
            @if ($errors->has('current_password'))
              <div class="rounded-xl bg-red-50 text-red-700 text-xs p-3">{{ $errors->first('current_password') }}</div>
            @endif
            <div><label class="text-xs font-semibold text-muted block mb-1">Password lama</label><input name="current_password" type="password" class="w-full border border-soft rounded-xl px-4 py-2 text-sm" placeholder="Password lama"></div>
            <div><label class="text-xs font-semibold text-muted block mb-1">Password baru</label><input name="new_password" type="password" class="w-full border border-soft rounded-xl px-4 py-2 text-sm" placeholder="Password baru"></div>
            <button class="bg-[#0f172a] text-white text-sm font-semibold px-4 py-2 rounded-full">Simpan password</button>
          </form>
        </div>
      </div>

      <div class="text-center text-[0.6rem] text-muted border-t border-soft pt-4 mt-6">
        <i class="fas fa-code mr-1"></i> Sepedaetam.tgr Admin · Laravel 12 · Tailwind CSS · <i class="fas fa-shield-alt text-[#2563eb] ml-1"></i> Secure
      </div>
    </main>
  </div>

  <div class="fixed inset-0 modal-overlay flex items-center justify-center z-50 hidden" id="modalSepeda">
    <div class="bg-white rounded-2xl shadow-xl p-6 max-w-lg w-full mx-4 max-h-[90vh] overflow-y-auto">
      <div class="flex justify-between items-center mb-4"><h3 class="text-lg font-bold"><i class="fas fa-bicycle text-[#2563eb] mr-2"></i> Tambah Sepeda</h3><button onclick="document.getElementById('modalSepeda').classList.add('hidden')" class="text-muted hover:text-[#0f172a]"><i class="fas fa-times"></i></button></div>
      <form method="POST" action="{{ route('admin.bikes.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @if ($errors->any())
          <div class="rounded-xl bg-red-50 text-red-700 text-xs p-3">{{ $errors->first() }}</div>
        @endif
        <div>
          <label class="text-xs font-semibold text-muted block mb-1">Nama Sepeda</label>
          <input name="name" type="text" class="w-full border border-soft rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#2563eb] focus:border-transparent" placeholder="Mountain XC">
        </div>
        <div>
          <label class="text-xs font-semibold text-muted block mb-1">Kategori</label>
          <input name="category" type="text" class="w-full border border-soft rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#2563eb] focus:border-transparent" placeholder="Gunung">
        </div>
        <div>
          <label class="text-xs font-semibold text-muted block mb-1">Deskripsi</label>
          <textarea name="description" class="w-full border border-soft rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#2563eb] h-20" placeholder="Spesifikasi singkat"></textarea>
        </div>
        <div>
          <label class="text-xs font-semibold text-muted block mb-1">Upload Foto</label>
          <input name="photo" type="file" accept="image/png,image/jpeg" class="w-full border border-soft rounded-xl px-4 py-2 text-sm bg-white">
        </div>
        <div class="grid grid-cols-3 gap-3">
          <div><label class="text-xs font-semibold text-muted block mb-1">1 Jam</label><input name="price_1h" type="number" class="w-full border border-soft rounded-xl px-3 py-2 text-sm" value="10000"></div>
          <div><label class="text-xs font-semibold text-muted block mb-1">2 Jam</label><input name="price_2h" type="number" class="w-full border border-soft rounded-xl px-3 py-2 text-sm" value="18000"></div>
          <div><label class="text-xs font-semibold text-muted block mb-1">1 Hari</label><input name="price_1day" type="number" class="w-full border border-soft rounded-xl px-3 py-2 text-sm" value="55000"></div>
        </div>
        <div>
          <label class="text-xs font-semibold text-muted block mb-1">Status</label>
          <select name="status" class="w-full border border-soft rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#2563eb]">
            <option selected>Tersedia</option>
            <option>Disewa</option>
            <option>Perawatan</option>
          </select>
        </div>
        <button type="submit" class="w-full bg-[#0f172a] text-white font-semibold py-2.5 rounded-full hover:bg-[#1e293b] transition"><i class="fas fa-save mr-2"></i> Simpan Sepeda</button>
      </form>
    </div>
  </div>

  <div class="fixed inset-0 modal-overlay flex items-center justify-center z-50 hidden" id="modalBooking">
    <div class="bg-white rounded-2xl shadow-xl p-6 max-w-lg w-full mx-4 max-h-[90vh] overflow-y-auto">
      <div class="flex justify-between items-center mb-4"><h3 class="text-lg font-bold"><i class="fas fa-calendar-plus text-[#2563eb] mr-2"></i> Booking Baru / Edit</h3><button onclick="document.getElementById('modalBooking').classList.add('hidden')" class="text-muted hover:text-[#0f172a]"><i class="fas fa-times"></i></button></div>
      <form id="bookingForm" method="POST" action="{{ route('admin.bookings.store') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="_method" id="bookingMethod" value="POST">
        <input type="hidden" name="bike_id" value="{{ $bikes->first()?->id }}">
        <div><label class="text-xs font-semibold text-muted block mb-1">Nama Penyewa</label><input id="bookingRenter" name="renter_name" type="text" class="w-full border border-soft rounded-xl px-4 py-2 text-sm" placeholder="Nama lengkap"></div>
        <div><label class="text-xs font-semibold text-muted block mb-1">Nomor HP</label><input id="bookingPhone" name="phone" type="text" class="w-full border border-soft rounded-xl px-4 py-2 text-sm" placeholder="08xx-xxxx-xxxx"></div>
        <div><label class="text-xs font-semibold text-muted block mb-1">Paket Sewa</label><input id="bookingDuration" name="duration" type="text" class="w-full border border-soft rounded-xl px-4 py-2 text-sm" placeholder="1 Jam (Rp10.000)"></div>
        <div><label class="text-xs font-semibold text-muted block mb-1">Status Pembayaran</label><select id="bookingStatus" name="status_payment" class="w-full border border-soft rounded-xl px-4 py-2 text-sm"><option>Lunas</option><option>DP</option><option>Belum Bayar</option></select></div>
        <div><label class="text-xs font-semibold text-muted block mb-1">Total</label><input id="bookingTotal" name="total" type="number" class="w-full border border-soft rounded-xl px-4 py-2 text-sm" value="10000"></div>
        <button type="submit" class="w-full bg-[#0f172a] text-white font-semibold py-2.5 rounded-full hover:bg-[#1e293b] transition"><i class="fas fa-save mr-2"></i> Simpan Booking</button>
      </form>
    </div>
  </div>

  <script>
    document.querySelectorAll('.sidebar-link[data-tab]').forEach(link => { link.addEventListener('click', function() { document.querySelectorAll('.sidebar-link[data-tab]').forEach(l => l.classList.remove('active')); this.classList.add('active'); const tabId = this.dataset.tab; document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active')); document.getElementById('tab-' + tabId).classList.add('active'); const titles = {                     dashboard: ['Dashboard', 'Selamat datang, Admin! — kelola bisnis sepeda dengan mudah.'],
                    sepeda: ['Kelola Sepeda', 'Tambah, edit, dan kelola data sepeda serta tarif.'],
                    booking: ['Manajemen Booking', 'Lihat dan kelola semua transaksi penyewaan.'],
                    laporan: ['Laporan Keuangan', 'Rekap pemasukan, pengeluaran, dan laba bersih.'],
                    profil: ['Profil Admin', 'Informasi usaha, kontak, dan profil Sepedaetam.tgr.']
 }; document.getElementById('pageTitle').textContent = titles[tabId][0]; document.getElementById('pageDesc').textContent = titles[tabId][1]; }); });
    document.querySelectorAll('.filter-btn').forEach(btn => { btn.addEventListener('click', function() { document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active')); this.classList.add('active'); const isMonthly = this.textContent.trim() === 'Bulanan'; document.getElementById('incomeVal').textContent = isMonthly ? 'Rp4.820.000' : 'Rp1.240.000'; document.getElementById('expenseVal').textContent = isMonthly ? 'Rp1.380.000' : 'Rp420.000'; document.getElementById('profitVal').textContent = isMonthly ? 'Rp3.440.000' : 'Rp820.000'; document.querySelectorAll('.export-btn-pdf').forEach(a => a.href = '/admin/reports/export/pdf?period=' + (isMonthly ? 'bulanan' : 'mingguan')); document.querySelectorAll('.export-btn-excel').forEach(a => a.href = '/admin/reports/export/excel?period=' + (isMonthly ? 'bulanan' : 'mingguan')); }); });
    function editBooking(id, renter, phone, duration, status, total) { document.getElementById('bookingMethod').value = 'PATCH'; document.getElementById('bookingForm').action = '/admin/bookings/' + id; document.getElementById('bookingRenter').value = renter; document.getElementById('bookingPhone').value = phone; document.getElementById('bookingDuration').value = duration; document.getElementById('bookingStatus').value = status; document.getElementById('bookingTotal').value = total; document.getElementById('modalBooking').classList.remove('hidden'); }
    function previewImage(event) { const file = event.target.files[0]; if (!file) return; const reader = new FileReader(); reader.onload = function(e) { document.getElementById('imagePreview').src = e.target.result; document.getElementById('fileName').textContent = file.name; document.getElementById('previewContainer').classList.remove('hidden'); document.querySelector('#uploadArea label p:first-child').textContent = '✅ Foto siap diunggah'; }; reader.readAsDataURL(file); }
    const uploadArea = document.getElementById('uploadArea'); if (uploadArea) { uploadArea.addEventListener('dragover', function(e) { e.preventDefault(); this.classList.add('dragover'); }); uploadArea.addEventListener('dragleave', function(e) { e.preventDefault(); this.classList.remove('dragover'); }); uploadArea.addEventListener('drop', function(e) { e.preventDefault(); this.classList.remove('dragover'); const files = e.dataTransfer.files; if (files.length) { document.getElementById('fileInput').files = files; previewImage({ target: { files: files } }); } }); }
    document.querySelectorAll('.modal-overlay').forEach(modal => { modal.addEventListener('click', function(e) { if (e.target === this) this.classList.add('hidden'); }); });
  </script>
</body>
</html>
