<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data pencarian dari input form
        $search = $request->input('search');
        $category = $request->input('category');
        $nominal = $request->input('nominal');

        // Query builder untuk mencari transaksi berdasarkan nama transaksi, nominal, dan kategori
        $query = Transaction::query();

        if (!empty($search)) {
            $query->where('nama_transaksi', 'like', '%' . $search . '%');
        }

        if (!empty($category)) {
            $query->where('category', $category);
        }

        if (!empty($nominal)) {
            $query->where('nominal', 'like', '%' . $nominal . '%');
        }

        // Eksekusi query dan ambil hasil
        $transactions = $query->simplePaginate(10);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
{
    try {
        $this->validate($request, [
            'description' => 'string|max:255',
            'code' => 'string|max:255',
            'rate_euro' => 'numeric|max:25',
            'date_paid' => 'date',
            'category' => 'in:income,expense',
            'nama_transaksi' => 'string|max:255',
            'nominal' => 'numeric',
        ]);

        $transaction = new Transaction([
            'description' => $request->input('description'),
            'code' => $request->input('code'),
            'rate_euro' => $request->input('rate_euro'),
            'date_paid' => $request->input('date_paid'),
            'category' => $request->input('category'),
            'nama_transaksi' => $request->input('nama_transaksi'),
            'nominal' => $request->input('nominal'),
        ]);

        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    } catch (\Exception $e) {
        // Tangani kesalahan di sini, misalnya dengan memunculkan pesan kesalahan atau melakukan tindakan lain.
        return redirect()->route('transactions.create')->with('error', 'Gagal menambahkan transaksi: ' . $e->getMessage());
    }
}


    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'string|max:255',
            'code' => 'string|max:255',
            'rate_euro' => 'numeric|max:25',
            'date_paid' => 'date',
            'category' => 'in:income,expense',
            'name_transaksi' => 'srting|max:255',
            'nominal' => 'numeric|max:25'
        ]);

        $transaction = Transaction::find($id);
        $transaction->description = $request->input('description');
        $transaction->code = $request->input('code');
        $transaction->rate_euro = $request->input('rate_euro');
        $transaction->date_paid = $request->input('date_paid');
        $transaction->category = $request->input('category');
        $transaction->nama_transaksi = $request->input('nama_transaksi');
        $transaction->nominal = $request->input('nominal');


        // Tambahkan data transaksi lainnya sesuai kebutuhan

        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
