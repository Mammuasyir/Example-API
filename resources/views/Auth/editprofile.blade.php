<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>My Edit Profile</title>

    <style>
        .padding {
            padding: 100px 0 100px 0;
        }

        .custome {
            width: 40%;
            padding-top: 50px;
            margin-left: auto;
            margin-right: auto;
        }

        .mb-3 {
            text-align: left !important;
        }
    </style>

</head>

<body>
    <div class="container text-center padding">
        <h1>Edit Profile</h1>
        <a href="/">Back to Home</a>


        <div class="custome">
            <form action="{{route('update', $response['data']['id'])}}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="" class="form-label">Email address</label>
                    <input type="email" name="email" value="{{ $response['data']['email'] }}" class="form-control" id="" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $response['data']['name'] }}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Telp</label>
                    <input type="text" name="telp" class="form-control" id="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
        </div>
    </div>

</body>

</html>