<!DOCTYPE html>
<html>

<head>
    <title>Pharm Connect</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" type="image/png" href="assets/images/fav.png">
    <link rel="stylesheet" type="text/css" href="assets/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function partnerFunction() {
            var element = document.getElementById("partnerOption");
            element.classList.toggle("openPartnerOption");
        }
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 150) {
                $("header").addClass("fixHeader");
            }
            else {
                $("header").removeClass("fixHeader");
            }
        });

    </script>
</head>

<body>
    <div id="main">
        <header class="">
            <div class="wrapper">
                <div class="headerHub">
                    <a href=""><img src="assets/images/logo.jpg" alt="logo" /></a>
                    <div class="headerNav">
                        <nav>
                            <a href=""><i class="fa fa-bars" aria-hidden="true"></i>
                                All categories</a>
                            <a href="">About us</a>
                            <a href="">Contact us</a>
                            <a href="">Sign in</a>
                        </nav>
                        <div class="dropOption">
                            <button onclick="partnerFunction()">CREATE AN ACCOUNT</button>
                            <ul id="partnerOption">
                                <li><a href="">Become a Partner</a></li>
                                <li><a href="">Become a Member</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="midContainer">
            <div class="categoryTabs">
                <div class="wrapper">
                    <div class="categoryTabsInner">
                        <a href="" class="activeCategory">Business Offerings</a>
                        <a href="">Consulting Services</a>
                        <a href="">Events/Conferences</a>
                        <a href="">Health Authority Sites</a>
                        <a href="">Jobs</a>
                    </div>
                </div>
            </div>
            <div class="filtersCategory-Hub">
                <div class="wrapper">
                    <div class="filtersCategory-Inner">
                        <div class="leftSidebar">
                            <h4>Filters Business Offerings</h4>
                            <section>
                                <div class="search-criteria">
                                    <span>
                                        <h5>Search By Category</h5>
                                        <select placeholder="Country name here...">
                                            <option>America</option>
                                        </select>
                                    </span>
                                    <span>
                                        <h5>Search By Category</h5>
                                        <div>
                                            <input placeholder="Category name here..." type="text">
                                            <button><img src="assets/images/search.png" alt="search" /></button>
                                        </div>
                                    </span>
                                </div>
                                <div class="searchCategories">
                                    <ul>
                                        <li class="activeSidebarCategory">
                                            <span>
                                                Manufacturers
                                            </span>
                                            <div class="searchSubCategory">
                                                <div>
                                                    <a href="">Drug Substance</a>
                                                    <ul>
                                                        <li><a href="">Advanced/Cell and Gene Therapy</a></li>
                                                        <li><a href="">Biologics/Large Molecules</a></li>
                                                        <li><a href="">Chemical Entities</a></li>
                                                        <li><a href="">Novel Modalities</a></li>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <a href="">Drug Product</a>
                                                </div>
                                                <div>
                                                    <a href="">Fill Finish</a>
                                                </div>
                                                <div>
                                                    <a href="">Drug Product</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span>
                                                Manufacturers
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                Manufacturers
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                Manufacturers
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                Manufacturers
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="rightCategories">
                            <p>Manufacturers / Drug Substance / Advanced/Cell and Gene Therapy</p>
                            <section>
                                <ul>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pharmCategory pharmPartnersLogo">
                <div class="wrapper">
                    <div class="headerTitle">
                        <h3>FEATURED</h3>
                        <p>Explore features of pharma</p>
                    </div>
                    <div class="pharmCategoryInner">
                        <div class="innerDifferentSection">
                            <h4>Upcoming Events</h4>
                            <section class="center slider">
                                <div>
                                    <img src="assets/images/logos/1.png" alt="logo" />
                                </div>
                                <div>
                                    <img src="assets/images/logos/2.png" alt="logo" />
                                </div>
                                <div>
                                    <img src="assets/images/logos/3.png" alt="logo" />
                                </div>
                                <div>
                                    <img src="assets/images/logos/1.png" alt="logo" />
                                </div>
                                <div>
                                    <img src="assets/images/logos/3.png" alt="logo" />
                                </div>
                                <div>
                                    <img src="assets/images/logos/2.png" alt="logo" />
                                </div>
                                <div>
                                    <img src="assets/images/logos/1.png" alt="logo" />
                                </div>
                                <div>
                                    <img src="assets/images/logos/2.png" alt="logo" />
                                </div>
                                <div>
                                    <img src="assets/images/logos/3.png" alt="logo" />
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="footerLinks">
                <ul>
                    <li><b>Get Support</b></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Help Center</a></li>
                    <li><a href="">Live Chat</a></li>
                    <li><a href="">Check Status</a></li>
                    <li><a href="">Reports</a></li>
                </ul>
                <ul>
                    <li><b>Assurance</b></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Help Center</a></li>
                    <li><a href="">Live Chat</a></li>
                    <li><a href="">Check Status</a></li>
                </ul>
                <ul>
                    <li><b>Source on PharmConnect</b></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Help Center</a></li>
                    <li><a href="">Live Chat</a></li>
                    <li><a href="">Check Status</a></li>
                    <li><a href="">Reports</a></li>
                </ul>
                <ul>
                    <li><b>Become Partner</b></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Help Center</a></li>
                    <li><a href="">Live Chat</a></li>
                    <li><a href="">Reports</a></li>
                </ul>
                <ul>
                    <li><b>Get to Know us</b></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Help Center</a></li>
                    <li><a href="">Live Chat</a></li>
                    <li><a href="">Check Status</a></li>
                    <li><a href="">Reports</a></li>
                </ul>
            </div>
            <div class="footerSocialPartner">
                <div class="socialApps">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-google"></a>
                    <a href="#" class="fa fa-linkedin"></a>
                    <a href="#" class="fa fa-youtube"></a>
                    <a href="#" class="fa fa-instagram"></a>
                </div>
                <div class="socialPartner">
                    <ul>
                        <li><a href="">Become a Partner</a></li> |
                        <li><a href="">Become a Member</a></li>
                    </ul>
                    <a href="">Feedback <img src="./images/partner.png" alt="partner" /></a>
                </div>
            </div>
            <div class="copyrighter">PharmConnect | ©copyright 2024</div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="assets/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).on('ready', function () {
            $(".regular").slick({
                dots: true,
                prevArrow: false,
                nextArrow: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
            });
            $(".center").slick({
                dots: false,
                infinite: true,
                centerMode: true,
                slidesToShow: 5,
                slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 5000,
            });
        });
    </script>

</body>

</html>