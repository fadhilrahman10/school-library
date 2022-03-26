 <!-- Sidebar -->
 <div class="border-right" id="sidebar-wrapper">
     <div class="sidebar-heading text-center">
         <img src="/images/logo.png" alt="Logo Admin" class="my-4" style="max-width: 80px;" />
     </div>
     <div class="list-group list-group-flush">
         <a href="/home"
             class="list-group-item list-group-item-action {{ Request::is('home') ? 'active' : '' }}">Dashboard</a>
         @if (Auth::user()->roles == 'ADMIN')
             <a href="/user"
                 class="list-group-item list-group-item-action {{ Request::is('user*') ? 'active' : '' }}">Users</a>
         @endif
         <a href="/book"
             class="list-group-item list-group-item-action {{ Request::is('book*') ? 'active' : '' }}">Books</a>
         <a href="/creator"
             class="list-group-item list-group-item-action {{ Request::is('creator*') ? 'active' : '' }}">Creators</a>
         <a href="{{ route('logout') }}"
             onclick="event.preventDefault();document.getElementById('logout-form').submit();"
             class="list-group-item list-group-item-action">Sign Out</a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
     </div>
 </div>
 <!-- /#sidebar-wrapper --
