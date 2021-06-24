<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
      <img src="{{ asset('assets-backoffice/dist/img/iGOLogo.png') }}" alt="iGO Logo" class="brand-image img-circle" style="opacity: .8 ; max-height: 42px; margin-left: 0.6rem;">
      <span class="brand-text font-weight-light">É só pedir!</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="{{ route('deliveryman.index') }}" class="nav-link">
                <i class="nav-icon fas fa-shipping-fast"></i>
                <p>
                  Estafetas
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Aderentes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('partner.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-pencil-alt"></i>
                    <p>Pré-cadasto</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-pencil-alt"></i>
                    <p>Categorias</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chalkboard"></i>
                <p>
                  Conteúdo do site
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('content.show', ['content' => 'about']) }}" class="nav-link">
                    <i class="nav-icon fas fa-pencil-alt"></i>
                    <p>Sobre nós</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('content.show', ['content' => 'faq']) }}" class="nav-link">
                    <i class="nav-icon fas fa-pencil-alt"></i>
                    <p>FAQs</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('content.show', ['content' => 'conditions']) }}" class="nav-link">
                    <i class="nav-icon fas fa-pencil-alt"></i>
                    <p>Termos e condições</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('content.show', ['content' => 'contacts']) }}" class="nav-link">
                    <i class="nav-icon fas fa-pencil-alt"></i>
                    <p>Contactos</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>