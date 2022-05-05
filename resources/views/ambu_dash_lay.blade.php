<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>EMERGENO
    </title>
    <link rel="stylesheet" href="style/style3.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        color: black;
    }

    /* Float four columns side by side */
    .column6 {
        float: left;
        width: 30%;
        padding: 55px 70px;
    }

    /* Remove extra left and right margins, due to padding */
    .row6 {
        margin: 0 -5px;
    }

    /* Clear floats after the columns */
    .row6:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
        .column6 {
            width: 100%;
            display: block;
            margin-bottom: 20px;
        }
    }

    /* Style the counter cards */
    .card6 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 16px;
        text-align: center;
        background-color: #f1f1f1;
    }
    </style>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">

            <span class="logo_name">

                <img src="images/lg.png" width="260" height="70"
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />

            </span>

        </div>
        <ul class="nav-links">
            <li>
                <a href="dash.php" class="active">
                    <i class='bx bx-grid-alt bx-tada'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/dash_ambu">Dashboard</a></li>
                </ul>
            </li>
            <hr>
           
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bxs-ambulance bx-tada'></i>
                        <span class="link_name">Ambulance</span>

                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Ambulance</a></li>
                    <!-- <li><a href="#">Add Ambulance</a></li> -->
                    <li><a href="view_ambu.php">View Ambulance</a></li>
                    <!-- <li><a href="#">Request</a></li>
                    <li><a href="#">Request History</a></li> -->
                </ul>
            </li>
           
            <hr>
           


            <li>
                <a href="chngpass.php">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="chngpass.php">Setting</a></li>
                </ul>
            </li>
            <hr>
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log Out</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="logout.php">Log Out</a></li>
                </ul>

            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="home-content">
                <i class='bx bx-menu'></i>


                <div class="logout" style="float:right">

                    <i class='bx bxs-user-circle' style='font-size:58px;color:black;'></i>
                </div>
            </div>
        </nav>

        @yield('content'); 
        

    </section>
    
    <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");

    });
    </script>
</body>

</html>