<nav class="navbar navbar-vertical navbar-expand-lg">
        <script>
          var navbarStyle = window.config.config.phoenixNavbarStyle;
          if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
          }
        </script>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <!-- scrollbar removed-->
          <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
              <li class="nav-item">
                <!-- parent pages-->
                <div class="nav-item-wrapper">
                    <a class="nav-link dropdown-indicator label-1" href="" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="home">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon">
                                <span class="fas fa-caret-right"></span>
                            </div>
                            <span class="nav-link-icon">
                                <span data-feather="pie-chart"></span>
                            </span>
                            <span class="nav-link-text">Control Panel</span>
                        </div>
                    </a>
                    <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent show" data-bs-parent="#navbarVerticalCollapse" id="">
                            <li class="collapsed-nav-item-title d-none">
                                Home
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->is('admin/users*') ? 'active' : ''}}" href="{{route('users.index')}}" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text">Users</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{request()->is('admin/categories*') ? 'active' : ''}}" href="{{route('categories.index')}}" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text">Categories</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{request()->is('admin/materials*') ? 'active' : ''}}" href="{{route('materials.index')}}" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text">Materials</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{request()->is('admin/products*') ? 'active' : ''}}" href="{{route('products.index')}}" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text">Products</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{request()->is('admin/orders*') ? 'active' : ''}}" href="{{route('orders.index')}}" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text">Orders</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="navbar-vertical-footer">
          <button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button>
        </div>
      </nav>