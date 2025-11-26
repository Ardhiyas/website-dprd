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
                        @foreach ($link['dropdown'] as $child)
                        <li><a href="{{ route($child['route']) }}">{{ $child['label'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
