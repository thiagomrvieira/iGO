<nav class="navbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}"> 
                <img src="{{    Route::currentRouteName() === 'home' ? asset('/assets-backoffice-partner/images/home_selected.png')  : asset('/assets-backoffice-partner/images/home.png') }}" halt="">
                <span class="{{    Route::currentRouteName() === 'home' ? 'nav-link-focus' : '' }}">Home</span> 
                {{-- {{ Route::currentRouteName() }} --}}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('partner.createBusiness.data') }}">
                <img src="{{  Route::currentRouteName() === 'partner.createBusiness.data' ? asset('/assets-backoffice-partner/images/dados_rest_sel.png')  : asset('/assets-backoffice-partner/images/dados_rest.png')  }}" alt="">
                <span class="{{  Route::currentRouteName() === 'partner.createBusiness.data' ?  'nav-link-focus' : ''  }}">Dados negócios</span> 
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}"> 
                <img src="{{  Route::currentRouteName() === 'products.create' || Route::currentRouteName() === 'products.index' ? asset('/assets-backoffice-partner/images/dados_prod_rest_sel.png')  : asset('/assets-backoffice-partner/images/dados_prod_rest.png')  }}" alt="">
                <span class="{{  Route::currentRouteName() === 'products.create' || Route::currentRouteName() === 'products.index' ? 'nav-link-focus' : ''  }}">Dados produtos</span> 
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('partner.profile.edit') }}">  
                <img src="{{  Route::currentRouteName() === 'partner.profile.edit' ? asset('/assets-backoffice-partner/images/perfil_sel.png')  : asset('/assets-backoffice-partner/images/perfil.png')  }}" alt="">
                <span class="{{  Route::currentRouteName() === 'partner.profile.edit' ? 'nav-link-focus' : '' }}">Perfil</span> 
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
