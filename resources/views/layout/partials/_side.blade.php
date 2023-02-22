<ul class="nav-menu">
    <li class="nav-item"><span class="crossLine"><a href="/admin" class="nav-link" id="">Home</a></span></li>
    <li class="nav-item"><span class="crossLine"><a href="/admin/users" class="nav-link" id="">Manage Users</a></span></li>
    <li class="nav-item"><span class="crossLine"><a href="/admin/articles" class="nav-link" id="">Manage Articles</a></span></li>
    <li class="nav-item"><span class="crossLine"><a href="/admin/events" class="nav-link" id="">Manage Events</a></span></li>
    <li class="nav-item"><span class="crossLine"><a href="/admin/exhibitions" class="nav-link" id="">Manage Exhibitions</a></span></li>
    <li class="nav-item"><span class="crossLine"><a href="/admin/profiles" class="nav-link" id="">Manage Profiles</a></span></li>
    <!-- <li class="nav-item"><span class="crossLine"><a href="manageCategoriesAndSpounsors.html" class="nav-link">Manage Categories & Spounsors</a></span></li> -->
    <li class="nav-item">
        <div class="menu-dropdown">
            <span class="crossLine">
                <a id="menuDropdownFunction" class="nav-link">Settings</a>
            </span>
            <div id="menuDropdown" class="menu-dropdown-content">
                <span class="crossLine"><a href="/admin/tags" class="nav-link">Manage Tags</a></span>
                <span class="crossLine"><a href="/admin/sponsers" class="nav-link">Manage Sponsors</a></span>
                {{-- <span class="crossLine"><a href="/socials" class="nav-link">Manage Social Medias</a></span> --}}
                {{-- <span class="crossLine"><a href="/lanuages" class="nav-link">Language</a></span> --}}
                <span class="crossLine"> <form action="admin/logout" method="get">@csrf<button type="submit" class="btn btn-default">Logout</button></form></span>

            </div>
        </div>
    </li>
</ul>
