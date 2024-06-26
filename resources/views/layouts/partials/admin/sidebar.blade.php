<?php
$myProfile = Check::getUserProfile();
$getSidebar = Check::getMenu();

$noShowMenu = [];
$pushShowMenu = [];

$currentUrl = Check::getCurrentUrl();
$validateIdSidebar = [];
?>

@foreach ($getSidebar as $item)
    <?php
    $validateIdSidebar[] = $item->id;
    ?>
    @if ($item->is_node_management_menu == '1')
        <?php
        $subMenu = $item->membawahi_menu_management_menu;
        $getMenu = explode(',', $subMenu);
        $noShowMenu = array_merge($noShowMenu, $getMenu);
        ?>
    @endif
@endforeach

<?php
$pushShowMenu = array_values(array_unique($noShowMenu));
$correctIdSidebar = [];
foreach ($pushShowMenu as $key => $item) {
    if (in_array($item, $validateIdSidebar)) {
        $correctIdSidebar[] = $item;
    }
}
?>
<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="sidebar-title">Menu aplikasi</li>
        @foreach ($getSidebar as $item)
            @if ($item->is_node_management_menu == '1')
                <?php
                $subMenu = $item->membawahi_menu_management_menu;
                $getMenu = explode(',', $subMenu);
                $dbMenu = Check::getMenuInId($getMenu);
                $colLinkManagementMenu = [];
                foreach ($dbMenu as $key => $value):
                    if (in_array($value->id, $correctIdSidebar)):
                        $colLinkManagementMenu[] = $value->link_management_menu;
                    endif;
                endforeach;
                ?>
                <li @if (in_array($currentUrl, $colLinkManagementMenu)) class="open" @endif>
                    <a href="{{ $item->link_management_menu }}"><i
                            data-feather="{{ $item->icon_management_menu }}"></i>{{ $item->nama_management_menu }}<i
                            class="fas fa-chevron-right dropdown-icon"></i></a>
                    <ul>
                        <?php
                        $subMenu = $item->membawahi_menu_management_menu;
                        $getMenu = explode(',', $subMenu);
                        $dbMenu = Check::getMenuInId($getMenu);
                        ?>

                        @foreach ($dbMenu as $sub_item)
                            @if (in_array($sub_item->id, $correctIdSidebar))
                                <li class="{{ $currentUrl == $sub_item->link_management_menu ? 'active-page' : '' }}"><a
                                        style="{{ $currentUrl == $sub_item->link_management_menu
                                            ? 'border-radius: 10px; background-color: #f3f6f9; color: #7888fc; font-weight: 500;'
                                            : '' }}"
                                        href="{{ url($sub_item->link_management_menu) }}"><i
                                            class="{{ $sub_item->icon_management_menu }}"></i>{{ $sub_item->nama_management_menu }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @else
                @if (!in_array($item->id, $correctIdSidebar))
                    <li class="{{ $currentUrl == $item->link_management_menu ? 'active-page' : '' }}">
                        <a href="{{ url($item->link_management_menu) }}"
                            class="{{ $item->link_management_menu == '/logout' ? 'btn-logout' : '' }}"><i
                                data-feather="{{ $item->icon_management_menu }}"></i>{{ $item->nama_management_menu }}</a>
                    </li>
                @endif
            @endif
        @endforeach
    </ul>
</div>
