<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin · Sepedaetam.tgr</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
  <style> * { font-family: 'Inter', system-ui, sans-serif; } body { background: #f8fafc; } </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 text-[#0f172a]">
  <div class="w-full max-w-md bg-white border border-[#e9edf2] rounded-2xl shadow-lg p-6">
    <div class="text-center mb-6">
      <img src="{{ asset('images/sepedaetam-logo.png') }}" alt="Sepeda Etam" class="h-16 mx-auto object-contain">
      <div class="text-sm text-slate-500 mt-1">Admin login</div>
    </div>
    @if ($errors->any())
      <div class="mb-4 rounded-xl bg-red-50 text-red-700 text-sm p-3">Login gagal</div>
    @endif
    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
      @csrf
      <div>
        <label class="block text-xs font-semibold text-slate-500 mb-1">Username</label>
        <input name="username" value="{{ old('username') }}" class="w-full border border-slate-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#2563eb]" placeholder="">
      </div>
      <div>
        <label class="block text-xs font-semibold text-slate-500 mb-1">Password</label>
        <input type="password" name="password" class="w-full border border-slate-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#2563eb]" placeholder="">
      </div>
      <button class="w-full bg-[#0f172a] text-white font-semibold py-2.5 rounded-full hover:bg-[#1e293b]">Masuk</button>
    </form>
    <div class="text-xs text-slate-500 mt-4 text-center">Login admin</div>
  </div>
</body>
</html>
