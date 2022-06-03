<aside class="menu home-menu p-l-20" style="background-color:#fff">
    <div class="block has-text-centered p-t-20">
        <img
          src="/images/logo/logo.jpg"
          alt="Lightweight UI components for Vue.js based on Bulma"
          width="210"
        />
    </div>
    <ul class="menu-list">
    <li>
      <a  href="{{route('home', app()->getLocale())}}" class="{{Nav::isRoute('home')}}">
        <i class="fa fa-home m-r-3" aria-hidden="true"></i>
         {{__('Home')}}
      </a>
      <a  href="{{route('dashboard', app()->getLocale())}}" class="{{Nav::isRoute('dashboard')}}">
        <i class="fa fa-tachometer m-r-3" aria-hidden="true"></i>
         {{__('Dashboard')}}
      </a>
    </li>
    </ul>
    <p class="menu-label">
      {{__('Navigation Menu')}}
    </p>
    <ul class="menu-list">
      <li>
        <a href="{{route('supplier.index', app()->getLocale())}}" class="has-submenu {{Nav::isResource('supplier')}}"> 
          <i class="fa fa-fw fa-truck"></i> {{__('Manage Suppliers')}}
        </a>
        <ul class="submenu">
          <li><a href="{{route('supplier.index', app()->getLocale())}}" class="{{Nav::isRoute('supplier.index')}}">{{__('Suppliers List')}}</a></li>
          <li><a href="{{route('supplier.create', app()->getLocale())}}" class="{{Nav::isRoute('supplier.create')}}">{{__('Add Supplier')}}</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('category.index', app()->getLocale())}}" class="has-submenu {{ Nav::isResource('category') }}">
          <i class="fa fa-bars" aria-hidden="true"></i>
          {{ __('Manage Categories')}}
        </a>
        <ul class="submenu">
          <li><a class="{{Nav::isRoute('category.index')}}" href="{{route('category.index', app()->getLocale())}}">{{__('Category list')}}</a></li>
          <li><a class="{{Nav::isRoute('category.create')}}" href="{{route('category.create', app()->getLocale())}}">{{__('Add New Category')}}</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('product.index', app()->getLocale())}}" class="has-submenu {{Nav::isResource('product')}}">
          <i class="fa fa-product-hunt " aria-hidden="true"></i>
          {{__('Manage Inventory')}}
        </a>
        <ul class="submenu">
          <li><a class="{{Nav::isRoute('category.index')}}" href="{{route('category.index', app()->getLocale())}}">{{__('Category list')}}</a></li>
          <li><a class="{{Nav::isRoute('category.create')}}" href="{{route('category.create', app()->getLocale())}}">{{__('Add New Category')}}</a></li>
          <li><a class="{{Nav::isRoute('product.index')}}"href="{{route('product.index', app()->getLocale())}}">{{__('Products list')}}</a></li>
          <li><a class="{{Nav::isRoute('product.create')}}" href="{{route('product.create', app()->getLocale())}}">{{__('Add New Product')}}</a></li>
          <li><a class="{{Nav::isRoute('purchasing.index')}}" href="{{route('purchasing.index', app()->getLocale())}}">{{__('Purchasing')}}</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('customer.index', app()->getLocale())}}" class="has-submenu {{Nav::isResource('customer')}}">
          <i class="fa fa-users" aria-hidden="true"></i>
          {{__('Manage Customers')}}
        </a>
        <ul class="submenu">
          <li><a class="{{Nav::isRoute('customer.index')}}" href="{{route('customer.index', app()->getLocale())}}">{{__('Customer list')}}</a></li>
          <li><a class="{{Nav::isRoute('customer.create')}}" href="{{route('customer.create', app()->getLocale())}}">{{__('Add New Customer')}}</a></li>
        </ul>
      </li>
      <li>
        <a  href="{{url(app()->getLocale().'/home/sales/')}}" class="has-submenu {{Nav::isResource('sale')}}">
          <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
          {{__('Manage Sales')}}
        </a>
        <ul class="submenu">
          <li><a class="{{Nav::isRoute('/home/sales/view')}}" href="{{url(app()->getLocale().'/home/sales/view')}}">{{__('Sales Dashboard')}}</a></li>
          <li><a class="{{Nav::isRoute('/home/sales/create')}}" href="{{url(app()->getLocale().'/home/sales/create')}}">{{__('Start Sales Register')}}</a></li>
        </ul>
      </li>
      <li>
        <a  href="{{route('index', app()->getLocale())}}" class="has-submenu {{Nav::isResource('account')}}">
          <i class="fa fa-calculator" aria-hidden="true"></i>
          {{__('Manage Accounts')}}
        </a>
        <ul class="submenu">
          <li><a class="{{Nav::isRoute('/home/account/')}}" href="{{url(app()->getLocale().'/home/account/')}}">{{__('Account View')}}</a></li>
          <li><a class="{{Nav::isRoute('receive.index')}}" href="{{route('receive.index', app()->getLocale())}}">{{__('Cash Receives')}}</a></li>
          <li><a class="{{Nav::isRoute('expense.index')}}" href="{{route('expense.index', app()->getLocale())}}">{{__('Cash Expenses')}}</a></li>
          <li><a class="{{Nav::isRoute('drawings.index')}}" href="{{route('drawings.index', app()->getLocale())}}">{{__('Cash Drawings')}}</a></li>
          <li><a class="{{Nav::isRoute('deposit.index')}}" href="{{route('deposit.index', app()->getLocale())}}">{{__('Bank Deposit')}}</a></li>
          <li><a class="{{Nav::isResource('bank')}}" href="{{route('bank.index', app()->getLocale())}}">{{__('Banks List')}}</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('office.index', app()->getLocale())}}" class="has-submenu {{Nav::isResource('office')}}">
          <i class="fa fa-id-card-o" aria-hidden="true"></i>
          {{__('Manage Office')}}
        </a>
        <ul class="submenu">
          <li><a class="{{Nav::isRoute('office.index')}}" href="{{route('office.index', app()->getLocale())}}">{{__('Office list')}}</a></li>
          <li><a class="{{Nav::isRoute('office.create')}}" href="{{route('office.create', app()->getLocale())}}">{{__('Add New Office')}}</a></li>
        </ul>
      </li>
    </ul>
  </aside>

