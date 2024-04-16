<!DOCTYPE html>
<html>
<head>
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
           position: absolute;
           width: 420px;
           background-color: white;
           border: 1px solid #ccc;
           box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
           z-index: 1;
        }

        #searchresult table {
           width: 100%;
           border-collapse: collapse;
           margin-top: 10px;
        }

        #searchresult th, #searchresult td {
           border: 1px solid #ddd;
           padding: 8px;
           text-align: left;
        }

        #searchresult th {
           background-color: royalblue;
           color: white;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
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


        .menu-icon{
            display:none;
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

        .sidebar-title{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 30px 30px 30px;
            margin-bottom: 30px;
        }

        .sidebar-title >span{
            display: none;
        }
        

        .sidebar-brand{
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
    }
    </style>
</head>
<body>

</body>
</html>