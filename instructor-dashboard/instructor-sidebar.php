<aside class="sidebar">
    <header class="sidebar-header">
        <img src="\launchpad\images\logo-text.svg" class="logo-img">
    </header>

    <nav>
        <a href="instructor-dashboard.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'instructor-dashboard.php') ? 'active' : ''; ?>">
            <button>
                <span>
                    <i><img src="\launchpad\images\home-icon.png" alt="home-logo" class="logo-ic"></i>
                    <span>Home</span>
                </span>
            </button>
        </a>
        
        <!-- Link to the Evaluation page -->
        <a href="evaluation.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'evaluation.php') ? 'active' : ''; ?>">
            <button>
                <span>
                    <i><img src="\launchpad\images\evaluation.png" alt="evaluation-logo" class="logo-ic"></i>
                    <span>Evaluation</span>
                </span>
            </button>
        </a>

        <!-- YOUR COMPANY SECTION -->
        <p class="divider-company">Student Projects</p>
        <a href="company.php">
            <button>
                <span class="btn-create-company">
                    <i>
                        <div class="circle-avatar">
                            <img src="\launchpad\images\join-company-icon.png" alt="">
                        </div>
                    </i>
                    <span class="create-company-text">Create your company</span>
                </span>
            </button>
        </a>

    </nav>
</aside>
