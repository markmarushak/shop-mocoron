<li class="nav-item">
    <a class="nav-link" href="{{ route('cabinet') }}">
        <i class="material-icons">dashboard</i>
        <p>Dashboards</p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('cabinet-product') }}">
        <i class="material-icons">build</i>
        <p>Create Product</p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('edit-account') }}">
        <i class="material-icons">face</i>
        <p>Edit Account</p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}"
       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="material-icons">account_circle</i>
        <p>Logout</p>
    </a>
</li>