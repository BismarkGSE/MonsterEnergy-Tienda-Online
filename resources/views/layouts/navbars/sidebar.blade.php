<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('admin') }}" class="simple-text logo-normal">
      {{ __('Monster Energy') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'categorias' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('categorias') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Gestionar Categorías') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'pedidos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('pedidos') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Gestionar Pedidos') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'productos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('productos') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Gestionar Productos') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
