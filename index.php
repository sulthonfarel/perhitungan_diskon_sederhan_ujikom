<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskon Sederhana</title>
    <link rel = "stylesheet" href = "bootstrap.min.css">
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="mb-3">Aplikasi Diskon Sederhana</h2>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="harga">Harga : </label>
                        <input type="number" class="form-control mb-3" id="harga" name="harga" required>
                        <label for="harga">Diskon : </label>
                        <input type="number" class="form-control mb-3" id="diskon" name="diskon" required>
                        <input type="submit" value="Hitung Diskon" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>    
</body>
</html>