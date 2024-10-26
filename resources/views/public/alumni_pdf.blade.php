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
            text-align: center;
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
            padding: 3px;
            text-align: left;
            background-color: #1c8502;
            color: white;
        }

        .spup-text img {
            height: 50px;
            margin-right: 5px;
        }

        .text-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .border-green-bottom {
            border-bottom: 1px solid green;
        }

        .header-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem; /* Adjusted font size */
        }

        .container {
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
                        <h4 style="margin: 0; font-size: 1rem;">St. Paul University Philippines</h4>
                        <p style="margin: 0; font-size: .8rem;">Tuguegarao City, Cagayan 3500</p>
                    </div>
                </div>
                <h4 style="margin: 0; font-size: .9rem;">OFFICE OF ALUMNI AND EXTERNAL RELATIONS</h4>
            </div>
        </div>
    </div>
    <div class="container">
        @foreach ($grouped_users as $degree => $users)
        <h4 class="my-3">{{ ucfirst($degree) }}</h4>
        <table id="customers" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Age</th>
                    <th>Degree</th>
                    <th>Year Graduated</th>
                    <th>Employed</th>
                    <th>Place Of Work</th>
                    <th>Organization Type</th>
                    {{-- <th>Occupation</th> --}}
                    <th>Employment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->mobile_number }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->degree }}</td>
                    <td>{{ $user->year_graduated }}</td>
                    <td>{{ $user->employed }}</td>
                    <td>{{ $user->place_of_work }}</td>
                    <td>{{ $user->organization_type }}</td>
                    {{-- <td>{{ $user->occupation }}</td> --}}
                    <td>{{ $user->employment_status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
    </div>
</body>

</html>
