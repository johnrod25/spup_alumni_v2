<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #1c8502;
            color: white;
        }

        .navbar-brand {
            color: #000;
            font-size: 25px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
            /* background: #000; */
        }

        a img {
            height: 50px;
            margin-right: 10px;
        }
        .text-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="header container-fluid d-flex justify-content-center p-2 bg-warning">
        <a class="navbar-brand text-center">
            <img src="https://th.bing.com/th/id/OIP.uQoteXTXqkcjTRP3A2VJ2wHaHa?rs=1&pid=ImgDetMain"
                alt="..."> <span class="logo-text mx-3" style="font-size: 1.5rem">ST. PAUL UNIVERSITY
                PHILIPPINES</span></a>
    </div>
    <div class="container">
        <h2 style="text-align: center">Alumni List</h2>
        @foreach ($grouped_users as $degree => $users)
            <h3 class="my-3">{{ ucfirst($degree) }}</h3>
            <table id="customers" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Home Address</th>
                        <th>Batch</th>
                        <th>Year Graduated</th>
                        {{-- <th>Degree</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->home_address }}</td>
                            <td>{{ $user->batch }}</td>
                            <td>{{ $user->year_graduated }}</td>
                            {{-- <td>{{ $user->degree }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
    {{-- 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}

</body>

</html>
