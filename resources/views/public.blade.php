<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sepedaetam.tgr · Sewa Sepeda Modern</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
  <style>
    * { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
    body { background: #f8fafc; }
    .shadow-soft { box-shadow: 0 8px 24px -6px rgba(0,0,0,0.04), 0 2px 4px -2px rgba(0,0,0,0.02); }
    .card-hover { transition: transform 0.2s ease, box-shadow 0.25s; }
    .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 30px -10px rgba(0,0,0,0.06); }
    .badge-pill { border-radius: 9999px; padding: 0.2rem 0.9rem; font-weight: 500; font-size: 0.7rem; letter-spacing: 0.01em; }
    .bg-soft-gray { background: #f1f5f9; }
    .border-soft { border-color: #e9edf2; }
    .text-muted { color: #64748b; }
    .btn-wa { background: #25D366; transition: background 0.15s; }
    .btn-wa:hover { background: #1da851; }
    .btn-outline-dark { border: 1px solid #e2e8f0; transition: all 0.15s; }
    .btn-outline-dark:hover { background: #f1f5f9; border-color: #cbd5e1; }
    .hero-bg { background: linear-gradient(145deg, #ffffff 0%, #fafcfd 100%); }
    .rule-icon { width: 1.6rem; text-align: center; flex-shrink: 0; }
    .map-container { border-radius: 1rem; overflow: hidden; border: 1px solid #e9edf2; }
  </style>
</head>
<body class="antialiased text-[#1e293b]">
  <header class="bg-white/80 backdrop-blur-sm border-b border-soft sticky top-0 z-30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center py-3 md:py-4">
        <div class="flex items-center gap-2">
          <img src="{{ asset('images/sepedaetam-logo.png') }}" alt="Sepeda Etam" class="h-10 w-auto object-contain">
          <span class="hidden sm:inline-block bg-[#2563eb]/10 text-[#2563eb] text-[0.6rem] font-bold uppercase tracking-wide px-2.5 py-0.5 rounded-full">publik</span>
        </div>
        <div class="flex items-center gap-4 text-sm font-medium">
          <a href="#katalog" class="text-muted hover:text-[#0f172a] transition">Katalog</a>
          <a href="#peraturan" class="text-muted hover:text-[#0f172a] transition">Peraturan</a>
          <a href="#kontak" class="text-muted hover:text-[#0f172a] transition">Kontak</a>
          <a href="{{ route('admin.login') }}" class="bg-[#0f172a] text-white px-5 py-2 rounded-full text-sm font-semibold shadow-sm hover:bg-[#1e293b] transition">Admin</a>
        </div>
      </div>
    </div>
  </header>

  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    <section class="hero-bg rounded-2xl shadow-soft p-6 md:p-10 border border-soft mb-10 md:mb-14">
      <div class="flex flex-wrap items-start gap-6">
        <div class="flex-1 min-w-[200px]">
          <div class="flex items-center gap-3 mb-2">
            <img src="{{ asset('images/sepedaetam-logo.png') }}" alt="Sepeda Etam" class="h-12 w-auto object-contain">
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-[#0f172a]">Sewa sepeda <br class="sm:hidden"><span class="text-[#2563eb]">tanpa ribet</span></h1>
          </div>
          <p class="text-muted text-base md:text-lg max-w-xl leading-relaxed">Sepedaetam.tgr — penyewaan sepeda modern untuk Gen Z. <span class="hidden sm:inline">Harga transparan, booking cepat, dan sepeda terawat.</span></p>
          <div class="flex flex-wrap gap-3 mt-4">
            <div class="bg-soft-gray px-4 py-2 rounded-full text-sm font-medium flex items-center gap-2"><span class="w-2 h-2 bg-green-500 rounded-full"></span> 8 sepeda tersedia</div>
            <div class="bg-soft-gray px-4 py-2 rounded-full text-sm font-medium flex items-center gap-2">⏱️ 1 jam · 2 jam · 1 hari</div>
          </div>
          <div class="flex flex-wrap gap-3 mt-5">
            <a href="#kontak" class="btn-wa text-white font-semibold px-6 py-2.5 rounded-full shadow-sm flex items-center gap-2 text-sm">📱 Booking via WhatsApp</a>
            <a href="#katalog" class="btn-outline-dark text-sm font-medium px-6 py-2.5 rounded-full">Lihat katalog →</a>
          </div>
        </div>
        <div class="flex-1 min-w-[200px] bg-soft-gray rounded-2xl p-6 flex items-center justify-center aspect-[4/3] max-w-md mx-auto overflow-hidden">
          <img src="{{ asset('images/sepedaetam-logo.png') }}" alt="Sepeda Etam" class="w-full h-full object-contain scale-110">
        </div>
      </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
      <div class="bg-white rounded-2xl shadow-soft p-6 border border-soft">
        <h3 class="text-xl font-bold flex items-center gap-2"><span class="text-2xl">💎</span> Tarif fleksibel</h3>
        <ul class="mt-3 space-y-2 text-sm">
          <li class="flex items-center gap-3"><span class="w-8 h-8 bg-soft-gray rounded-full flex items-center justify-center text-sm font-bold">1</span> 1 jam — <span class="font-semibold">Rp10.000</span></li>
          <li class="flex items-center gap-3"><span class="w-8 h-8 bg-soft-gray rounded-full flex items-center justify-center text-sm font-bold">2</span> 2 jam — <span class="font-semibold">Rp18.000</span></li>
          <li class="flex items-center gap-3"><span class="w-8 h-8 bg-soft-gray rounded-full flex items-center justify-center text-sm font-bold">3</span> 1 hari — <span class="font-semibold">Rp55.000</span></li>
        </ul>
        <div class="mt-3 pt-3 border-t border-soft/70 text-sm flex items-center gap-3">
          <span class="w-8 h-8 bg-[#eef2ff] rounded-full flex items-center justify-center text-sm font-bold">⛑️</span>
          <span>Sewa helm — <span class="font-semibold">Rp3.000</span> (opsional)</span>
        </div>
        <p class="text-xs text-muted mt-3">⏱️ Tambahan per jam <span class="font-semibold">Rp10.000</span></p>
      </div>
      <div class="bg-white rounded-2xl shadow-soft p-6 border border-soft">
        <h3 class="text-xl font-bold flex items-center gap-2"><span class="text-2xl">⭐</span> Kenapa sewa di sini?</h3>
        <div class="grid grid-cols-2 gap-3 mt-3 text-sm">
          <div class="bg-soft-gray p-3 rounded-xl"><span class="block font-semibold">✅ Terawat</span><span class="text-xs text-muted">servis rutin</span></div>
          <div class="bg-soft-gray p-3 rounded-xl"><span class="block font-semibold">📱 Booking WA</span><span class="text-xs text-muted">cepat & mudah</span></div>
          <div class="bg-soft-gray p-3 rounded-xl"><span class="block font-semibold">🔄 Fleksibel</span><span class="text-xs text-muted">per jam / 2 jam / hari</span></div>
          <div class="bg-soft-gray p-3 rounded-xl"><span class="block font-semibold">⛑️ Helm tersedia</span><span class="text-xs text-muted">Rp3.000</span></div>
        </div>
      </div>
    </section>

    <section id="katalog" class="mb-12">
      <div class="flex items-center justify-between mb-5">
        <h2 class="text-2xl font-bold flex items-center gap-2"><span class="text-3xl">🚲</span> Katalog sepeda</h2>
        <span class="bg-[#2563eb]/10 text-[#2563eb] text-xs font-bold px-3 py-1.5 rounded-full">real-time</span>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($bikes as $bike)
        <div class="bg-white border border-soft rounded-xl p-5 card-hover">
          <div class="aspect-[4/3] bg-soft-gray rounded-xl flex items-center justify-center text-6xl mb-4 overflow-hidden">
            @if ($bike->photo_path)
              <img src="{{ file_exists(public_path('storage/' . $bike->photo_path)) ? asset('storage/' . $bike->photo_path) : asset('storage/' . $bike->photo_path) }}" alt="{{ $bike->name }}" class="w-full h-full object-cover">
            @else
              🚲
            @endif
          </div>
          <div class="flex justify-between items-start"><div><h3 class="font-bold text-lg">{{ $bike->name }}</h3><p class="text-xs text-muted">{{ $bike->description ?? '-' }}</p></div><span class="badge-pill {{ $bike->status === 'Tersedia' ? 'bg-green-100 text-green-700' : ($bike->status === 'Disewa' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700') }}">{{ $bike->status }}</span></div>
          <div class="flex flex-wrap gap-2 mt-3 text-xs font-medium"><span class="bg-soft-gray px-3 py-1.5 rounded-full">1 jam <span class="text-[#0f172a] font-semibold">Rp{{ number_format($bike->price_1h, 0, ',', '.') }}</span></span><span class="bg-soft-gray px-3 py-1.5 rounded-full">2 jam <span class="text-[#0f172a] font-semibold">Rp{{ number_format($bike->price_2h, 0, ',', '.') }}</span></span><span class="bg-soft-gray px-3 py-1.5 rounded-full">1 hari <span class="text-[#0f172a] font-semibold">Rp{{ number_format($bike->price_1day, 0, ',', '.') }}</span></span></div>
          <div class="mt-3 flex gap-2"><a href="#kontak" class="btn-wa text-white text-xs font-semibold px-4 py-2 rounded-full shadow-sm flex-1 text-center">Booking WA</a><button type="button" onclick="showBikeDetail(this)" data-name="{{ e($bike->name) }}" data-category="{{ e($bike->category ?? '-') }}" data-description="{{ e($bike->description ?? '-') }}" data-status="{{ e($bike->status) }}" data-price-1h="{{ $bike->price_1h }}" data-price-2h="{{ $bike->price_2h }}" data-price-1day="{{ $bike->price_1day }}" class="border border-soft text-xs px-3 py-2 rounded-full hover:bg-soft-gray transition flex-1 text-center">Detail</button></div>
        </div>
        @empty
        <div class="bg-white border border-soft rounded-xl p-5 card-hover col-span-full text-center text-sm text-muted">Belum ada sepeda.</div>
        @endforelse
      </div>
    </section>

    <section id="kontak" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
      <div class="bg-white rounded-2xl shadow-soft border border-soft p-4">
        <h3 class="text-lg font-bold flex items-center gap-2 mb-3"><span class="text-2xl">📍</span> Lokasi kami</h3>
        <div class="map-container"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.345678901234!2d117.1456789!3d-0.456789!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMHCwMjcnMjQuNSJTIDExN8KwMDgnNDUuMSJF!5e0!3m2!1sid!2sid!4v1712345678901" width="100%" height="220" style="border:0; display:block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        <p class="text-xs text-muted mt-2"><a href="https://maps.app.goo.gl/62gX2EidQGxjqGW26?g_st=iw" target="_blank" class="text-[#2563eb] hover:underline">📌 Buka di Google Maps →</a></p>
      </div>
      <div class="bg-white rounded-2xl shadow-soft border border-soft p-6">
        <h3 class="text-lg font-bold flex items-center gap-2 mb-3"><span class="text-2xl">📞</span> Admin</h3>
          <div class="space-y-2 text-sm">
          <div class="flex items-center gap-3 bg-soft-gray px-4 py-2.5 rounded-xl"><span class="font-semibold">Admin 1</span><a href="tel:081776393708" class="text-[#2563eb] hover:underline">0817-7639-3708</a><a href="https://wa.me/6281776393708" target="_blank" class="ml-auto btn-wa text-white text-xs font-semibold px-3 py-1 rounded-full">WA</a></div>
          <div class="flex items-center gap-3 bg-soft-gray px-4 py-2.5 rounded-xl"><span class="font-semibold">Admin 2</span><a href="tel:082217645783" class="text-[#2563eb] hover:underline">0822-1764-5783</a><a href="https://wa.me/6282217645783" target="_blank" class="ml-auto btn-wa text-white text-xs font-semibold px-3 py-1 rounded-full">WA</a></div>
          <div class="flex items-center gap-3 bg-soft-gray px-4 py-2.5 rounded-xl"><span class="font-semibold">Admin 3</span><a href="tel:082250804606" class="text-[#2563eb] hover:underline">0822-5080-4606</a><a href="https://wa.me/6282250804606" target="_blank" class="ml-auto btn-wa text-white text-xs font-semibold px-3 py-1 rounded-full">WA</a></div>
        </div>

      </div>
    </section>

    <section class="bg-white rounded-2xl shadow-soft p-6 md:p-8 border border-soft text-center">
      <h3 class="text-2xl font-bold">🚀 Siap bersepeda?</h3>
      <p class="text-muted text-sm max-w-md mx-auto mt-1">Booking sekarang via WhatsApp atau lihat katalog lengkap</p>
      <div class="flex flex-wrap justify-center gap-3 mt-4">
        <a href="#kontak" class="btn-wa text-white font-semibold px-8 py-3 rounded-full shadow-sm flex items-center gap-2 text-sm">📱 Booking via WhatsApp</a>
        <a href="#katalog" class="bg-[#0f172a] text-white font-semibold px-8 py-3 rounded-full shadow-sm hover:bg-[#1e293b] transition text-sm">Lihat semua sepeda</a>
      </div>
    </section>

    <section id="peraturan" class="bg-white rounded-2xl shadow-soft p-6 md:p-8 border border-soft mb-12">
      <div class="flex items-center gap-3 mb-4">
        <span class="text-3xl">🚲</span>
        <h2 class="text-2xl font-extrabold tracking-tight">PERATURAN &amp; KETENTUAN SEWA</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 text-sm">
        <div class="flex items-start gap-2 py-1.5 border-b border-soft/60"><span class="rule-icon">🪪</span> <span><strong>Jaminan:</strong> KTP / SIM / KTM.</span></div>
        <div class="flex items-start gap-2 py-1.5 border-b border-soft/60"><span class="rule-icon">🕐</span> <span><strong>Pengambilan:</strong> Sesuai jam booking.</span></div>
        <div class="flex items-start gap-2 py-1.5 border-b border-soft/60"><span class="rule-icon">⏰</span> <span><strong>Keterlambatan pengambilan:</strong> Toleransi maksimal <strong>5 menit</strong>. Lebih dari 5 menit, waktu sewa tetap dihitung dari jam booking.</span></div>
        <div class="flex items-start gap-2 py-1.5 border-b border-soft/60"><span class="rule-icon">🚲</span> <span><strong>Pengembalian:</strong> Sesuai paket sewa dan maksimal pukul <strong>22.30</strong>.</span></div>
        <div class="flex items-start gap-2 py-1.5 border-b border-soft/60"><span class="rule-icon">💰</span> <span><strong>Keterlambatan pengembalian:</strong> Lebih dari 15 menit dikenakan tambahan <strong>Rp10.000</strong>.</span></div>
        <div class="flex items-start gap-2 py-1.5 border-b border-soft/60"><span class="rule-icon">💳</span> <span><strong>DP 50% wajib</strong> untuk sewa <strong>lebih dari 2 sepeda</strong>.</span></div>
        <div class="flex items-start gap-2 py-1.5 border-b border-soft/60 md:border-b-0"><span class="rule-icon">🔧</span> <span><strong>Kerusakan atau kehilangan</strong> akibat kelalaian penyewa menjadi tanggung jawab penyewa.</span></div>
        <div class="flex items-start gap-2 py-1.5"><span class="rule-icon">📌</span> <span>Dengan melakukan booking, penyewa dianggap <strong>telah membaca dan menyetujui ketentuan sewa</strong>.</span></div>
      </div>
      <div class="mt-5 pt-4 border-t border-soft/70 text-center text-sm font-medium text-[#0f172a]">
        🔥 <span class="font-extrabold">SEPEDA ETAM</span> — Jangan Kemak, Gowes Dulu Sanak! 🚴
      </div>
    </section>

    <div id="bikeDetailModal" class="fixed inset-0 modal-overlay hidden items-center justify-center z-50">
      <div class="bg-white rounded-2xl shadow-xl p-6 max-w-lg w-full mx-4">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-bold">Detail sepeda</h3>
          <button type="button" onclick="document.getElementById('bikeDetailModal').classList.add('hidden')" class="text-muted hover:text-[#0f172a]"><i class="fas fa-times"></i></button>
        </div>
        <div class="space-y-2 text-sm">
          <div><span class="text-muted">Nama</span><div id="bikeDetailName" class="font-semibold"></div></div>
          <div><span class="text-muted">Kategori</span><div id="bikeDetailCategory" class="font-semibold"></div></div>
          <div><span class="text-muted">Status</span><div id="bikeDetailStatus" class="font-semibold"></div></div>
          <div><span class="text-muted">Deskripsi</span><div id="bikeDetailDescription" class="font-semibold"></div></div>
          <div><span class="text-muted">Tarif</span><div id="bikeDetailPrice" class="font-semibold"></div></div>
        </div>
      </div>
    </div>

  </main>
  <script>
    function showBikeDetail(button) {
      document.getElementById('bikeDetailName').textContent = button.dataset.name;
      document.getElementById('bikeDetailCategory').textContent = button.dataset.category;
      document.getElementById('bikeDetailStatus').textContent = button.dataset.status;
      document.getElementById('bikeDetailDescription').textContent = button.dataset.description;
      document.getElementById('bikeDetailPrice').textContent = '1 jam Rp' + Number(button.dataset.price1h).toLocaleString('id-ID') + ' · 2 jam Rp' + Number(button.dataset.price2h).toLocaleString('id-ID') + ' · 1 hari Rp' + Number(button.dataset.price1day).toLocaleString('id-ID');
      document.getElementById('bikeDetailModal').classList.remove('hidden');
      document.getElementById('bikeDetailModal').classList.add('flex');
    }
    document.getElementById('bikeDetailModal')?.addEventListener('click', function (e) { if (e.target === this) this.classList.add('hidden'); this.classList.remove('flex'); });
  </script>
</body>
</html>
