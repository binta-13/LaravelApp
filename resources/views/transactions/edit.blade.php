@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Transaksi</h2>
    <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
        @csrf
        @method('PUT') <!-- Menggunakan metode PUT untuk mengupdate data -->

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="{{ $transaction->description }}" required>
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" name="code" class="form-control" value="{{ $transaction->code }}" required>
        </div>
        <div class="form-group">
            <label for="rate_euro">Rate Euro</label>
            <input type="number" step="0.01" name="rate_euro" class="form-control" value="{{ $transaction->rate_euro }}" required>
        </div>
        <div class="form-group">
            <label for="date_paid">Date Paid</label>
            <input type="date" name="date_paid" class="form-control" value="{{ $transaction->date_paid }}" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control" required>
                <option value="income" @if ($transaction->category == 'income') selected @endif>Income</option>
                <option value="expense" @if ($transaction->category == 'expense') selected @endif>Expense</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nama_transaksi">Nama Transaksi</label>
            <input type="text" name="nama_transaksi" class="form-control" value="{{ $transaction->nama_transaksi }}"required>
        </div>
        <div class="form-group">
            <label for="nominal">Nominal</label>
            <input type="number" name="nominal" class="form-control" value="{{ $transaction->nominal }}" required>
        </div>
        <!-- Tambahkan input untuk data transaksi lainnya di sini -->
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
