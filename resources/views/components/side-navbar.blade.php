<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            MCQ <b class="font-black">Questions</b>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li class="active">
                <a href="{{ route('admin.dashboard') }}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Links</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
                <a href="{{ route('admin.subjects') }}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Subjects</span>
                </a>
            </li>
            <li class="--set-active-forms-html">
                <a href="{{ route('admin.topics') }}">
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                    <span class="menu-item-label">Topics</span>
                </a>
            </li>
            <li class="--set-active-profile-html">
                <a href="{{ route('admin.questions') }}">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Questions</span>
                </a>
            </li>
            <li>
                <a href="{{ route('login') }}">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    <span class="menu-item-label">Login</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">About</p>
        <ul class="menu-list">
            <li>
                <a href="https://justboil.me/tailwind-admin-templates" class="has-icon">
                    <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                    <span class="menu-item-label">About</span>
                </a>
            </li>
            <li>
                <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span class="menu-item-label">GitHub</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
