<div class="header">

  <div class="head_logo">
    <a href="{{ route('main.show') }}"><img src="img/icon/logo_monster.png" alt="Logo Monster"></a>
  </div>

  <div class="head_menu">

    <ul class="main_menu">
      <li><a href="/ofertas">Ofertas</a></li>
      <li>
        <form action="{{ route('main.show') }}" method="get">
          <div class="input-group rounded">
            <input type="search" name="search" class="form-control rounded" placeholder="Search" />
            <span class="input-group-text border-0" id="search-addon">
              <i class="fas fa-search"></i>
            </span>
          </div>
        </form>
      </li>
    </ul>

  </div>

  <div class="head_user_menu">

    @if ( Auth::guard('usuarios')->check() )
    <div class="user_menu_item">
      <a href="{{ route('cart.list') }}">
        <svg style="margin:0 8px;width:24px;height:24px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C6.5 2 6.9 2.3 7 2.8L8 7L21 7C21.3 7 21.6 7.1 21.8 7.4C22 7.6 22 7.9 22 8.2L20 16.2C19.9 16.7 19.5 17 19 17L9 17C8.5 17 8.1 16.7 8 16.2L5.2 4L2 4V2L6 2ZM9.8 15L18.2 15L19.7 9L8.4 9L9.8 15ZM18 22C16.8954 22 16 21.1046 16 20C16 18.8954 16.8954 18 18 18C19.1046 18 20 18.8954 20 20C20 21.1046 19.1046 22 18 22ZM8 20C8 21.1046 8.89543 22 10 22C11.1046 22 12 21.1046 12 20C12 18.8954 11.1046 18 10 18C8.89543 18 8 18.8954 8 20Z" fill="#FFF"></path>
        </svg>
        <span>{{ \Cart::getTotalQuantity()}}</span>
      </a>
    </div>
    @endif

    <div class="user_menu_item">
      @if ( Auth::guard('usuarios')->check() )
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg style="margin:0 8px;width:24px;height:24px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24" class="Svg-sc-1w4q54b iyEeRT">
              <path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z" fill="#FFF"></path>
            </svg>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('account') }}">Mi Cuenta</a></li>
            <li><a class="dropdown-item" href="{{ route('mi.carrito') }}">Mi Carrito</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
          </ul>
        </li>
      </ul>
      @else
      <a href="{{ route('main.login') }}">
        <svg style="margin:0 8px;width:24px;height:24px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24" class="Svg-sc-1w4q54b iyEeRT">
          <path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z" fill="#FFF"></path>
        </svg>
        <span>Mi Cuenta</span>
      </a>
      @endif
    </div>

  </div>

</div>
