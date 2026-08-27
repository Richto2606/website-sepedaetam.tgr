<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'type' => ['required', 'in:Pemasukan,Pengeluaran'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:0'],
            'occurred_at' => ['required', 'date'],
        ]);

        Transaction::create($data);

        return redirect('/admin')->with('success', 'Transaksi tersimpan');
    }

    public function exportPdf(Request $request)
    {
        $period = $request->query('period', 'mingguan');
        $transactions = Transaction::latest('occurred_at')->get();

        $pdf = Pdf::loadView('exports.reports-pdf', compact('transactions', 'period'));

        return $pdf->download('laporan-sepedaetam.tgr-' . $period . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $period = $request->query('period', 'mingguan');

        return Excel::download(new class($period) implements \Maatwebsite\Excel\Concerns\FromCollection, \Maatwebsite\Excel\Concerns\WithHeadings {
            public function __construct(private string $period) {}

            public function collection()
            {
                return \App\Models\Transaction::latest('occurred_at')->get(['occurred_at', 'type', 'category', 'description', 'amount']);
            }

            public function headings(): array
            {
                return ['Tanggal', 'Jenis', 'Kategori', 'Deskripsi', 'Nominal'];
            }
        }, 'laporan-sepedaetam.tgr-' . $period . '.xlsx');
    }
}
