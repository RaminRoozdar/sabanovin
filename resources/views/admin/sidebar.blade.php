<div class="list-group mb-2 d-none d-md-block d-lg-block d-xl-block">
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'dashboard' ? ' active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fa fa-cogs"></i> داشبورد</a>
    <a class="list-group-item list-group-item-action{{ (Request::segment(2) == 'user') ? ' active' : '' }}" href="{{ route('admin.user') }}"><i class="fa fa-users"></i> کاربرها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'category' ? ' active' : '' }}" href="{{ route('admin.category') }}"><i class="fa fa-fw fa-sitemap"></i> گروه ها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'product' ? ' active' : '' }}" href="{{ route('admin.product.index') }}"><i class="fa fa-product-hunt"></i> محصولات</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'invoice' ? ' active' : '' }}" href="{{ route('admin.invoice') }}"><i class="fa fa-bars"></i> فاکتور ها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'article' ? ' active' : '' }}" href="{{route('admin.article')}}"><i class="fa fa-file"></i> مقالات </a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'item' ? ' active' : '' }}" href="{{route('admin.item')}}"><i class="fa fa-newspaper-o"></i> اخبار </a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'customer' ? ' active' : '' }}" href="{{route('admin.customer')}}"><i class="fa fa-users"></i> مشتریان </a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'customer' ? ' active' : '' }}" href="{{route('admin.page')}}"><i class="fa fa-page"></i> صفحه ها </a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'setting' ? ' active' : '' }}" href="{{route('admin.setting')}}"><i class="fa fa-cog fa-spin"></i> تنظیمات </a>


</div>

<div class="nav-scroller d-block d-md-none d-lg-none d-xl-none mb-2 border">
    <nav class="nav nav-underline">
        <a class="nav-link{{ Request::segment(2) == 'dashboard' ? ' active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fa fa-cogs"></i> داشبورد</a>
        <a class="nav-link{{ (Request::segment(2) == 'user') ? ' active' : '' }}" href="{{ route('admin.user') }}"><i class="fa fa-users"></i> کاربرها</a>
        <a class="nav-link{{ Request::segment(2) == 'category' ? ' active' : '' }}" href="{{ route('admin.category') }}"><i class="fa fa-fw fa-sitemap"></i>گروه ها</a>
        <a class="nav-link{{ Request::segment(2) == 'product' ? ' active' : '' }}" href="{{ route('admin.product.index') }}"><i class="fa fa-product-hunt"></i>محصولات</a>
        <a class="nav-link{{ Request::segment(2) == 'invoice' ? ' active' : '' }}" href="{{ route('admin.invoice') }}"><i class="fa fa-bars"></i> فاکتور ها</a>
        <a class="nav-link{{ Request::segment(2) == 'article' ? ' active' : '' }}" href="{{route('admin.article')}}"><i class="fa fa-file"></i> مقالات </a>
        <a class="nav-link{{ Request::segment(2) == 'item' ? ' active' : '' }}" href="{{route('admin.item')}}"><i class="fa fa-newspaper-o"></i> اخبار </a>
        <a class="nav-link{{ Request::segment(2) == 'customer' ? ' active' : '' }}" href="{{route('admin.customer')}}"><i class="fa fa-users"></i> مشتریان </a>
        <a class="nav-link{{ Request::segment(2) == 'customer' ? ' active' : '' }}" href="{{route('admin.page')}}"><i class="fa fa-page"></i> صفحه ها </a>
        <a class="nav-link{{ Request::segment(2) == 'setting' ? ' active' : '' }}" href="{{route('admin.setting')}}"><i class="fa fa-cog fa-spin"></i> تنظیمات </a>
    </nav>
</div>
