<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
    @foreach($items as $menu_item)
        <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
            <a href="{{ $menu_item->link() }}" class="m-menu__link ">
                <i class="m-menu__link-icon {{ $menu_item->icon_class }}"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            {{ $menu_item->title }}
                        </span>                        
                    </span>
                </span>            
            </a>
        </li>
    @endforeach
</ul>