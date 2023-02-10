<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/ejemplo.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>
<div class="container">
  <h2>Collapsible Panel</h2>
  <p>Click on the collapsible panel to open and close it.</p>
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
        <div class="wrapper">

<!--Top menu -->
<div class="sidebar">
    <!--profile image & text-->
    <div class="profile">
        <img src="img.jpg" alt="" />
        <h3>Daniel</h3>
        <p>Developer</p>
    </div>
    <!--menu item-->
    <ul>
        <li><a href="#">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="item"> Home</span>
            </a></li>
        <li><a href="#">
                <span class="icon"><i class="fa fa-dashboard"></i></span>
                <span class="item"> My Dashboard</span>
            </a></li>
        <li><a href="#">
                <span class="icon"><i class="fa fa-chart-pie"></i></span>
                <span class="item"> View Graphics</span>
            </a></li>
        <li><a href="#">
                <span class="icon"><i class="fa fa-edit"></i></span>
                <span class="item"> Orders</span>
            </a></li>
        <li><a href="#">
                <span class="icon"><i class="fa fa-user"></i></span>

                <span class="item"> Admin</span>
            </a></li>
        <li><a href="#">
                <span class="icon"><i class="material-symbols-outlined"></i></span>
                <span class="item"> Exit</span>
            </a></li>
    </ul>
</div>

</div>
          <a data-toggle="collapse" href="#collapse1">Collapsible panel</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
<!--menu item-->
<ul>
                    <li><a href="#">
                            <span class="icon"><i class="fa fa-home"></i></span>
                            <span class="item"> Home</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon"><i class="fa fa-dashboard"></i></span>
                            <span class="item"> My Dashboard</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon"><i class="fa fa-chart-pie"></i></span>
                            <span class="item"> View Graphics</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon"><i class="fa fa-edit"></i></span>
                            <span class="item"> Orders</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon"><i class="fa fa-user"></i></span>

                            <span class="item"> Admin</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon"><i class="material-symbols-outlined"></i></span>
                            <span class="item"> Exit</span>
                        </a></li>
                </ul>
      </div>
    </div>
  </div>
</div>
<!-- ------------------------ -->

        <div class="wrapper">

            <!--Top menu -->
            <div class="sidebar">
                <!--profile image & text-->
                <div class="profile">
                    <img src="img.jpg" alt="" />
                    <h3>Daniel</h3>
                    <p>Developer</p>
                </div>
                <!--menu item-->
                <ul>
                    <li><a href="#">
                            <span class="icon"><i class="fa fa-home"></i></span>
                            <span class="item"> Home</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon"><i class="fa fa-dashboard"></i></span>
                            <span class="item"> My Dashboard</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon"><i class="fa fa-chart-pie"></i></span>
                            <span class="item"> View Graphics</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon"><i class="fa fa-edit"></i></span>
                            <span class="item"> Orders</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon"><i class="fa fa-user"></i></span>

                            <span class="item"> Admin</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon"><i class="material-symbols-outlined"></i></span>
                            <span class="item"> Exit</span>
                        </a></li>
                </ul>
            </div>

        </div>
  
    <script type="text/javascript" src="scripts/ejemplo.js"></script>


    </script>
</body>

</html>