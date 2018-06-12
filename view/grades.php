
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <a href="index.php?controller=Index&action=index">
            <title>siscad</title>
        </a>
        <!-- Web Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,900,700,500,300' rel='stylesheet' type='text/css'>
        <!-- Flaticon CSS -->
        <link href="boot/fonts/flaticon/flaticon.css" rel="stylesheet">
        <!-- font-awesome CSS -->
        <link href="boot/css/font-awesome.min.css" rel="stylesheet">
        <!-- Offcanvas CSS -->
        <link href="boot/css/hippo-off-canvas.css" rel="stylesheet">
        <!-- animate CSS -->
        <link href="boot/css/animate.css" rel="stylesheet">
        <link href="boot/css/owl.theme.css" rel="stylesheet">
        <link href="boot/css/owl.carousel.css" rel="stylesheet">
        <!-- Bootstrap Core CSS -->
        <link href="boot/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="boot/css/style2.css" rel="stylesheet">
        <!-- Responsive CSS -->
        <link href="boot/css/responsive.css" rel="stylesheet">

        <script src="boot/js/vendor/modernizr-2.8.1.min.js"></script>
        <!-- HTML5 Shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="js/vendor/html5shim.js"></script>
            <script src="js/vendor/respond.min.js"></script>
        <![endif]-->
        <!--Load the AJAX API-->
        <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['bar']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Year', 'Sales', 'Expenses', 'Profit'],
              ['2014', 1000, 400, 200],
              ['2015', 1170, 460, 250],
              ['2016', 660, 1120, 300],
              ['2017', 1030, 540, 350]
            ]);

            var options = {
              chart: {
                title: 'Company Performance',
                subtitle: 'Sales, Expenses, and Profit: 2014-2017',
              }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        </script>
      </head>
    </head>


    <body id="page-top" data-spy="scroll"  data-target=".navbar">

      <div id="st-container" class="st-container">
        <div class="st-pusher">
            <div class="st-content">
                <div class="st-content-inner">

                    <header class="header">
                        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                            <div class="container">
                                <div class="navbar-header">
                                    <!-- offcanvas-trigger-effects -->
                                    <a href="index.php?controller=Index&action=index">
                                        <h1 class="logo">siscad</a></h1>
                                    </a>
                                </div>
                            </div><!-- /.container -->
                        </nav>
                    </header>

                        <section class="blog-page">
                            <div class="container">
                                <a href="index.php?controller=Index&action=index">
                                    <h3 class="tit-mat"><?php echo($seme)?></h3>
                                </a>
                                 <a href="index.php?controller=Matters&action=mat&seme=<?php echo $seme;?>">
                                    <h1 class="tit-mat"><?php echo($mat)?></h1>
                                </a>
                                    <!--Div that will hold the pie chart-->
                                   <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

                                 <!-- Widgets -->
                                 <?php $i = 1; ?>
                                <!-- <?php foreach ($grades as $grade) :?>
                                    
                                    <?php
                                        if($i==5) 
                                        {
                                            $i=0;
                                        }
                                        $i++;
                                    ?>
                                <?php endforeach; ?> -->
                                <!-- #END# Widgets -->
                            </div><!-- /.container -->
                        </section>