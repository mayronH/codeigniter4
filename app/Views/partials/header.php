<header class="header">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse  justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/add-user">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fullcalendar">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/list-members">Member</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/list-students">Student</a>
                </li>
            </ul>
            <?php if (session()->get('isLoggedIn')) { ?>
                <a href="<?= base_url('logout') ?>" class="btn btn-logout"> 🚫 Logout</a>
            <?php } else { ?>
                <a href="<?= base_url('login') ?>" class="btn btn-login"> 🔐 Login</a>
            <?php } ?>
        </div>
    </nav>
</header>