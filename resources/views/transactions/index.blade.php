@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- <h2>Data Transaksi</h2> -->
                        </div>
                        <div class="flex">
                            <form method="GET" action="{{ route('transactions.index') }}" class="form-inline float-right">
                                <div class="form-group mx-sm-3">
                                    <input type="text" class="form-control" name="search" placeholder="Cari Nama Transaksi">
                                </div>
                                <div class="form-group mx-sm-3">
                                    <select class="form-control" name="category">
                                        <option value="">Semua Kategori</option>
                                        <option value="income">Income</option>
                                        <option value="expense">Expense</option>
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3">
                                    <input type="text" class="form-control" name="nominal" placeholder="Cari Nominal">
                                </div>
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Description</th>
                                <th>Code</th>
                                <th>Rate Euro</th>
                                <th>Date Paid</th>
                                <th>Category</th>
                                <th>Nominal</th>
                                <th>Nama Trasaksi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                               
                                    <td>{{ $transaction->description }}</td>
                                    <td>{{ $transaction->code }}</td>
                                    <td>{{ $transaction->rate_euro }}</td>
                                    <td>{{ $transaction->date_paid }}</td>
                                    <td>{{ $transaction->category }}</td>
                                    <td>{{ $transaction->nominal }}</td>
                                    <td>{{ $transaction->nama_transaksi }}</td>
                                    <td>
                                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <div class="pagination">
                        {{ $transactions->links() }}
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
