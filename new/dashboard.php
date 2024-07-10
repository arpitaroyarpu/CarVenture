<?php
    $user = "l_username";
    session_start();
    if(isset($_SESSION['l_username'])){
        //echo "<h1>Welcome ". $_SESSION['l_username'] . " to dashboard </h1>";
    }
    else{
        echo "<script>alert('dont access from URL!! Login First') </script>";
        echo "<script>location.href = 'login.php' </script>";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous" />

        <title> Car Venture</title>
        <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/646/646338.png" type="image/x-icon">
    </head>

    <body>
        <p class="text-center p-style p-2">
            The most promising car service near you !!
        </p>
        <!-- navbar starts -->
        <nav class="navbar navbar-expand-lg navbar-light nav-bg">
            <div class="container-fluid">
                <a style="font-weight: 800; font-size: 25px; color: #ca9236" class="navbar-brand" href="dashboard.php"><span
                        style="color: #ca9236">Car Venture</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="user-product.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account-details.php"> <b><i class="fa-solid fa-user"></i><?php echo $_SESSION['l_username']?></b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><b><i class="fa-solid fa-cart-shopping"></i>My Cart</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        

                </div>
            </div>
        </nav>
        <!-- navbar ends -->




        <!-- carousel -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://t3.ftcdn.net/jpg/04/60/44/42/360_F_460444211_E7j3njYE705Rk1guKz9LKh58gFgiTybV.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://www.izmostock.com/wp-content/uploads/2018/04/izmostock_MainBanner_05.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://wallpaperswide.com/download/bmw_i8_car_concept-wallpaper-2560x800.jpg"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Shop By Collection -->

        <div class="mt-3 p-2">
            <p style="font-weight: 700; font-size: 22px; color: #4e423d">
                Our Services
            </p>

            <div class="d-flex flex-wrap shop">
                <div class="col-lg-2 col-md-3 col-6 card p-2 cardDesign">
                    <img src="https://res.klook.com/images/fl_lossy.progressive,q_65/c_fill,w_1024,h_800/w_63,x_11,y_11,g_south_west,l_Klook_water_br_trans_yhcmh3/activities/by1e7ylfkih7m7eji4yf/HuaHinPrivateCarCharterfromPattayabyThaiRhythm.webp"
                        alt="" />
                    <p class="text-center">Private Car</p>
                    <button class="btn btn-dark">Buy service</button>

                </div>

                <div class="col-lg-2 col-md-3 col-6 card p-2 cardDesign">
                    <img src="https://nts-tokushima.com/en/assets/img/hired_car/photo_crown_royal_saloon.jpg" alt="" />
                    <p class="text-center">Weeding Car</p>
                    <button class="btn btn-dark">Buy service</button>

                </div>
                <div class="col-lg-2 col-md-3 col-6 card p-2 cardDesign">
                    <img src="https://wheelforcecentre.com/wp-content/uploads/2022/10/Where-I-can-find-best-luxury-car-repair-services.jpg"
                        alt="" />
                    <p class="text-center">Repairing</p>
                    <button class="btn btn-dark">Buy service</button>

                </div>
                <div class="col-lg-2 col-md-3 col-6 card p-2 cardDesign">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEDNpt7_Nms1QhiKYq3Xcb4_-kjvgYbmu0ir9eVNtCZaSKfB5N6Qmfky2rmsXg80pC_yw&usqp=CAU"
                        alt="" />
                    <p class="text-center">Rent Drive</p>
                    <button class="btn btn-dark">Buy service</button>

                </div>
                <div class="col-lg-2 col-md-3 col-6 card p-2 cardDesign">
                    <img src="https://edriver.com.bd/public/frontEnd/img/shape/Driving-School.png" alt="" />
                    <p class="text-center">Driving</p>
                    <button class="btn btn-dark">Buy service</button>

                </div>
                <div class="col-lg-2 col-md-3 col-6 card p-2 cardDesign">
                    <img src="https://image.made-in-china.com/202f0j00AHLYroTJbgbe/Rhd-Mobile-Ambulance-Car-Price.webp"
                        alt="" />
                    <p class="text-center">Ambulance Car</p>
                    <button class="btn btn-dark">Buy service</button>

                </div>

            </div>
        </div>

        <!-- shop by category -->
        <div class="p-2 mt-5">
            <p style="font-weight: 700; font-size: 22px; color: #4e423d">
                Categories
            </p>



            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="https://www.bankrate.com/2018/11/29130006/How-to-buy-a-car-10-tips-and-tricks-to-get-the-best-deal.jpg"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Purchase</h5>
                            <p class="card-text">The easiest way to purchase any sort of car available in our location. Contact us for more.</p>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://www.hertz.com/content/dam/hertz/global/blog-articles/resources/car-rental-vs-car-sharing/car-keys.jpg"
                            class=" " alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Ride Sharing</h5>
                            <p class="card-text">You can hire cars from us for your ride sharing services at any time at any place</p>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://images.summitmedia-digital.com/esquiremagph/images/2019/10/09/Driving-Tips-for-Beginners-MAINIMAGE.jpg"
                            class="card-img-top " alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Operating Coaching</h5>
                            <p class="card-text">We provide the best driving training all over the country through expert trainers</p>
                        </div>

                    </div>
                </div>
            </div>




            
                    
            <!-- exclusive -->




            <p style="font-weight: 700; font-size: 22px; color: #4e423d" class="mt-3">
                Exclusive </p>
            <div class=" exclusive row row-cols-1 row-cols-md-3 g-4">

                <div class="col">
                    <div class="card h-100">
                        <img src="https://cdni.autocarindia.com/utils/imageresizer.ashx?n=https://cms.haymarketindia.net/model/uploads/modelimages/BMW-2-Series-Gran-Coupe-271220221147.jpg"
                            alt="" />
                        <div class="card-body">
                            <div class="content p-4">
                                <h4 class="text-warning">TATA</h4>
                                <p>
                                    Contact us for customized designs you want to draw on your wall.
                                    Prices starts from $50 per design
                                </p>
                                <button class="btn btn-warning">Contact us</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://f7432d8eadcf865aa9d9-9c672a3a4ecaaacdf2fee3b3e6fd2716.ssl.cf3.rackcdn.com/C2299/U8796/IMG_44666-large.jpg"
                            alt="" />
                        <div class="content p-4">
                            <h4 class="text-warning">FERRARI</h4>
                            <p>
                                Contact us for customized designs you want to make. Prices starts
                                from $10 per design
                            </p>
                            <button class="btn btn-warning">Contact us</button>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <img src="https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/facelift_2019/models_gw/2023/03_29_revuelto/gate_models_s_02_m.jpg"
                            alt="" />
                        <div class="content p-4">
                            <h4 class="text-warning">LAMBORGHINI</h4>
                            <p>
                                Contact us for customized designs you want to make. Prices starts
                                from $10 per design
                            </p>
                            <button class="btn btn-warning">Contact us</button>
                        </div>

                    </div>
                </div>
            </div>











            
            </div>
            <!-- footer -->
            <footer>
                <div class="mt-5 footerDesign">
                    <div class="">
                        <p class="pt-2 text-center p-2">&copy; 2023 Car Service Sylhet</p>
                    </div>

                    <div class="p-5">
                        <div class="d-flex flex-wrap pb-3">
                            <div class="col-12 col-lg-2 col-md-2">
                                <h6 class="mb-4">Learn About Us</h6>
                                <p>Careerss</p>
                                <p>Blog</p>
                                <p>Investment</p>
                                <p>Plans</p>
                            </div>
                            <div class="col-12 col-lg-2 col-md-2">
                                <h6 class="mb-4">Make Money with Us</h6>
                                <p>Sell products</p>
                                <p>Become an Affiliate</p>
                                <p>Self-Publish with Us</p>
                                <p>See More</p>
                            </div>
                            <div class="col-12 col-lg-2 col-md-2">
                                <h6 class="mb-4">Payment Gateways</h6>
                                <p>Master Card</p>
                                <p>Bkash Payment</p>
                                <p>Rocket Payment</p>
                                <p>Nogod Payment</p>
                                <p>Payoneer Transfer</p>
                            </div>
                            <div class="col-12 col-lg-2 col-md-2">
                                <h6 class="mb-4">Let Us Help You</h6>
                                <p>Your Account</p>
                                <p>Your Orders</p>
                                <p>Replacements</p>
                                <p>Manage Content</p>
                                <p>Help</p>
                            </div>
                            <div class="col-12 col-lg-2 col-md-2">
                                <h6 class="mb-4">Support</h6>
                                <p>FAQ</p>
                                <p>How It Works</p>
                                <p>Replacements</p>

                                <p>Mobile : 01312892300</p>
                            </div>
                            <div class="col-12 col-lg-2 col-md-2">
                                <h6 class="mb-4">Policies</h6>
                                <p>Refund Policy</p>
                                <p>Payment Gateway</p>
                                <p>Terms & Conditions</p>
                                <p>Purchase & withdraw</p>
                                <p>Order Place</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </footer>
      
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
            </script>
    </body>

    </html>















