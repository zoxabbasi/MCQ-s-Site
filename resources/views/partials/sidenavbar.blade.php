<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            MCQ'S <b class="font-black">Only</b>
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
        <p class="menu-label">Quiz</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
                <a href="{{ route('admin.subjects') }}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Subjects</span>
                </a>
            </li>
            <li class="--set-active-forms-html">
                <a href="{{ route('admin.topics') }}">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Topics</span>
                </a>
            </li>
            <li class="--set-active-profile-html">
                <a href="{{ route('admin.questions') }}">
                    <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
                    <span class="menu-item-label">Questions</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">About</p>
        <ul class="menu-list">
            <li>
                <a href="#" class="has-icon">
                    <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                    <span class="menu-item-label">About</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
