<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        @foreach($menuList->item as $menu)
            @if ($menu['parent'] == 0)
                @if (count($menu['sub_menu']))
                    <li class="treeview">
                        <a href={{$menu['link']}}>
                            <i class="{{$menu['style']}}"></i> <span>{{$menu['name']}}</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            @foreach($menu['sub_menu'] as $assignment)
                                <li><a href={{$assignment['function_url']}}><i class="{{$assignment['function_style']}}"></i>{{$assignment['name']}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li>
                        <a href={{$menu['link']}}> <i class="{{$menu['style']}}"></i> <span>{{$menu['name']}}</span></a>
                    </li>
                @endif
            @endif
        @endforeach
    </ul>
</section>
<!-- /.sidebar -->