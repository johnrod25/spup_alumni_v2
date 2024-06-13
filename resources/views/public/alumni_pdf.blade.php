<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-size: .7rem;
        }
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            max-width: 100vh;

        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 3px 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            /* padding-top: 12px; */
            padding: 3px;
            text-align: left;
            background-color: #1c8502;
            color: white;
        }

        .spup-text img {
            height: 60px;
            margin-right: 10px;
        }
        .text-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .border-green-bottom {
            border-bottom: 1px solid green;
            /* width: 100%; */
        }
        .header-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
        }
        .container {
            /* width: 90%; */
            /* font-size: 1.2rem; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .spup-text {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container border-green-bottom">
        <a class=" text-center">
            <div class="header-text">
                <div class="spup-text">
                    <img src="https://clipground.com/images/saint-pauls-university-clipart-4.jpg" alt="...">
                    <div>
                        <h3>St. Paul University Philippines</h3>
                        <p>Tuguegarao City, Cagayan 3500</p>
                    </div>
                </div>
                <h3>OFFICE OF ALUMNI AND EXTERNAL RELATIONS</h3>
            </div>
    </div>
    <div class="container">
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
                    @foreach ($users as $index=>$user)
                        <tr>
                            <td>{{ $index+1 }}</td>
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
