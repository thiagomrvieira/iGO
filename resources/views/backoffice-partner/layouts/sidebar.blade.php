<nav class="navbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}"> 
                <img src="{{  asset('/assets-backoffice-partner/images/home.png') }}" alt="">
                <span>Home</span> 
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('partner.createBusiness.data') }}">
                <img src="{{  Route::currentRouteName() === 'partner.createBusiness.data' ? asset('/assets-backoffice-partner/images/dados_rest_sel.png')  : asset('/assets-backoffice-partner/images/dados_rest.png')  }}" alt="">
                <span>Dados negócios</span> 
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.create') }}"> 
                <img src="{{  Route::currentRouteName() === 'products.create' ? asset('/assets-backoffice-partner/images/dados_prod_rest_sel.png')  : asset('/assets-backoffice-partner/images/dados_prod_rest.png')  }}" alt="">
                <span>Dados produtos</span> 
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('partner.profile.edit') }}">  
                <img src="{{  Route::currentRouteName() === 'partner.profile.edit' ? asset('/assets-backoffice-partner/images/perfil_sel.png')  : asset('/assets-backoffice-partner/images/perfil.png')  }}" alt="">
                <span>Perfil</span> 
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">
                <img src="{{ asset('/assets-backoffice-partner/images/logout.png') }}" alt="">
                <span>Logout</span> 
            </a>
        </li>
    </ul>
</nav>
