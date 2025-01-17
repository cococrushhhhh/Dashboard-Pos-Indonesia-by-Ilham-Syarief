<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Kantor Pos - Dashboard</title>
    <style>
        .status {
            color: black;
        }
        .dark .status {
            color: #fff;
        }   

        .status {
            color: black;
            font-size: 14px;
        }
        .switch-mode {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
            border-radius: 10px;
            background-color: #ddd;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .switch-mode:before,
        .switch-mode:after {
            content: "";
            display: block;
            position: absolute;
            top: 2px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .switch-mode:before {
            left: 2px;
            background-color: orange;
        }

        .switch-mode:after {
            right: 2px;
            background-color: orange;
            transform: scale(0);
        }
        .dark {
        background-color: #06060e;
        color: #fff;
        }

        .dark table {
            background-color: #0d0c1e;
        }

        input[type="checkbox"][id="switch-mode"]:checked+label.switch-mode {
            background-color: #5f9ea0;
        }

        input[type="checkbox"][id="switch-mode"]:checked+label.switch-mode:before {
            transform: translateX(20px);
        }

        input[type="checkbox"][id="switch-mode"]:checked+label.switch-mode:after {
            transform: scale(1);
        }

        .side-menu li.active a {
            color: orange;
        }

    </style>
</head>

<body>


    <!-- SIDEBAR -->
<section id="sidebar">
    <a href="dashboard1.php" class="brand"> 
        <img src="1.png" width="99"  alt="Building House" />

        <span class="text">Pos Indonesia</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="dashboard1.php">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>

        <li>
        <a href="#" id="analytics-link">
            <i class='bx bxs-doughnut-chart'></i>
            <span class="text">Tabel Penyaluran Beras</span>
        </a>
        </li>

        <li>
            <a href="#">
                <i class='bx bxs-group'></i>
                <span class="text">Team</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
        <a href="login1.php" class="logout" onclick="logout()">
            <i class='bx bxs-log-out-circle'></i>
            <span class="text">Logout</span>
        </a>
        </li>
    </ul>
    <input type="checkbox" id="switch-mode" hidden>
    <label for="switch-mode" class="switch-mode"></label>
</section>
<!-- SIDEBAR -->




    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
          
            <a href="#">Pencarian Penyaluran Beras</a>
            <form class="form-inline" action="search4.php" method="GET">
                <div class="form-input">
                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Masukkan NIK.." required style="font-family: Poppins;">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                    
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>


            </a>

            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download" onclick="exportToExcel()">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download Excel</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-group'></i>

                    <span class="text">
                        <h3>
                            <?php
                            // Assuming you have a database connection already established
                            $host = 'localhost';
                            $username = 'root';
                            $password = '';
                            $database = 'pdb';

                            $connection = mysqli_connect($host, $username, $password, $database);

                            // Check if the connection was successful
                            if (!$connection) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Query to fetch data from the database table "user1"
                            $query = "SELECT COUNT(*) as total_users FROM user1";

                            $result = mysqli_query($connection, $query);

                            $totalUsers = 0;

                            if (mysqli_num_rows($result) > 0) {
                                // Fetch the total number of users
                                $row = mysqli_fetch_assoc($result);
                                $totalUsers = $row['total_users'];
                            }

                            // Close the database connection
                            mysqli_close($connection);

                            echo $totalUsers;
                            ?>
                        </h3>
                        <p>Total Admin</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>
                            <?php
                            // Assuming you have a database connection already established
                            $host = 'localhost';
                            $username = 'root';
                            $password = '';
                            $database = 'pdb';

                            $connection = mysqli_connect($host, $username, $password, $database);

                            // Check if the connection was successful
                            if (!$connection) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Query to fetch data from the database table "pdb"
                            $query = "SELECT COUNT(*) as total_pdb FROM pdb";

                            $result = mysqli_query($connection, $query);

                            $totalPDB = 0;

                            if (mysqli_num_rows($result) > 0) {
                                // Fetch the total number of rows in "pdb" table
                                $row = mysqli_fetch_assoc($result);
                                $totalPDB = $row['total_pdb'];
                            }

                            // Close the database connection
                            mysqli_close($connection);

                            echo $totalPDB;
                            ?>
                        </h3>
                        <p>Jumlah Penerima Beras</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    
                    <span class="text">
                        <h3>
                        <span class="text">
                        <h3><?php echo getLoggedInUserCount(); ?></h3>
                      
                        </span>

                            <?php
                      

                            function getLoggedInUserCount()
                            {
                                // Assuming you have a database connection already established
                                $host = 'localhost';
                                $username = 'root';
                                $password = '';
                                $database = 'pdb';
                            
                                $connection = mysqli_connect($host, $username, $password, $database);
                            
                                // Check if the connection was successful
                                if (!$connection) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                            
                                // Query to fetch the count of logged-in users
                                $query = "SELECT COUNT(*) as total_logged_in_users FROM user1 WHERE username = 1";
                            
                                $result = mysqli_query($connection, $query);
                            
                                $loggedInUserCount = 0;
                            
                                if (mysqli_num_rows($result) > 0) {
                                    // Fetch the count of logged-in users
                                    $row = mysqli_fetch_assoc($result);
                                    $loggedInUserCount = $row['total_logged_in_users'];
                                }
                            
                                // Close the database connection
                                mysqli_close($connection);
                            
                                return $loggedInUserCount;
                            }
                            
                            ?>
                        </h3>
                        <p>Total Akun Yang Login</p>
                    </span>
                </li>
            </ul>
            
            <ul class="box-info">
                
                <li>
                    
                    <?php
                    // Assuming you have a database connection already established
                    $host = 'localhost';
                    $username = 'root';
                    $password = '';
                    $database = 'pdb';

                    $connection = mysqli_connect($host, $username, $password, $database);

                    // Check if the connection was successful
                    if (!$connection) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Query to fetch data from the database table "pdb"
                    $query = "SELECT COUNT(*) as total_valid FROM pdb WHERE status1 = 'valid'";
                    $result = mysqli_query($connection, $query);
                    $totalValid = 0;

                    if (mysqli_num_rows($result) > 0) {
                        // Fetch the total number of valid rows
                        $row = mysqli_fetch_assoc($result);
                        $totalValid = $row['total_valid'];
                    }

                    // Query to fetch data from the database table "pdb"
                    $query = "SELECT COUNT(*) as total_invalid FROM pdb WHERE status1 = 'Tidak Valid'";
                    $result = mysqli_query($connection, $query);
                    $totalInvalid = 0;

                    if (mysqli_num_rows($result) > 0) {
                        // Fetch the total number of invalid rows
                        $row = mysqli_fetch_assoc($result);
                        $totalInvalid = $row['total_invalid'];
                    }

                    // Close the database connection
                    mysqli_close($connection);
                    ?>
                    
                    <span class="text">
                        <h3><?php echo $totalValid; ?></h3>
                        <p>Valid</p>
                    </span>
                </li>
                <li>
                    <span class="text">
                        <h3><?php echo $totalInvalid; ?></h3>
                        <p>Tidak Valid</p>
                    </span>
                </li>
            </ul>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Data Penyaluran Beras</h3>
                    </div>
                    <table id="data-table">
                        <thead>
                            <tr>
                                <th>NAMA</th>
                                <th>NIK</th>
                                <th>TANGGAL CAIR</th>
                                <th>STATUS</th>
                                <th>KETERANGAN</th>
                               
                            </tr>
                        </thead>
                        <!-- Pop-up -->

                        <tbody>
                            <?php
                            // Assuming you have a database connection already established
                            $host = 'localhost';
                            $username = 'root';
                            $password = '';
                            $database = 'pdb';

                            $connection = mysqli_connect($host, $username, $password, $database);

                            // Check if the connection was successful
                            if (!$connection) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Query to fetch data from the database table "pdb"
                            $query = "SELECT NIK, NAMA, TANGGAL_CAIR,status1,keterangan FROM pdb";

                            $result = mysqli_query($connection, $query);

                            if (mysqli_num_rows($result) > 0) {
                                // Loop through each row of data
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Display the data in the table
                                    echo "<tr>";
                                    echo "<td>" . $row['NAMA'] . "</td>";
                                    echo "<td>" . $row['NIK'] . "</td>";
                                    echo "<td>" . $row['TANGGAL_CAIR'] . "</td>";
                                    echo "<td class='status'>" . $row['status1'] . "</td>";
                                    echo "<td>" . $row['keterangan'] . "</td>";
                                  
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No records found</td></tr>";
                            }

                            // Close the database connection
                            mysqli_close($connection);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Graphic Tanggal Cair</h3>
                    </div>
                    <canvas id="userCreationChart"></canvas>
                </div>
            </div>

            <?php
            $koneksi = mysqli_connect("localhost", "root", "", "pdb");
            if (!$koneksi) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }
            $query = "SELECT COUNT(*) AS total, status1 FROM datasampel1 GROUP BY status1";
            $result = mysqli_query($koneksi, $query);

            $validCount = 0;
            $invalidCount = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['status1'] == 'status1') {
                    $validCount = $row['total'];
                } else {
                    $invalidCount = $row['total'];
                }
            }

            ?>


            <?php
                // Assuming you have a database connection already established
                $host = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'pdb';

                $connection = mysqli_connect($host, $username, $password, $database);

                // Check if the connection was successful
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Query to fetch data from the database table "user1"
                $query = "SELECT DATE_FORMAT(TANGGAL_CAIR, '%Y-%m-%d') AS creation_date, COUNT(*) AS total_users FROM pdb GROUP BY DATE_FORMAT(TANGGAL_CAIR, '%Y-%m-%d')";

                $result = mysqli_query($connection, $query);

                $dates = [];
                $userCounts = [];

                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row of data
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Collect the dates and user counts
                        $dates[] = $row['creation_date'];
                        $userCounts[] = $row['total_users'];
                    }
                }

                // Close the database connection
                mysqli_close($connection);
                ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Retrieve the data from PHP
    const dates = <?php echo json_encode($dates); ?>;
    const userCounts = <?php echo json_encode($userCounts); ?>;

    // Create the chart
    const ctx = document.getElementById('userCreationChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        
        data: {
            labels: dates,
            datasets: [{
                label: 'Tanggal Cair',
                data: userCounts,
                backgroundColor: '#ff6600',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->



    

</body>
<script>
    
    // Ambil elemen menu "Analytics" dan elemen utama konten
const analyticsLink = document.getElementById("analytics-link");
const mainContent = document.getElementById("content");

// Tambahkan event listener saat menu "Analytics" diklik
analyticsLink.addEventListener("click", function(event) {
    event.preventDefault(); // Mencegah perilaku default dari tautan

    // Hapus kelas "active" dari semua elemen menu
    const menuItems = document.querySelectorAll("#sidebar .side-menu li");
    menuItems.forEach(function(item) {
        item.classList.remove("active");
    });

    // Tambahkan kelas "active" pada menu "Analytics"
    analyticsLink.parentElement.classList.add("active");

    // Ganti konten utama dengan konten "Analytics" yang diinginkan
    mainContent.innerHTML = "<h2>Analytics Page</h2><p>Ini adalah halaman Analytics.</p>";
});


   document.addEventListener("DOMContentLoaded", function() {
    // Ambil elemen menu "Dashboard", "Analytics", dan "Team"
    const dashboardMenu = document.querySelector("#sidebar .side-menu li:first-child");
    const analyticsMenu = document.querySelector("#sidebar .side-menu li:nth-child(2)");
    const teamMenu = document.querySelector("#sidebar .side-menu li:nth-child(3)");

    // Tambahkan event listener saat menu "Analytics" diklik
    analyticsMenu.addEventListener("click", function() {
        // Tambahkan class "active" pada menu "Analytics"
        analyticsMenu.classList.add("active");

        // Hapus class "active" dari menu "Dashboard" dan "Team"
        dashboardMenu.classList.remove("active");
        teamMenu.classList.remove("active");
    });

    // Tambahkan event listener saat menu "Team" diklik
    teamMenu.addEventListener("click", function() {
        // Tambahkan class "active" pada menu "Team"
        teamMenu.classList.add("active");

        // Hapus class "active" dari menu "Dashboard" dan "Analytics"
        dashboardMenu.classList.remove("active");
        analyticsMenu.classList.remove("active");
    });

    // Tambahkan event listener saat menu "Dashboard" diklik
    dashboardMenu.addEventListener("click", function() {
        // Tambahkan class "active" pada menu "Dashboard"
        dashboardMenu.classList.add("active");

        // Hapus class "active" dari menu "Analytics" dan "Team"
        analyticsMenu.classList.remove("active");
        teamMenu.classList.remove("active");
    });
     analyticsMenu.addEventListener("click", function() {
        // Hapus class "active" dari menu "Dashboard" dan "Team"
        dashboardMenu.classList.remove("active");
        teamMenu.classList.remove("active");

        // Fetch content from "search4.php" using AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Update the main content with the fetched content
                mainContent.innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "analytics.php", true);
        xhr.send();
    });
});
// Ambil elemen menu "Team"
const teamMenu = document.querySelector("#sidebar .side-menu li:nth-child(3)");

// Tambahkan event listener saat menu "Team" diklik
teamMenu.addEventListener("click", function() {
    // Fetch content from "https://reportinggln.posindonesia.co.id/login" using AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the main content with the fetched content
            mainContent.innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "search5.php", true);
    xhr.send();

    // Hapus class "active" dari menu "Dashboard" dan "Analytics"
    dashboardMenu.classList.remove("active");
    analyticsMenu.classList.remove("active");

    // Tambahkan class "active" pada menu "Team"
    teamMenu.classList.add("active");
});




// Ambil elemen switch mode dan elemen-elemen yang ingin diubah temanya
const switchMode = document.getElementById("switch-mode");
const body = document.body;
const navbar = document.querySelector("nav");
const table = document.getElementById("data-table");

// Tambahkan event listener saat switch mode berubah
switchMode.addEventListener("change", function() {
    // Periksa apakah switch mode dicentang atau tidak
    if (switchMode.checked) {
        // Tambahkan kelas "dark" pada elemen-elemen yang ingin diubah temanya
        body.classList.add("dark");
        navbar.classList.add("dark");
        table.classList.add("dark");
    } else {
        // Hapus kelas "dark" pada elemen-elemen yang ingin diubah temanya
        body.classList.remove("dark");
        navbar.classList.remove("dark");
        table.classList.remove("dark");
    }
});


function logout() {
    // Perform any necessary logout actions here
    // For example, clearing session data or redirecting to a login page

    // Reload the current page after logout
    location.reload();
}





// Tambahkan event listener untuk tombol tutup pada pop-up
document.getElementsByClassName("close-btn")[0].addEventListener("click", hidePopup);

function exportToExcel() {
    const table = document.getElementById("data-table");
    const rows = Array.from(table.getElementsByTagName("tr"));
    const csvContent = rows.map(row => Array.from(row.getElementsByTagName("td")).map(cell => cell.innerText)).join("\n");

    const blob = new Blob([csvContent], {
        type: "text/csv;charset=utf-8;"
    });

    const link = document.createElement("a");
    const url = URL.createObjectURL(blob);
    link.setAttribute("href", url);
    link.setAttribute("download", "data_provinsi_penyaluran_beras.csv");
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    
}


	</script>

</html>


