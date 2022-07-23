<<!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fascinate&family=Inconsolata:wght@300;400&family=Raleway:wght@500&display=swap" rel="stylesheet">
        <!-- My CSS -->
        <link rel="stylesheet" href="style.css">
        <title>Alex Shop</title>
    </head>



    <!-- Wrongly written PHP fucntion that causes LFI vulnerability -->
    <?php
    function which_product_to_show_wrong()
    {
        if (isset($_GET['product1']) || isset($_GET['product2'])) {

            if (isset($_GET['product1'])) {
                include('includes/' . $_GET['product1'] . '.html');
            } elseif (isset($_GET['product2'])) {
                include('includes/' . $_GET['product2'] . '.html');
            }
        }
    }
    ?>
    <!------------------------------------------------------------------>


    <!-- Correctly written PHP fucntion that validated user input -->
    <?php
    function which_product_to_show_correct_1()
    {
        if (isset($_GET['product1']) || isset($_GET['product2'])) {
            if (isset($_GET['product1']) and $_GET['product1'] == 'product1') {
                include('includes/' . $_GET['product1'] . '.html');
            } elseif (isset($_GET['product2']) and $_GET['product2'] == 'product2') {
                include('includes/' . $_GET['product2'] . '.html');
            }
            else{
                header('Location:index.html');
            }
        }
    }
    ?>
    <!------------------------------------------------------------------>


    <!-- Correctly written PHP fucntion that uses whitelisting-->
    <?php
        function which_product_to_show_correct_2()
        {
            $available_links = [
                'http://192.168.64.2/','http://192.168.64.2/Final%20Project/','http://localhost:8080','http://localhost:8080/Final%20Project/',
                'http://localhost:8080/Final%20Project/index.html','http://192.168.64.2/Final%20Project/index.html','http://localhost:8080/Final%20Project/#',
                'http://192.168.64.2/Final%20Project/#','http://192.168.64.2/Final%20Project/products.php?product1=product1','http://localhost:8080/Final%20Project/products.php?product1=product1',
                'http://localhost:8080/Final%20Project/products.php?product2=product2','http://192.168.64.2/Final%20Project/products.php?product2=product2'
            ];

            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (in_array($actual_link, $available_links))
            {
                if (isset($_GET['product1']) || isset($_GET['product2'])) {

                    if (isset($_GET['product1'])) {
                        include('includes/' . $_GET['product1'] . '.html');
                    } elseif (isset($_GET['product2'])) {
                        include('includes/' . $_GET['product2'] . '.html');
                    }
                }
            }
            else
            {
              header('Location:index.html');
            }
        }
        ?>
        <!------------------------------------------------------------------>

    <body>

        <!-- Navigation Bar -->
        <nav id="my-navbar1" class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #6baae6;">
            <a class="navbar-brand d-lg-none" href="#"><img src="images/logo.png" width="40" height="40"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbarToggler7" aria-controls="myNavbarToggler7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse font-weight-bold" id="myNavbarToggler7">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-4">
                        <a class="navbar-brand Raleway" href="index.html">Home</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="navbar-brand Raleway" href="index.html">About</a>
                    </li>
                    <a class="d-none d-lg-block px-4" href="index.html"><img src="images/logo.png" width="47" height="40"></a>
                    <li class="nav-item px-4">
                        <a class="navbar-brand Raleway" href="index.html">Products</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="navbar-brand Raleway" href="index.html">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>


        <?php
        which_product_to_show_wrong();
        // which_product_to_show_correct_1(); -> good func. Remove which_product_to_show_wrong() and uncomment this
        // which_product_to_show_correct_2(); -> good func2. Remove which_product_to_show_wrong() and uncomment this
        ?>


        <!-- Footer -->
        <footer class="blog-footer mt-auto text-center py-3" style="background-color: #6baae6;">
            <p class="Raleway">Final Project built by <a href="https://www.linkedin.com/in/alex-shleymovich-692926167/">Alex Shleymovich</a></p>
            <p class="Raleway"><a href="#">Back to top</a></p>
        </footer>

        <!-- Separate Popper and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

    </html>