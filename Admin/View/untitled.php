<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:wght@500&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: mintcream;
            color: black;
            font-family: "Afacad";
        }

        .material-icons-outlined {
            vertical-align: middle;
            line-height: 1px;
            font-size: 35px;
            color: black;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 260px 1fr 1fr 1fr;
            grid-template-rows: 0.2fr 3fr;
            grid-template-areas: "sidebar header header header" "sidebar main main main";
            height: 100vh;
        }

        /* Header */
        .header {
            grid-area: header;
            height: 70px;
            background-color: royalblue;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px 0 30px;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        #searchresult {
            display: none;
            position: absolute;
            width: 200px; /* Adjust as needed */
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1;
            top: 100%; /* Position it below the search box */
            left: 0; /* Align with the left edge of the search box */
        }

       .search-result-item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ccc;
        }

        .search-result-item:hover {
              background-color: rgba(255, 255, 255, 0.4);
        }


        .logout-button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .logout-icon {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .menu-icon {
            display: none;
        }

        /* Sidebar */
        #sidebar {
            grid-area: sidebar;
            height: 100%;
            background-color: powderblue;
            overflow-y: auto;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
        }

        .sidebar-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 30px 30px 30px;
            margin-bottom: 30px;
        }

        .sidebar-title > span {
            display: none;
        }

        .sidebar-brand {
            margin-top: 15px;
            font-size: 20px;
            font-weight: 700;
        }

        .sidebar-list {
            padding: 0;
            margin-top: 15px;
            list-style-type: none;
        }

        .sidebar-list-item {
            padding: 20px 20px 20px 20px;
            font-size: 18px;
        }

        .sidebar-list-item:hover {
            background-color: rgba(255, 255, 255, 0.4);
            cursor: pointer;
        }

        .sidebar-list-item > a {
            text-decoration: none;
            color: black;
        }

        /* Main */
        .main-container {
            grid-area: main;
            overflow-y: auto;
            background-color: mintcream;
            padding: 20px 20px;
        }

        .main-title {
            display: flex;
            justify-content: center;
        }

        .main-cards {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 20px;
            margin: 20px 0;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 25px;
            border-radius: 5px;
        }

        .card:first-child {
            background-color: lightcoral;
        }

        .card:nth-child(2) {
            background-color: lightseagreen;
        }

        .card:nth-child(3) {
            background-color: mediumpurple;
        }

        .card:nth-child(4) {
            background-color: goldenrod;
        }

        .card-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-inner > .material-icons-outlined {
            font-size: 40px;
        }

    </style>
</head>
<body>
    <div class="grid-container">
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                <span class="material-icons-outlined">search</span>
                <input type="text" id="live_search" style="width: 200px; padding: 10px; background-color: mintcream;" autocomplete="off" placeholder="Search...">
                <div id="searchresult"></div>
            </div>
            <div class="header-right">
                <span class="material-icons-outlined">chat</span>
                <span class="material-icons-outlined">account_circle</span> 
                <form method="POST" action="../Controller/logout.php">
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
                    <a href="" target="_blank">
                        <span class="material-icons-outlined">dashboard</span>DASHBOARD
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="" target="_blank">
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
                    <h1>Calculate</h1>
                </div>
                <div class="card">
                    <div class="card-inner">
                        <h3>TOTAL BUYER</h3>
                        <span class="material-icons-outlined">person_2</span>
                    </div>
                    <h1>2</h1>
                </div>
                <div class="card">
                    <div class="card-inner">
                        <h3>TOTAL SELLER</h3>
                        <span class="material-icons-outlined">sell</span>
                    </div>
                    <h1>2</h1>
                </div>
                <div class="card">
                    <div class="card-inner">
                        <h3>TOTAL AGENT</h3>
                        <span class="material-icons-outlined">support_agent</span>         
                    </div>
                    <h1>2</h1>
                </div>
            </div>
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input = $(this).val();
                if (input !== "") {
                    $.ajax({
                        url: "livesearch.php",
                        method: "POST",
                        data: {input: input},
                        success: function(data){
                            $("#searchresult").html(data);
                            $("#searchresult").css("display", "block");
                        }
                    });
                } else {
                    $("#searchresult").html("");
                    $("#searchresult").css("display", "none");
                }
            });
        });
    </script>
</body>
</html>
