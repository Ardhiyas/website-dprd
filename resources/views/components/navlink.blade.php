<nav id="navmenu" class="navmenu">
    <ul>
        @foreach ($links as $link)
            @if (!$link['isDropdown'])
                <li><a href="{{ route($link['route']) }}"
                        class="{{ $link['isActive'] ? 'active' : '' }}">{{ $link['label'] }}</a></li>
            @endif
            @if ($link['isDropdown'])
                <li class="dropdown"><a href="#"><span>{{ $link['label'] }}</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
