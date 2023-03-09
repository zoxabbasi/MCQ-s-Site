
<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item dropdown has-divider has-user-avatar">
                <a class="navbar-link">
                    {{-- <div class="is-user-name"><span>{{ auth()->user()->name }}</span></div> --}}
                    <span class="icon"><i class="mdi"></i></span>
                </a>
            </div>
            <a href="https:/tailwind-admin-templates"
                class="navbar-item has-divider desktop-icon-only">
                <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
                <span>About</span>
            </a>
            <a href="https://github.com/"
                class="navbar-item has-divider desktop-icon-only">
                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                <span>GitHub</span>
            </a>

            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#logoutModal">Logout
            {{-- <a title="Log out" class="navbar-item desktop-icon-only"> --}}
                <span class="icon"><i class="mdi mdi-logout"></i></span>
            </button>
        </div>
    </div>
</nav>
@include('partials.admin.modal')
