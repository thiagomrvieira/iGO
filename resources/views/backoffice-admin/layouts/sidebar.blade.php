<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin') }}" class="brand-link">
    <img src="{{ asset('assets-backoffice/dist/img/iGOLogo.png') }}" alt="iGO Logo" class="brand-image img-circle" style="opacity: .8 ; max-height: 42px; margin-left: 0.6rem;">
    <span class="brand-text font-weight-light">{{ __('backoffice/sidebar.slogan') }}</span>
  </a>
  
  <!-- Sidebar -->
  <div class="sidebar">
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        {{-- Deliveryman --}}
        <li class="nav-item">
          <a href="{{ route('deliveryman.index') }}" class="nav-link">
            <i class="nav-icon fas fa-shipping-fast"></i>
            <p>
              {{ __('backoffice/sidebar.deliverymen') }}
            </p>
          </a>
        </li>
        
        {{-- Partner --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-store"></i>
            <p>
              {{ __('backoffice/sidebar.partners') }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('partner.index') }}" class="nav-link">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p> {{ __('backoffice/sidebar.preregistation') }} </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p> {{ __('backoffice/sidebar.categories') }} </p>
              </a>
            </li>
          </ul>
        </li>
        
        {{-- Web Content --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chalkboard"></i>
            <p>
              {{ __('backoffice/sidebar.websitecontent') }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('content.show', ['content' => 'about']) }}" class="nav-link">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p> {{ __('backoffice/sidebar.about') }} </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('content.show', ['content' => 'faq']) }}" class="nav-link">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>{{ __('backoffice/sidebar.faqs') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('content.show', ['content' => 'conditions']) }}" class="nav-link">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>{{ __('backoffice/sidebar.conditions') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('content.show', ['content' => 'contacts']) }}" class="nav-link">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>{{ __('backoffice/sidebar.contacts') }}</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Campaigns --}}
        <li class="nav-item">
          <a href="{{ route('campaign.index') }}" class="nav-link">
            <i class="nav-icon fas fa-bullhorn"></i>
            <p>
              Campanhas
            </p>
          </a>
        </li>

        {{-- Featured Products --}}
        <li class="nav-item">
          <a href="{{ route('featured.index') }}" class="nav-link">
            <i class="nav-icon fas fa-ad"></i>
            <p>
              Destaques
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>