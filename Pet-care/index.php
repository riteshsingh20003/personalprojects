<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FurryFriend Care - Pet Care Website Template</title>


    <link href="img/favicon.ico" rel="icon">

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">


    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">


    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet">
</head>

<body>


    <div class="row py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="" class="navbar-brand d-none d-lg-block">
                <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Furry Friend</span>Care</h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <div class="d-inline-flex flex-column text-center pr-3 border-right">
                    <h6>Working Hours</h6>
                    <p class="m-0">8.00AM - 9.00PM</p>
                </div>
                <div class="d-inline-flex flex-column text-center px-3 border-right">
                    <h6>Email Us</h6>
                    <p class="m-0">info@example.com</p>
                </div>
                <div class="d-inline-flex flex-column text-center pl-3">
                    <h6>Call Us</h6>
                    <p class="m-0">+910000000000</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span
                        class="text-primary">Safety</span>First</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="booking.php" class="nav-item nav-link">Booking</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="user_login.php" class="btn btn-lg btn-primary mx-2 px-3 d-none d-lg-block">Login</a>
                <a href="register.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Register</a>
            </div>
        </nav>
    </div>

    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-3 text-white mb-3">Your pet's happiness is our passion !!!</h1>
                            <h5 class="text-white mb-3 d-none d-sm-block">Get the best nearby Pet Sitters with just one
                                request.</h5>
                            <a href="user_login.php" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Booking Start -->
        <div class="container-fluid bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="bg-primary py-5 px-4 px-sm-5">
                            <form class="py-5" action="user_login.php">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Your Name"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" placeholder="Your Email"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="text" class="form-control border-0 p-4 datetimepicker-input"
                                            placeholder="Reservation Date" data-target="#date"
                                            data-toggle="datetimepicker" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="text" class="form-control border-0 p-4 datetimepicker-input"
                                            placeholder="Reservation Time" data-target="#time"
                                            data-toggle="datetimepicker" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" style="height: 47px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">House Sitting🏠</option>
                                        <option value="2">Pet Walker🐕</option>
                                        <option value="3">Pet Tranning</option>
                                        <option value="3">Pet Gromming✂️</option>
                                        <option value="3">Pet Feeding</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-dark btn-block border-0 py-3" type="submit">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                        <h4 class="text-secondary mb-3">Going for a vacation?</h4>
                        <h1 class="display-4 mb-4">Book For <span class="text-primary">Your Pet</span></h1>
                        <p>We provide a wide range of Pet care Services</p>
                        <div class="row py-2">
                            <div class="col-sm-6">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <h1 class="flaticon-house font-weight-normal text-secondary m-0 mr-3"></h1>
                                        <h5 class="text-truncate m-0">Pet Boarding</h5>
                                    </div>
                                    <p>Comfortable, safe pet boarding with 24/7 care, cozy spaces, and plenty of
                                        playtime—your pet’s home away from home!</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1>
                                        <h5 class="text-truncate m-0">Pet Feeding</h5>
                                    </div>
                                    <p>Nutritious, timely pet feeding tailored to your pet’s needs—ensuring they stay
                                        happy,
                                        healthy, and well-fed while you're away.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <h1 class="flaticon-grooming font-weight-normal text-secondary m-0 mr-3"></h1>
                                        <h5 class="text-truncate m-0">Pet Grooming</h5>
                                    </div>
                                    <p class="m-0">Professional pet grooming with gentle care—bathing, brushing, nail
                                        trimming, and more to keep your furry friend clean, healthy, and stylish.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <h1 class="flaticon-toy font-weight-normal text-secondary m-0 mr-3"></h1>
                                        <h5 class="text-truncate m-0">Pet Tranning</h5>
                                    </div>
                                    <p class="m-0">Effective pet training with positive techniques—building good
                                        behavior,
                                        obedience, and stronger bonds between you and your furry companion.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking Start -->


        <!-- About Start -->
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                    <h4 class="text-secondary mb-3">About Us</h4>
                    <h1 class="display-4 mb-4"><span class="text-primary">Boarding</span> & <span
                            class="text-secondary">Daycare</span></h1>
                    <p class="mb-4">Our Boarding & Daycare services offer a safe, fun, and engaging environment with
                        supervised play, rest, and personalized care—giving your pet a home-like experience while you're
                        away or busy.</p>
                    <ul class="list-inline">
                        <li>
                            <h5><i class="fa fa-check-double text-secondary mr-3"></i>Best In Industry</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-check-double text-secondary mr-3"></i>Emergency Services</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-check-double text-secondary mr-3"></i>24/7 Customer Support</h5>
                        </li>
                    </ul>

                </div>
                <div class="col-lg-5">
                    <div class="row px-3">
                        <div class="col-12 p-0">
                            <img class="img-fluid w-100" src="img/about-1.jpg" alt="">
                        </div>
                        <div class="col-6 p-0">
                            <img class="img-fluid w-100" src="img/about-2.jpg" alt="">
                        </div>
                        <div class="col-6 p-0">
                            <img class="img-fluid w-100" src="img/about-3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Services Start -->
        <div class="container-fluid bg-light pt-5">
            <div class="container py-5">
                <div class="d-flex flex-column text-center mb-5">
                    <h4 class="text-secondary mb-3">Our Services</h4>
                    <h1 class="display-4 m-0"><span class="text-primary">Premium</span> Pet Services</h1>
                </div>
                <div class="row pb-3">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                            <h3 class="flaticon-house display-3 font-weight-normal text-secondary mb-3"></h3>
                            <h3 class="mb-3">House Sitting</h3>
                            <p>Comfortable, safe pet house sitting with 24/7 care, cozy spaces, and plenty of
                                playtime—your pet’s
                                home away from home!</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                            <h3 class="flaticon-food display-3 font-weight-normal text-secondary mb-3"></h3>
                            <h3 class="mb-3">Pet Feeding</h3>
                            <p>Nutritious, timely pet feeding tailored to your pet’s needs—ensuring they stay happy,
                                healthy, and well-fed while you're away.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="d-flex flex-column text-enter bg-white mb-2 p-3 p-sm-5">
                            <h3 class="flaticon-grooming display-3 font-weight-normal text-secondary mb-3"></h3>
                            <h3 class="mb-3">Pet Grooming</h3>
                            <p>Professional pet grooming with gentle care—bathing, brushing, nail trimming, and more to
                                keep
                                your furry friend clean, healthy, and stylish.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                            <h3 class="flaticon-cat display-3 font-weight-normal text-secondary mb-3"></h3>
                            <h3 class="mb-3">Pet Training</h3>
                            <p>Effective pet training with positcive techniques—building good behavior, obedience, and
                                stronger bonds between you and your furry companion.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                            <h3 class="flaticon-dog display-3 font-weight-normal text-secondary mb-3"></h3>
                            <h3 class="mb-3">Pet Exercise</h3>
                            <p>Daily walks, playtime, and fun activities designed to keep your pet active, healthy, and
                                full
                                of energy—tailored to their needs!</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                            <h3 class="flaticon-vaccine display-3 font-weight-normal text-secondary mb-3"></h3>
                            <h3 class="mb-3">Pet Walking</h3>
                            <p>Compassionate, professional care for sick or injured pets—expert diagnosis, gentle
                                treatment,
                                and ongoing support for a speedy recovery.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services End -->


        <!-- Features Start -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid w-100" src="img/girl-dog.jpg" alt="">
                </div>
                <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                    <h4 class="text-secondary mb-3">Why Choose Us?</h4>
                    <h1 class="display-4 mb-4"><span class="text-primary">Special Care</span> On Pets</h1>
                    <p class="mb-4">Because your pets deserve the best! We offer special care tailored to each pet’s
                        unique
                        needs—gentle handling, personalized attention, and a loving environment they’ll feel safe in</p>
                    <div class="row py-2">
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-4">
                                <h1 class="flaticon-cat font-weight-normal text-secondary m-0 mr-3"></h1>
                                <h5 class="text-truncate m-0">Best In Industry</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-4">
                                <h1 class="flaticon-doctor font-weight-normal text-secondary m-0 mr-3"></h1>
                                <h5 class="text-truncate m-0">Emergency Services</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <h1 class="flaticon-care font-weight-normal text-secondary m-0 mr-3"></h1>
                                <h5 class="text-truncate m-0">Special Care</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <h1 class="flaticon-dog font-weight-normal text-secondary m-0 mr-3"></h1>
                                <h5 class="text-truncate m-0">Customer Support</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features End -->

        <!-- Testimonial Start -->
        <div class="container-fluid bg-light my-5 p-0 py-5">
            <div class="container p-0 py-5">
                <div class="d-flex flex-column text-center mb-5">
                    <!-- <h4 class="text-secondary mb-3">Testimonial</h4> -->
                    <h1 class="display-4 m-0">Our Client <span class="text-primary">Says</span></h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="bg-white mx-3 p-4">
                        <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                            <img class="img-fluid" src="img/Testimonial-indian.png" style="width: 80px; height: 80px;"
                                alt="">
                            <div class="ml-3">
                                <h5>Jasbindar Singh</h5>
                                <i>&nbsp;</i>
                            </div>
                        </div>
                        <p class="m-0">Using the Furry Friend Care system has been a smooth and stress-free
                            experience—booking appointments and tracking health has never been easier!</p>
                    </div>
                    <div class="bg-white mx-3 p-4">
                        <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                            <img class="img-fluid" src="img/Testimonial_indian_2.png" style="width: 80px; height: 80px;"
                                alt="">
                            <div class="ml-3">
                                <h5>Neha Mishra</h5>
                                <i>&nbsp;</i>
                            </div>
                        </div>
                        <p class="m-0">The Furry Friend Care system made managing my pet’s health simple and
                            efficient—everything I need is just a click away.</p>
                    </div>
                    <div class="bg-white mx-3 p-4">
                        <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                            <img class="img-fluid" src="img/testamonial_indian_3.png" style="width: 80px; height: 80px;"
                                alt="">
                            <div class="ml-3">
                                <h5>Ashok Mehta</h5>
                                <i>&nbsp;</i>
                            </div>
                        </div>
                        <p class="m-0">The pet care system made caring for my pet simple and hassle-free—appointments,
                            records, and reminders all in one place!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->




        <!-- Footer Start -->
        <?php include "footer.php" ?>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <script type="module" src="js/main.js"></script>
        <script src="js/index.js"></script>
</body>

</html>