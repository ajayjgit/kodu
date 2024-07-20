
<!DOCTYPE html><html lang="en"><head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>KODU</title>
        <meta name="description" content="SuperMart eCommerce HTML Template specially designed for multipurpose shops like the mega store, grocery stores, supermarkets, organic shops, and online stores">
        <link rel="shortcut icon" href="images/favicon.png" type="image/f-icon">

        <!-- font awesome -->
        <link rel="stylesheet" href="css/all.min.css">
        <!-- bootstraph -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Fancy Box -->
        <link rel="stylesheet" href="css/jquery.fancybox.min.css">
        <!-- swiper js -->
        <link rel="stylesheet" href="css/swiper-bundle.min.css">
        <!-- Nice Select -->
        <link rel="stylesheet" href="css/nice-select.css">
        <!-- Countdown js -->
        <link rel="stylesheet" href="css/jquery.countdown.css">
        <!-- User's CSS Here -->
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <!-- Header Start  -->
        <header class="header header-sticky">
            <div class="container">
                <!-- Header Top Start -->
                <div class="header__top">
                    <div class="header__left">
                        <!-- Header Toggle Start -->
                        <div class="header__toggle d-lg-none">
                            <button class="toggler__btn">
                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 12H18V10H0V12ZM0 7H18V5H0V7ZM0 0V2H18V0H0Z" fill="#667085"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Header Toggle End -->
                        <div class="header__logo">
                            <a href="home.html"><img src="images/logo.png" alt="logo"> </a>
                        </div>
                        <div class="search__form__wrapper">
                            <form action="search.html" method="post" class="search__form">
                                <div class="select__style">
                                    <select name="filter" class="category-select">
                                        <option value="1">Category</option>
                                        <option value="2">Groceries</option>
                                        <option value="3">Computer</option>
                                        <option value="4">Women</option>
                                        <option value="5">Electronics</option>
                                        <option value="6">Men</option>
                                        <option value="7">Baby</option>
                                        <option value="8">Sports</option>
                                    </select>
                                </div>
                                <input type="search" class="form-control" name="search" placeholder="What are you looking for...">
                                <button type="submit">
                                    <img src="images/search.png" alt="search">
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="header__meta">
                        <ul class="meta__item d-xl-block d-none">
                            <li><i class="fa-solid fa-location-dot"></i>Dhaka, Bangladesh</li>
                        </ul>
                        <div class="language__select custom__dropdown">
                            <div class="selected">
                                <div class="selected_item">
                                    <img src="images/flag-01.png" alt="flag">
                                    <span>English - USD</span>
                                </div>
                            </div>
                            <ul class="list">
                                <li>
                                    <img src="images/flag-01.png" alt="flag">
                                    English - USD
                                </li>
                                <li>
                                    <img src="images/flag-02.png" alt="flag">
                                    Bangla - BDT
                                </li>
                                <li>
                                    <img src="images/flag-03.png" alt="flag">
                                    France - FRF
                                </li>
                                <li>
                                    <img src="images/flag-04.png" alt="flag">
                                    India - RUPI
                                </li>
                                <li>
                                    <img src="images/flag-05.png" alt="flag">
                                    Turkish - LIRA
                                </li>
                            </ul>
                        </div>
                        <ul class="meta__item">
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#signup">
                                    <i class="fa-solid fa-user-plus"></i>
                                    <span>Sign up</span>
                                </a>
                            </li>
                        </ul>
                        <div class="miniCart">
                            <div class="header__cart">
                                <a href="#" class="cart__btn">
                                    <div class="cart__btn-img">
                                        <img src="images/cart-icon.png" alt="cart-icon">
                                        <span class="value">10</span>
                                    </div>
                                    <span class="title">cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Header Top End -->
                </div>
                <!-- Search Form -->
                <form action="search.html" method="post" class="search__form full__width d-lg-none d-flex">
                    <input type="search" class="form-control" name="search" placeholder="What are you looking for...">
                    <button type="submit">
                        <img src="images/search.png" alt="search">
                    </button>
                </form>
                <!-- Search Form -->
            </div>
            <nav class="nav d-none d-lg-flex">
                <div class="container">
                    <!-- Header Wrap Start  -->
                    <div class="header__wrapper">
                        <div class="header__menu">
                            <ul class="main__menu">
                                <li class="has__dropdown active">
                                    <a href="#">Home</a>
                                    <!-- Dropdown -->
                                    <ul class="sub__menu">
                                        <li><a href="home.html">Home-01</a></li>
                                        <li><a href="home-02.html">Home-02</a></li>
                                        <li><a href="home-03.html">Home-03</a></li>
                                        <li><a href="home-04.html">Home-04</a></li>
                                        <li><a href="home-05.html">Home-05</a></li>
                                    </ul>
                                    <!-- Dropdown -->
                                </li>
                                <li class="has__dropdown position-static">
                                    <a href="#">Collection</a>
                                    <!-- Mega Menu -->
                                    <div class="mega__menu sub__menu">
                                        <ul class="mega__menu-item">
                                            <li class="sub-mega__menu">
                                                <a class="menu__title" href="#">Groceries</a>
                                                <ul>
                                                    <li><a href="all-categories.html">Meat &amp; Seafood</a></li>
                                                    <li><a href="all-categories.html">Forzen Food</a></li>
                                                    <li><a href="all-categories.html">Beverage</a></li>
                                                    <li><a href="all-categories.html">Dairy</a></li>
                                                    <li><a href="all-categories.html">Beverage</a></li>
                                                    <li><a href="all-categories.html">Bekery &amp; Bread</a></li>
                                                    <li><a href="all-categories.html">Candy</a></li>
                                                    <li><a href="all-categories.html">Beverage</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega__menu">
                                                <a class="menu__title" href="#">Electronics</a>
                                                <ul>
                                                    <li><a href="all-categories.html">Computer &amp; laptop</a></li>
                                                    <li><a href="all-categories.html">Camera</a></li>
                                                    <li><a href="all-categories.html">Headphone</a></li>
                                                    <li><a href="all-categories.html">Smarwatches</a></li>
                                                    <li><a href="all-categories.html">Mobile &amp; Tablets</a></li>
                                                    <li><a href="all-categories.html">Television</a></li>
                                                    <li><a href="all-categories.html">Smartphone</a></li>
                                                    <li><a href="all-categories.html">Spekears</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega__menu">
                                                <a class="menu__title" href="#">Women</a>
                                                <ul>
                                                    <li><a href="all-categories.html">Jewelry</a></li>
                                                    <li><a href="all-categories.html">Athletic shoes</a></li>
                                                    <li><a href="all-categories.html">Jackets</a></li>
                                                    <li><a href="all-categories.html">Socks</a></li>
                                                    <li><a href="all-categories.html">Sleepwear</a></li>
                                                    <li><a href="all-categories.html">Dresses</a></li>
                                                    <li><a href="all-categories.html">T-shirt</a></li>
                                                    <li><a href="all-categories.html">Hats</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega__menu">
                                                <a class="menu__title" href="#">Men</a>
                                                <ul>
                                                    <li><a href="all-categories.html">Men Suits</a></li>
                                                    <li><a href="all-categories.html">Sleepwear</a></li>
                                                    <li><a href="all-categories.html">Athletic shoes</a></li>
                                                    <li><a href="all-categories.html">T-shirt</a></li>
                                                    <li><a href="all-categories.html">Jackets</a></li>
                                                    <li><a href="all-categories.html">Socks</a></li>
                                                    <li><a href="all-categories.html">Hats</a></li>
                                                    <li><a href="all-categories.html">Glasses</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega__menu">
                                                <a class="menu__title" href="#">Kides</a>
                                                <ul>
                                                    <li><a href="all-categories.html">Men Suits</a></li>
                                                    <li><a href="all-categories.html">Sleepwear</a></li>
                                                    <li><a href="all-categories.html">Athletic shoes</a></li>
                                                    <li><a href="all-categories.html">T-shirt</a></li>
                                                    <li><a href="all-categories.html">Jackets</a></li>
                                                    <li><a href="all-categories.html">Socks</a></li>
                                                    <li><a href="all-categories.html">Hats</a></li>
                                                    <li><a href="all-categories.html">Glasses</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega__menu">
                                                <a class="menu__title" href="#">Sports</a>
                                                <ul>
                                                    <li><a href="all-categories.html">Gaming Edition</a></li>
                                                    <li><a href="all-categories.html">Gaming Headset</a></li>
                                                    <li><a href="all-categories.html">Gaming Mouse Pad</a></li>
                                                    <li><a href="all-categories.html">Gaming Mouse </a></li>
                                                    <li><a href="all-categories.html">Gaming Glasses</a></li>
                                                    <li><a href="all-categories.html">Gaming Keyboard</a></li>
                                                    <li><a href="all-categories.html">Gaming Microphone</a></li>
                                                    <li><a href="all-categories.html">Controller Charger</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Mega Menu -->
                                </li>
                                <li class="has__dropdown">
                                    <a href="#">pages</a>
                                    <!-- Dropdown -->
                                    <ul class="sub__menu">
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="profile.html">Profile</a></li>
                                        <li><a href="dashboard.html">Dashboard</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="signup.html">SignUp</a></li>
                                        <li><a href="forget-password.html">Forget Password</a></li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="terms.html">Terms &amp; Conditions</a></li>
                                        <li><a href="comming-soon.html">Comming Soon</a></li>
                                        <li><a href="error.html">404</a></li>
                                    </ul>
                                    <!-- Dropdown -->
                                </li>
                                <li><a href="all-categories.html">Hot Offers</a></li>
                                <li class="has__dropdown">
                                    <a href="#">Shop</a>
                                    <!-- Dropdown -->
                                    <ul class="sub__menu">
                                        <li><a href="product.html">Shop</a></li>
                                        <li><a href="product-single.html">Shop Details</a></li>
                                        <li><a href="search.html">Shop Search</a></li>
                                        <li><a href="cart.html">Shop Cart</a></li>
                                        <li><a href="checkout.html">Shop Checkout</a></li>
                                        <li><a href="tracking.html">Order Tracker</a></li>
                                    </ul>
                                    <!-- Dropdown -->
                                </li>
                                <li class="has__dropdown">
                                    <a href="#">Blog</a>
                                    <!-- Dropdown -->
                                    <ul class="sub__menu">
                                        <li><a href="blog-list.html">Blog List</a></li>
                                        <li><a href="blog-grid.html">Blog Grid</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                    <!-- Dropdown -->
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="header__meta">
                            <ul class="meta__item">
                                <li>
                                    <a href="tel:+0125698989"><i class="fa-solid fa-phone-flip"></i>+01 2569 8989</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Wrap End  -->
                </div>
            </nav>
        </header>
        <!-- Header End -->