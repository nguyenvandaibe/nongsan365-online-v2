<nav class="nav">
    <a
        href="{{route('seller.products.show', ['product' => $product->id])}}"
        class="nav-link py-0 text-dark"
    >
        Thông tin sản phẩm
    </a>

    <a
        href="{{route('seller.products.growth', ['product' => $product->id])}}"
        class="nav-link py-0 text-dark"
    >
        Quá trình phát triển
    </a>

    <a
        id="navbarDropdown"
        class="nav-link dropdown-toggle py-0 text-dark"
        href="#"
        role="button"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
    >
        Nhật ký
    </a>

    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">
            Nhật ký thực hành sản xuất
        </a>
        <a class="dropdown-item" href="#">
            Nhật ký mua vật tư
        </a>
    </div>
</nav>
