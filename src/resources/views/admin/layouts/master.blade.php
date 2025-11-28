<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Admin Dashboard for managing users, settings, reports and system configurations. Fast, secure and responsive design.">
    <meta name="keywords"
        content="admin dashboard, admin panel, management system, responsive admin, bootstrap dashboard">
    <meta name="author" content="Your Name or Company">

    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="Admin Dashboard">
    <meta property="og:description" content="A modern and responsive admin dashboard built with Bootstrap.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://yourdomain.com/admin">
    <meta property="og:image" content="https://yourdomain.com/assets/images/dashboard-og.png">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Admin Dashboard">
    <meta name="twitter:description" content="A clean and scalable admin dashboard built with Bootstrap.">
    <meta name="twitter:image" content="https://yourdomain.com/assets/images/dashboard-og.png">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('vendor/enotification/assets/images/favicon.png') }}">


    <!-- Bootstrap CSS -->
    <link href="{{ asset('vendor/enotification/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="{{ asset('vendor/enotification/assets/vendor/bootstrap/css/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- extra plugin css -->
    @stack('include-css')


    <!-- Main css -->
    <link href="{{ asset('vendor/enotification/assets/css/main.css') }}" rel="stylesheet">

    <!-- Responsive -->
    <link href="{{ asset('vendor/enotification/assets/css/responsive.css') }}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <!-- Left Sidebar -->
        @include('enotification::admin.includes.left-sidebar')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Top Navigation -->
            @include('enotification::admin.includes.top-bar')
            <!-- Main Content Area -->
            <div id="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0 text-gray-800">Dashboard Overview</h3>
                    <button class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-download"></i>
                        <span class="d-none d-sm-inline">Download Report</span>
                    </button>
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="{{ asset('vendor/enotification/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Jquery js -->
    <script src="{{ asset('vendor/enotification/assets/js/jquery-3.7.0.min.js') }}"></script>
    <!-- moment js -->
    <script src="{{ asset('vendor/enotification/assets/js/moment.min.js') }}"></script>

    <!-- extra plugin js -->
    @stack('include-js')

    <!-- Main js -->
    <script src="{{ asset('vendor/enotification/assets/js/main.js') }}"></script>


    <script>
        addEventListener('DOMContentLoaded', () => {
            let table = new DataTable('#myTable', {

                "data": [{
                        "id": "1",
                        "name": "Tiger Nixon",
                        "position": "System Architect",
                        "salary": "$320,800",
                        "start_date": "2011-04-25",
                        "office": "Edinburgh",
                        "extn": "5421"
                    },
                    {
                        "id": "2",
                        "name": "Garrett Winters",
                        "position": "Accountant",
                        "salary": "$170,750",
                        "start_date": "2011-07-25",
                        "office": "Tokyo",
                        "extn": "8422"
                    },
                    {
                        "id": "3",
                        "name": "Ashton Cox",
                        "position": "Junior Technical Author",
                        "salary": "$86,000",
                        "start_date": "2009-01-12",
                        "office": "San Francisco",
                        "extn": "1562"
                    },
                    {
                        "id": "4",
                        "name": "Cedric Kelly",
                        "position": "Senior Javascript Developer",
                        "salary": "$433,060",
                        "start_date": "2012-03-29",
                        "office": "Edinburgh",
                        "extn": "6224"
                    },
                    {
                        "id": "5",
                        "name": "Airi Satou",
                        "position": "Accountant",
                        "salary": "$162,700",
                        "start_date": "2008-11-28",
                        "office": "Tokyo",
                        "extn": "5407"
                    },
                    {
                        "id": "6",
                        "name": "Brielle Williamson",
                        "position": "Integration Specialist",
                        "salary": "$372,000",
                        "start_date": "2012-12-02",
                        "office": "New York",
                        "extn": "4804"
                    },
                    {
                        "id": "7",
                        "name": "Herrod Chandler",
                        "position": "Sales Assistant",
                        "salary": "$137,500",
                        "start_date": "2012-08-06",
                        "office": "San Francisco",
                        "extn": "9608"
                    },
                    {
                        "id": "8",
                        "name": "Rhona Davidson",
                        "position": "Integration Specialist",
                        "salary": "$327,900",
                        "start_date": "2010-10-14",
                        "office": "Tokyo",
                        "extn": "6200"
                    },
                    {
                        "id": "9",
                        "name": "Colleen Hurst",
                        "position": "Javascript Developer",
                        "salary": "$205,500",
                        "start_date": "2009-09-15",
                        "office": "San Francisco",
                        "extn": "2360"
                    },
                    {
                        "id": "10",
                        "name": "Sonya Frost",
                        "position": "Software Engineer",
                        "salary": "$103,600",
                        "start_date": "2008-12-13",
                        "office": "Edinburgh",
                        "extn": "1667"
                    },
                    {
                        "id": "11",
                        "name": "Jena Gaines",
                        "position": "Office Manager",
                        "salary": "$90,560",
                        "start_date": "2008-12-19",
                        "office": "London",
                        "extn": "3814"
                    },
                    {
                        "id": "12",
                        "name": "Quinn Flynn",
                        "position": "Support Lead",
                        "salary": "$342,000",
                        "start_date": "2013-03-03",
                        "office": "Edinburgh",
                        "extn": "9497"
                    },
                    {
                        "id": "13",
                        "name": "Charde Marshall",
                        "position": "Regional Director",
                        "salary": "$470,600",
                        "start_date": "2008-10-16",
                        "office": "San Francisco",
                        "extn": "6741"
                    },
                    {
                        "id": "14",
                        "name": "Haley Kennedy",
                        "position": "Senior Marketing Designer",
                        "salary": "$313,500",
                        "start_date": "2012-12-18",
                        "office": "London",
                        "extn": "3597"
                    },
                    {
                        "id": "15",
                        "name": "Tatyana Fitzpatrick",
                        "position": "Regional Director",
                        "salary": "$385,750",
                        "start_date": "2010-03-17",
                        "office": "London",
                        "extn": "1965"
                    },
                    {
                        "id": "16",
                        "name": "Michael Silva",
                        "position": "Marketing Designer",
                        "salary": "$198,500",
                        "start_date": "2012-11-27",
                        "office": "London",
                        "extn": "1581"
                    },
                    {
                        "id": "17",
                        "name": "Paul Byrd",
                        "position": "Chief Financial Officer (CFO)",
                        "salary": "$725,000",
                        "start_date": "2010-06-09",
                        "office": "New York",
                        "extn": "3059"
                    },
                    {
                        "id": "18",
                        "name": "Gloria Little",
                        "position": "Systems Administrator",
                        "salary": "$237,500",
                        "start_date": "2009-04-10",
                        "office": "New York",
                        "extn": "1721"
                    },
                    {
                        "id": "19",
                        "name": "Bradley Greer",
                        "position": "Software Engineer",
                        "salary": "$132,000",
                        "start_date": "2012-10-13",
                        "office": "London",
                        "extn": "2558"
                    },
                    {
                        "id": "20",
                        "name": "Dai Rios",
                        "position": "Personnel Lead",
                        "salary": "$217,500",
                        "start_date": "2012-09-26",
                        "office": "Edinburgh",
                        "extn": "2290"
                    },
                    {
                        "id": "21",
                        "name": "Jenette Caldwell",
                        "position": "Development Lead",
                        "salary": "$345,000",
                        "start_date": "2011-09-03",
                        "office": "New York",
                        "extn": "1937"
                    },
                    {
                        "id": "22",
                        "name": "Yuri Berry",
                        "position": "Chief Marketing Officer (CMO)",
                        "salary": "$675,000",
                        "start_date": "2009-06-25",
                        "office": "New York",
                        "extn": "6154"
                    },
                    {
                        "id": "23",
                        "name": "Caesar Vance",
                        "position": "Pre-Sales Support",
                        "salary": "$106,450",
                        "start_date": "2011-12-12",
                        "office": "New York",
                        "extn": "8330"
                    },
                    {
                        "id": "24",
                        "name": "Doris Wilder",
                        "position": "Sales Assistant",
                        "salary": "$85,600",
                        "start_date": "2010-09-20",
                        "office": "Sydney",
                        "extn": "3023"
                    },
                    {
                        "id": "25",
                        "name": "Angelica Ramos",
                        "position": "Chief Executive Officer (CEO)",
                        "salary": "$1,200,000",
                        "start_date": "2009-10-09",
                        "office": "London",
                        "extn": "5797"
                    },
                    {
                        "id": "26",
                        "name": "Gavin Joyce",
                        "position": "Developer",
                        "salary": "$92,575",
                        "start_date": "2010-12-22",
                        "office": "Edinburgh",
                        "extn": "8822"
                    },
                    {
                        "id": "27",
                        "name": "Jennifer Chang",
                        "position": "Regional Director",
                        "salary": "$357,650",
                        "start_date": "2010-11-14",
                        "office": "Singapore",
                        "extn": "9239"
                    },
                    {
                        "id": "28",
                        "name": "Brenden Wagner",
                        "position": "Software Engineer",
                        "salary": "$206,850",
                        "start_date": "2011-06-07",
                        "office": "San Francisco",
                        "extn": "1314"
                    },
                    {
                        "id": "29",
                        "name": "Fiona Green",
                        "position": "Chief Operating Officer (COO)",
                        "salary": "$850,000",
                        "start_date": "2010-03-11",
                        "office": "San Francisco",
                        "extn": "2947"
                    },
                    {
                        "id": "30",
                        "name": "Shou Itou",
                        "position": "Regional Marketing",
                        "salary": "$163,000",
                        "start_date": "2011-08-14",
                        "office": "Tokyo",
                        "extn": "8899"
                    },
                    {
                        "id": "31",
                        "name": "Michelle House",
                        "position": "Integration Specialist",
                        "salary": "$95,400",
                        "start_date": "2011-06-02",
                        "office": "Sydney",
                        "extn": "2769"
                    },
                    {
                        "id": "32",
                        "name": "Suki Burks",
                        "position": "Developer",
                        "salary": "$114,500",
                        "start_date": "2009-10-22",
                        "office": "London",
                        "extn": "6832"
                    },
                    {
                        "id": "33",
                        "name": "Prescott Bartlett",
                        "position": "Technical Author",
                        "salary": "$145,000",
                        "start_date": "2011-05-07",
                        "office": "London",
                        "extn": "3606"
                    },
                    {
                        "id": "34",
                        "name": "Gavin Cortez",
                        "position": "Team Leader",
                        "salary": "$235,500",
                        "start_date": "2008-10-26",
                        "office": "San Francisco",
                        "extn": "2860"
                    },
                    {
                        "id": "35",
                        "name": "Martena Mccray",
                        "position": "Post-Sales support",
                        "salary": "$324,050",
                        "start_date": "2011-03-09",
                        "office": "Edinburgh",
                        "extn": "8240"
                    },
                    {
                        "id": "36",
                        "name": "Unity Butler",
                        "position": "Marketing Designer",
                        "salary": "$85,675",
                        "start_date": "2009-12-09",
                        "office": "San Francisco",
                        "extn": "5384"
                    },
                    {
                        "id": "37",
                        "name": "Howard Hatfield",
                        "position": "Office Manager",
                        "salary": "$164,500",
                        "start_date": "2008-12-16",
                        "office": "San Francisco",
                        "extn": "7031"
                    },
                    {
                        "id": "38",
                        "name": "Hope Fuentes",
                        "position": "Secretary",
                        "salary": "$109,850",
                        "start_date": "2010-02-12",
                        "office": "San Francisco",
                        "extn": "6318"
                    },
                    {
                        "id": "39",
                        "name": "Vivian Harrell",
                        "position": "Financial Controller",
                        "salary": "$452,500",
                        "start_date": "2009-02-14",
                        "office": "San Francisco",
                        "extn": "9422"
                    },
                    {
                        "id": "40",
                        "name": "Timothy Mooney",
                        "position": "Office Manager",
                        "salary": "$136,200",
                        "start_date": "2008-12-11",
                        "office": "London",
                        "extn": "7580"
                    },
                    {
                        "id": "41",
                        "name": "Jackson Bradshaw",
                        "position": "Director",
                        "salary": "$645,750",
                        "start_date": "2008-09-26",
                        "office": "New York",
                        "extn": "1042"
                    },
                    {
                        "id": "42",
                        "name": "Olivia Liang",
                        "position": "Support Engineer",
                        "salary": "$234,500",
                        "start_date": "2011-02-03",
                        "office": "Singapore",
                        "extn": "2120"
                    },
                    {
                        "id": "43",
                        "name": "Bruno Nash",
                        "position": "Software Engineer",
                        "salary": "$163,500",
                        "start_date": "2011-05-03",
                        "office": "London",
                        "extn": "6222"
                    },
                    {
                        "id": "44",
                        "name": "Sakura Yamamoto",
                        "position": "Support Engineer",
                        "salary": "$139,575",
                        "start_date": "2009-08-19",
                        "office": "Tokyo",
                        "extn": "9383"
                    },
                    {
                        "id": "45",
                        "name": "Thor Walton",
                        "position": "Developer",
                        "salary": "$98,540",
                        "start_date": "2013-08-11",
                        "office": "New York",
                        "extn": "8327"
                    },
                    {
                        "id": "46",
                        "name": "Finn Camacho",
                        "position": "Support Engineer",
                        "salary": "$87,500",
                        "start_date": "2009-07-07",
                        "office": "San Francisco",
                        "extn": "2927"
                    },
                    {
                        "id": "47",
                        "name": "Serge Baldwin",
                        "position": "Data Coordinator",
                        "salary": "$138,575",
                        "start_date": "2012-04-09",
                        "office": "Singapore",
                        "extn": "8352"
                    },
                    {
                        "id": "48",
                        "name": "Zenaida Frank",
                        "position": "Software Engineer",
                        "salary": "$125,250",
                        "start_date": "2010-01-04",
                        "office": "New York",
                        "extn": "7439"
                    },
                    {
                        "id": "49",
                        "name": "Zorita Serrano",
                        "position": "Software Engineer",
                        "salary": "$115,000",
                        "start_date": "2012-06-01",
                        "office": "San Francisco",
                        "extn": "4389"
                    },
                    {
                        "id": "50",
                        "name": "Jennifer Acosta",
                        "position": "Junior Javascript Developer",
                        "salary": "$75,650",
                        "start_date": "2013-02-01",
                        "office": "Edinburgh",
                        "extn": "3431"
                    },
                    {
                        "id": "51",
                        "name": "Cara Stevens",
                        "position": "Sales Assistant",
                        "salary": "$145,600",
                        "start_date": "2011-12-06",
                        "office": "New York",
                        "extn": "3990"
                    },
                    {
                        "id": "52",
                        "name": "Hermione Butler",
                        "position": "Regional Director",
                        "salary": "$356,250",
                        "start_date": "2011-03-21",
                        "office": "London",
                        "extn": "1016"
                    },
                    {
                        "id": "53",
                        "name": "Lael Greer",
                        "position": "Systems Administrator",
                        "salary": "$103,500",
                        "start_date": "2009-02-27",
                        "office": "London",
                        "extn": "6733"
                    },
                    {
                        "id": "54",
                        "name": "Jonas Alexander",
                        "position": "Developer",
                        "salary": "$86,500",
                        "start_date": "2010-07-14",
                        "office": "San Francisco",
                        "extn": "8196"
                    },
                    {
                        "id": "55",
                        "name": "Shad Decker",
                        "position": "Regional Director",
                        "salary": "$183,000",
                        "start_date": "2008-11-13",
                        "office": "Edinburgh",
                        "extn": "6373"
                    },
                    {
                        "id": "56",
                        "name": "Michael Bruce",
                        "position": "Javascript Developer",
                        "salary": "$183,000",
                        "start_date": "2011-06-27",
                        "office": "Singapore",
                        "extn": "5384"
                    },
                    {
                        "id": "57",
                        "name": "Donna Snider",
                        "position": "Customer Support",
                        "salary": "$112,000",
                        "start_date": "2011-01-25",
                        "office": "New York",
                        "extn": "4226"
                    }
                ],

                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'position'
                    },
                    {
                        data: 'office'
                    },
                    {
                        data: 'extn'
                    },
                    {
                        data: 'start_date'
                    },
                    {
                        data: 'salary'
                    }
                ],
                scrollY: "400px",
                scrollCollapse: true
            });
        });
    </script>



</body>

</html>
