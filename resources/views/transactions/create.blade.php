@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Transaksi Baru</h2>
        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" name="code" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rate_euro">Rate Euro</label>
                <input type="number" step="0.01" name="rate_euro" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_paid">Date Paid</label>
                <input type="date" name="date_paid" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" class="form-control" required>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_transaksi">Nama Transaksi</label>
                <input type="text" name="nama_transaksi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="number" name="nominal" class="form-control" required>
            </div>
            <!-- Tambah input untuk data transaksi lainnya di sini -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
