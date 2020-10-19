<li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}"><a class="nav-link" href="/"><i class="ficon feather icon-home"></i> Home</a></li>
<li class="nav-item {{ (request()->is('author')) ? 'active' : '' }}"><a class="nav-link" href="/author"><i class="ficon feather icon-users"></i> Author</a></li>
<li class="nav-item {{ (request()->is('unduh')) ? 'active' : '' }}"><a class="nav-link" href="#"><i class="ficon feather icon-book"></i> Unduh</a></li>
<li class="nav-item"><a href="/login" class="nav-link"><i class="ficon feather icon-user"></i> Login</a></li>