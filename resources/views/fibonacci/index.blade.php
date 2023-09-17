<!DOCTYPE html>
<html>
<head>
    <title>Fibonacci Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Fibonacci Calculator</h1>
        <a href="{{ url('/') }}">
         <- Back to Soal Test 1
        </a>
        <form method="POST" action="/fibonacci">
            @csrf
            <div class="form-group">
                <label for="n1">Bilangan Fibonacci ke-n1:</label>
                <input type="number" class="form-control" name="n1" required>
            </div>
            <div class="form-group">
                <label for="n2">Bilangan Fibonacci ke-n2:</label>
                <input type="number" class="form-control" name="n2" required>
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>

        @if(isset($result))
            <h2>Hasil: {{ $result }}</h2>
        @endif
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
