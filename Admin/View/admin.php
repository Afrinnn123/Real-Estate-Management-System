<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:wght@500&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">


    <?php include("header.php");?>
    <?php include("body.php");?>
</head>
<body>
    <div class="grid-container">
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                <span class="material-icons-outlined">search</span>
                <input type="text" id="live_search" placeholder="Search User" style="width: 200px; padding: 10px; background-color: mintcream;" autocomplete="off" placeholder="Search...">
                <div id="searchresult"></div>
            </div>

            <div class="header-right">
                <div class="dropdown">
                    <a href ="InboxView.php">
                     <span class="material-icons-outlined">chat</span>
                    </a>
                </div>
                <!--<span class="material-icons-outlined">account_circle</span> -->
                <form method="get" action="../Controller/logout.php">
                    <button type="submit" name="logout" class="logout-button">
                        <span class="material-icons-outlined logout-icon">logout</span>
                    </button> 
                </form>
                           
            </div>
        </header>

        <!--sidebar-->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                      <span class="material-icons-outlined">real_estate_agent</span>BDHomes Admin
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href ="admin.php">
                      <span class="material-icons-outlined">dashboard</span>DASHBOARD
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href ="buyer.php">
                       <span class="material-icons-outlined">person_2</span>BUYER
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href ="Admin_Display.php">
                       <span class="material-icons-outlined">check_circle</span>PROPERTY VERIFICATION
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="Password_change.php">
                      <span class="material-icons-outlined">settings</span>SETTINGS
                    </a>
                </li>
            </ul>
        </aside>


        <!--main-->

        <main class="main-container">
           <div class="main-title">
               <h2>DASHBOARD</h2>
           </div>

           <div class="main-cards">


                <div class="card">
                    <div class="card-inner">
                        <h3>TOTAL PROPERTIES</h3>
                        <span class="material-icons-outlined">apartment</span>
                    </div>
                    <?php
                    require_once('../Model/db.php');
                    $conn=getConnection();
                    $query1 = "SELECT COUNT(*) AS total_property FROM Property";
                    $query1_run = mysqli_query($conn, $query1);
                    $row1 = mysqli_fetch_assoc($query1_run);
                    $total_property  = $row1['total_property'];
                    echo '<h1>' . $total_property . '</h1>';
                    ?>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <h3>TOTAL BUYER</h3>
                        <span class="material-icons-outlined">person_2</span>
                    </div>
                    <?php
                    require_once('../Model/db.php');
                    $conn=getConnection();
                    $query1 = "SELECT COUNT(*) AS total_buyer FROM B_Reg";
                    $query1_run = mysqli_query($conn, $query1);
                    $row1 = mysqli_fetch_assoc($query1_run);
                    $total_buyer  = $row1['total_buyer'];
                    echo '<h1>' . $total_buyer . '</h1>';
                    ?>
                </div>


                <div class="card">
                    <div class="card-inner">
                        <h3>TOTAL SELLER</h3>
                        <span class="material-icons-outlined">sell</span>
                    </div>
                    <?php
                    require_once('../Model/db.php');
                    $conn=getConnection();
                    $query1 = "SELECT COUNT(*) AS total_seller FROM S_Reg";
                    $query1_run = mysqli_query($conn, $query1);
                    $row1 = mysqli_fetch_assoc($query1_run);
                    $total_seller  = $row1['total_seller'];
                    echo '<h1>' . $total_seller . '</h1>';
                    ?>
                </div>


                <div class="card">
                    <div class="card-inner">
                        <h3>TOTAL AGENT</h3>
                        <span class="material-icons-outlined">support_agent</span>         
                    </div>
                    <?php
                    require_once('../Model/db.php');
                    $conn=getConnection();
                    $query1 = "SELECT COUNT(*) AS total_agent FROM agent";
                    $query1_run = mysqli_query($conn, $query1);
                    $row1 = mysqli_fetch_assoc($query1_run);
                    $total_agent  = $row1['total_agent'];
                    echo '<h1>' . $total_agent  . '</h1>';
                    ?>


                </div>

               
           </div>

            <div class="charts">

              <div class="charts-card">
                 <h2 class="chart-title">Net Operating Income</h2>
                 <div id="bar-chart"></div>
              </div>

              <!--<div class="charts-card">
                  <h2 class="chart-title">Fao</h2>
                  <div id="area-chart"></div>
              </div>-->

              <div class="live-time-container">
                <p id="live-time"></p>
              </div>

            </div>

        </main>



    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <script src="../js/scripts.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="../js/live_clock.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input =$(this).val();
                //alert(input);
                if(input!= ""){
                    $.ajax({
                      url: "../Controller/livesearch.php",
                      method: "POST",
                      data: { input: input },
                      success: function (data) {
                      $("#searchresult").html(data);
                      $("#searchresult").css("display", "block");
                    }
                   });

                        
                }
                else
                {
                    $("#searchresult").html("");
                    $("#searchresult").css("display","none");
                }
                
            });
        });
    </script>
</body>
</html>
