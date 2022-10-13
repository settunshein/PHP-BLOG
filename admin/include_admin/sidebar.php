<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
            <span class="font-weight-bold">GENERAL</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $dashboard_active ?>" href="dashboard.php">
                    <span data-feather="archive"></span>
                    Dashboard
                </a>
            </li>
            
            <?php if( $auth_user->role == 'admin' ): ?>
            <li class="nav-item">
                <a class="nav-link <?= $category_active ?>" href="category_index.php">
                    <span data-feather="align-right"></span>
                    Category
                </a>
            </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link <?= $post_active ?>" href="post_index.php">
                    <span data-feather="feather"></span>
                    Post
                </a>
            </li>
            
            <?php if( $auth_user->role == 'admin' ): ?>
            <li class="nav-item">
                <a class="nav-link <?= $comment_active ?>" href="comment_index.php">
                    <span data-feather="message-square"></span>
                    Comments
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= $user_active ?>" href="user_index.php">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            <?php endif; ?>
        </ul>



        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span class="font-weight-bold">SETTINGS</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link <?= $profile_active ?>" href="profile_index.php">
                    <span data-feather="user"></span>
                    Profile
                </a>
            </li>
            <!--
            <li class="nav-item">
                <a class="nav-link" href="../db_seed.php">
                    <span data-feather="database"></span>
                    Database Seeding
                </a>
            </li>
            -->
            <li class="nav-item">
                <form method="GET">
                    <button type="submit" class="text-left nav-link border-0 d-block w-100 logout-btn" name="logout">
                        <span data-feather="log-out"></span>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>