@inject('basket', 'App\Support\Basket\Basket')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">سیستم پرداخت</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('products.index') }}">محصولات</a>
          </li>


        </ul>
        <ul class="navbar-nav for-auth">
            <li class="nav-item">
                <a type="button" class="btn btn-primary position-relative" href="{{ route('basket.index') }}">
                    سبد خرید
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                      {{ $basket->itemCount() }}
                      <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
              </li>
            @if (!Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ورود</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">ثبت</a>
              </li>
              @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <form method="POST" action="{{ route('logout') }}">
                            @csrf
                  <li><button type="submit" class="dropdown-item">خروج</button></li>
                     </form>

                </ul>
              </li>
              @endif
        </ul>
      </div>
    </div>
  </nav>
