<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Doa Harian</title>

    <style>
        .padding {
            padding-top: 70px;
        }

        .pd {
            padding-top: 30px;
            padding-bottom: 100px;
        }
    </style>

</head>
 
<body>
    <div class="container text-center padding">
        <h1>Doa Harian Lengkap</h1>
        <a href="/post-data">Post Data</a>
    </div>

    <div class="container text-center padding">
        <h1>Tambah Kategori</h1>
        <a href="/postingkate">nama_kategori</a>
    </div>

    <div class="text-center">
        <a href="/Ict">List Wisata</a>
    </div>

    <div class="container pd">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Doa</th>
                    <th scope="col">Ayat</th>
                    <th scope="col">Latin</th>
                    <th scope="col">Artinya</th>
                </tr>
            </thead>
            <tbody>
                @foreach($response as $re)
                <tr>
                    <th scope="row">{{$re['id']}}</th>
                    <td>{{$re['doa']}}</td>
                    <td>{{$re['ayat']}}</td>
                    <td>{{$re['latin']}}</td>
                    <td>{{$re['artinya']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>