<!-- Sidebar -->
<div class="sidebar-fixed position-fixed">

    <a class="logo-wrapper waves-effect">
        <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
    </a>

    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item active waves-effect">
            <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        {{-- COLLECTION --}}
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-user mr-3"></i>Profile</a>
        <div class="dropdown">
            <button class="list-group-item list-group-item-action waves-effect dropdown-toggle" type="button"
                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user mr-3"></i>Collections
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ url('group') }}">Group</a></li>
                <li><a class="dropdown-item" href="{{ url('category') }}">Category</a></li>
                <li><a class="dropdown-item" href="{{ url('sub-category') }}">Sub Category</a></li>
                <li><a class="dropdown-item" href="{{ url('products') }}">Products (Item)</a></li>
            </ul>
        </div>

        {{-- END COLLECTION --}}
        
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-table mr-3"></i>Tables</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-map mr-3"></i>Maps</a>
        <a href="{{ url('registered-user') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-users mr-3"></i>Registered Users</a>
    </div>

</div>
<!-- Sidebar -->
