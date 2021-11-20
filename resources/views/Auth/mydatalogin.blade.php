<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Data user</title>

    <style>
        .padding {
            padding-top: 100px;
        }

        .pd {
            padding-top: 30px;
            padding-bottom: 100px;
        }
    </style>

</head>

<body>
    <div class="container text-center padding">
        <a href="/">Back to Home</a>


        <div class="container text-center padding">
            <h1>Data User</h1>
        </div>

        <div class="container pd">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Photo</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{ $response['data']['id'] }}</td>
                        <td>{{ $response['data']['email'] }}</td>
                        <td>{{ $response['data']['name'] }}</td>
                        <td>{{ $response['data']['alamat'] }}</td>
                        <td>{{ $response['data']['telp'] }}</td>
                        <td>{{ $response['data']['photo'] }}</td>
                        <td width="270px" class="text-center">
                        <a href="/editprofile" class="btn btn-warning">edit</a>  
                        </td>
        </tr>
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