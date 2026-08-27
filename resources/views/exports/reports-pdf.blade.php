<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #0f172a; }
    h1 { font-size: 18px; margin: 0 0 8px; }
    .muted { color: #64748b; font-size: 10px; }
    table { width: 100%; border-collapse: collapse; margin-top: 16px; }
    th, td { border: 1px solid #e2e8f0; padding: 8px; text-align: left; }
    th { background: #f8fafc; }
    .right { text-align: right; }
  </style>
</head>
<body>
  <h1>Laporan Sepedaetam.tgr</h1>
  <div class="muted">Periode: {{ ucfirst($period) }}</div>
  <table>
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Jenis</th>
        <th>Kategori</th>
        <th>Deskripsi</th>
        <th class="right">Nominal</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($transactions as $transaction)
        <tr>
          <td>{{ $transaction->occurred_at->format('d/m/Y') }}</td>
          <td>{{ $transaction->type }}</td>
          <td>{{ $transaction->category }}</td>
          <td>{{ $transaction->description }}</td>
          <td class="right">Rp{{ number_format($transaction->amount, 0, ',', '.') }}</td>
        </tr>
      @empty
        <tr><td colspan="5">Belum ada transaksi</td></tr>
      @endforelse
    </tbody>
  </table>
</body>
</html>
