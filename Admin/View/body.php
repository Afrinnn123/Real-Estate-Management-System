<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Afacad:wght@500&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <style>
        
        /* Main */
        .main-container {
            grid-area: main;
            overflow-y: auto;
            background-color: mintcream;
            padding: 20px 20px;
        }

        .main-title{
            display: flex;
            justify-content: center;
        }

        .main-cards{
            display:grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 20px;
            margin:20px 0;
        }

        .card{
            display:flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 25px;
            border-radius: 5px;
        }

        .card:first-child{
            background-color: lightcoral;
        }

        .card:nth-child(2){
            background-color: lightseagreen;
        }

        .card:nth-child(3){
            background-color: mediumpurple;
        }

        .card:nth-child(4){
            background-color: goldenrod;
        }

        .card-inner{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-inner>.material-icons-outlined{
            font-size: 40px;
        }

        .charts {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 60px;
        }

        .charts-card {
            background-color: lightblue;
            margin-bottom: 20px;
            padding: 25px;
            box-sizing: border-box;
            -webkit-column-break-inside: avoid;
            border-radius: 5px;
            box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.5);
        }

        .chart-title {
             display: flex;
             align-items: center;
             justify-content: center;
        }

        .live-time-container {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #live-time {
            font-size: 14px;
            color: #333;
        }




    </style>
</head>
<body>

</body>
</html>