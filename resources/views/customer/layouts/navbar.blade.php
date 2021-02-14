<!-- header -->
        <div id="header">
            <div class="container">
                <div class="pull-left">
                    <!-- Logo -->
                    <div class="header-logo">
                        <a class="logo" href="#">
                            <img src="{!! asset('customer/img/logo.png') !!}" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->

                    <!-- Search -->
                    <div class="header-search">
                        <form method="POST" action="{!! url('/searchproducts') !!}">
                            <input class="input search-input" type="text" placeholder="Entrer mots clés" name="keywords">
                            <select class="input search-categories" name="categorie_id">
                                <option value="0">tout Categories</option>
                                @foreach($categories as $elt)
                                <option value="{!! $elt->id !!}">{!! $elt->name !!}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /Search -->
                </div>
                <div class="pull-right">
                    <ul class="header-btns">
                        <!-- Account -->
                        <li class="header-account dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">Mon Compte <i class="fa fa-caret-down"></i></strong>
                            </div>
                            <a href="#" class="text-uppercase">Connexion</a>
                            <ul class="custom-menu">
                                <li><a href="#"><i class="fa fa-user-o"></i> Mon compte</a></li>
                                <li><a href="#"><i class="fa fa-unlock-alt"></i> Connexion</a></li>
                                <li><a href="#"><i class="fa fa-user-plus"></i> Créer un compte</a></li>
                            </ul>
                        </li>
                        <!-- /Account -->

                        <!-- Cart -->
                        <li class="header-cart dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty">3</span>
                                </div>
                                <strong class="text-uppercase">Mon panier:</strong>
                                <br>
                                <span>35 000 FCFA</span>
                            </a>
                            <div class="custom-menu">
                                <div id="shopping-cart">
                                    <div class="shopping-cart-list">
                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="{!! asset('customer/img/thumb-product01.jpg') !!}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">5000 FCFA<span class="qty">x3</span></h3>
                                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                            </div>
                                            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="{!! asset('customer/img/thumb-product01.jpg') !!}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">3500 FCFA <span class="qty">x3</span></h3>
                                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                            </div>
                                            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="{!! asset('customer/img/thumb-product01.jpg') !!}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">3500 FCFA <span class="qty">x3</span></h3>
                                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                            </div>
                                            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="{!! asset('customer/img/thumb-product01.jpg') !!}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">3500 FCFA <span class="qty">x3</span></h3>
                                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                            </div>
                                            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <div class="shopping-cart-btns">
                                        <button class="main-btn">Voir panier</button>
                                        <button class="primary-btn">Commander <i class="fa fa-arrow-circle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- /Cart -->

                        <!-- Mobile nav toggle-->
                        <li class="nav-toggle">
                            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                        </li>
                        <!-- / Mobile nav toggle -->
                    </ul>
                </div>
            </div>
            <!-- header -->
        </div>
        <!-- container -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">
                <!-- category nav -->
                @if(isset($home))
                <div class="category-nav">
                @else
                <div class="category-nav show-on-click">
                @endif
                    <span class="category-header">Categories <i class="fa fa-list"></i></span>
                    <ul class="category-list">
                        <li><a href="{!! url('/products/0') !!}">Voir tout</a></li>
                        @foreach($categories as $elt)
                        <li><a href="{!! url('/products/'.$elt->id) !!}">{!! $elt->name !!}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- /category nav -->

                <!-- menu nav -->
                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="{!! url('/') !!}">Accueil</a></li>
                        <li><a href="{!! url('/products/0') !!}">Ventes</a></li>
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->


    @if(session('error'))
    <div class="row">
        <div class="alert alert-danger" role="alert">
          <b><center>{!! session('error') !!}</center></b>
        </div>
    </div>
    @endif