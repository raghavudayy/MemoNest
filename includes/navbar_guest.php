<?php
$currentPage = basename($_SERVER['PHP_SELF']);

function activeClass($page)
{
    global $currentPage;

    return ($currentPage == $page)
        ? 'text-blue-500 border-b-2 border-blue-500'
        : 'text-gray-300 hover:text-white';
}
?>
<style>
:root {
    --navbar-bg: #0B0F19;
    --navbar-surface: #131A26;
    --navbar-card: #1B2333;
    --navbar-primary: #6D5EF5;
    --navbar-primary-hover: #7C6EFF;
    --navbar-text: #F5F7FA;
    --navbar-text-secondary: #97A1B5;
    --navbar-border: rgba(255, 255, 255, 0.08);
    --navbar-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    --navbar-blur: 16px;
    --navbar-radius: 12px;
    --navbar-height: 76px;
    --transition: 250ms cubic-bezier(0.4, 0, 0.2, 1);
}

.lumora-nav-container {
    position: sticky;
    top: 0;
    z-index: 1000;
    width: 100%;
    height: var(--navbar-height);
    background: rgba(11, 15, 25, 0.75);
    backdrop-filter: blur(var(--navbar-blur));
    -webkit-backdrop-filter: blur(var(--navbar-blur));
    border-bottom: 1px solid var(--navbar-border);
    box-shadow: var(--navbar-shadow);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 24px;
    box-sizing: border-box;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: var(--navbar-text);
}

/* Left Section */
.nav-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.nav-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    color: inherit;
    transition: var(--transition);
}

.nav-logo:hover {
    opacity: 0.9;
    transform: translateY(-1px);
}

.logo-icon {
    width: 32px;
    height: 32px;
    background: var(--navbar-primary);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo-name {
    font-size: 20px;
    font-weight: 700;
    letter-spacing: -0.02em;
}

.nav-divider {
    width: 1px;
    height: 20px;
    background: var(--navbar-border);
}

.page-title {
    font-size: 16px;
    font-weight: 500;
    color: var(--navbar-text-secondary);
}

/* Center Section - Search */
.nav-center {
    flex: 1;
    max-width: 480px;
    margin: 0 32px;
    position: relative;
}

.search-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.search-input {
    width: 100%;
    background: var(--navbar-surface);
    border: 1px solid var(--navbar-border);
    border-radius: 24px;
    padding: 10px 44px;
    color: var(--navbar-text);
    font-size: 14px;
    transition: var(--transition);
    outline: none;
}

.search-input:focus {
    border-color: var(--navbar-primary);
    background: var(--navbar-bg);
    box-shadow: 0 0 0 4px rgba(109, 94, 245, 0.15);
}

.search-icon {
    position: absolute;
    left: 16px;
    opacity: 0.5;
}

.search-shortcut {
    position: absolute;
    right: 12px;
    background: var(--navbar-card);
    border: 1px solid var(--navbar-border);
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 11px;
    color: var(--navbar-text-secondary);
    pointer-events: none;
}

/* Right Section */
.nav-right {
    display: flex;
    align-items: center;
    gap: 16px;
}

.btn-new-entry {
    background: var(--navbar-primary);
    color: white;
    border: none;
    padding: 8px 18px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
    box-shadow: 0 4px 12px rgba(109, 94, 245, 0.25);
}

.btn-new-entry:hover {
    background: var(--navbar-primary-hover);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(109, 94, 245, 0.35);
}

.icon-btn {
    background: none;
    border: none;
    color: var(--navbar-text-secondary);
    cursor: pointer;
    padding: 8px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
    position: relative;
}

.icon-btn:hover {
    background: var(--navbar-surface);
    color: var(--navbar-text);
}

.badge {
    position: absolute;
    top: 6px;
    right: 6px;
    width: 8px;
    height: 8px;
    background: #FF4D4D;
    border: 2px solid var(--navbar-bg);
    border-radius: 50%;
}

/* Profile Dropdown */
.profile-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 4px;
    background: var(--navbar-surface);
    border: 1px solid var(--navbar-border);
    border-radius: 24px;
    cursor: pointer;
    transition: var(--transition);
    position: relative;
}

.profile-trigger:hover {
    border-color: var(--navbar-primary);
}

.avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
}

.dropdown-arrow {
    margin-right: 8px;
    font-size: 12px;
    color: var(--navbar-text-secondary);
}

.profile-dropdown {
    position: absolute;
    top: calc(100% + 12px);
    right: 0;
    width: 240px;
    background: var(--navbar-card);
    border: 1px solid var(--navbar-border);
    border-radius: var(--navbar-radius);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    padding: 8px;
    visibility: hidden;
    opacity: 0;
    transform: translateY(10px);
    transition: var(--transition);
    z-index: 1001;
}

.profile-trigger:focus-within .profile-dropdown,
.profile-trigger.active .profile-dropdown {
    visibility: visible;
    opacity: 1;
    transform: translateY(0);
}

.dropdown-header {
    padding: 12px;
    border-bottom: 1px solid var(--navbar-border);
    margin-bottom: 8px;
}

.user-name {
    display: block;
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 2px;
}

.user-email {
    display: block;
    font-size: 12px;
    color: var(--navbar-text-secondary);
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border-radius: 8px;
    text-decoration: none;
    color: var(--navbar-text);
    font-size: 14px;
    transition: var(--transition);
}

.dropdown-item:hover {
    background: var(--navbar-surface);
    color: var(--navbar-primary);
}

.dropdown-item.logout {
    color: #FF4D4D;
    margin-top: 8px;
    border-top: 1px solid var(--navbar-border);
    border-radius: 0 0 8px 8px;
}

/* Responsive */
@media (max-width: 1024px) {
    .nav-center {
        max-width: 300px;
        margin: 0 16px;
    }
}

@media (max-width: 768px) {

    .nav-divider,
    .page-title,
    .search-shortcut,
    .btn-new-entry-text {
        display: none;
    }

    .nav-center {
        margin: 0;
        flex: 0;
    }

    .search-input {
        width: 40px;
        padding: 10px;
        cursor: pointer;
        border-radius: 50%;
    }

    .search-input:focus {
        position: absolute;
        right: -100px;
        width: 200px;
        border-radius: 24px;
        padding: 10px 44px;
    }
}
</style>

<header class="lumora-nav-container w-100">
    <!-- Left Section -->
    <div class="nav-left">
        <a href="dashboard.php" class="nav-logo">
            <img src="uploads/logo.png" class="w-30 h-12 object-cover">
        </a>
        <div class="nav-divider"></div>
        
    </div>

     <!-- Desktop Nav -->
            <div class="hidden md:flex items-center gap-8">
                <a class="text-on-surface-variant/80 hover:text-on-surface transition-colors hover:bg-white/5 px-2 py-1 rounded <?= activeClass('index.php') ?>"
                    href="index.php">Home</a>
                <a class="text-on-surface-variant/80 hover:text-on-surface transition-colors hover:bg-white/5 px-2 py-1 rounded <?= activeClass('features.php') ?>"
                    href="features.php">Features</a>
                <a class="text-on-surface-variant/80 hover:text-on-surface transition-colors hover:bg-white/5 px-2 py-1 rounded <?= activeClass('about.php') ?>"
                    href="about.php">About</a>
            </div>
            <!-- Actions -->
            <div class="flex items-center gap-4">
                <a  href="signup.php";
                    class="hidden md:block text-on-surface hover:bg-white/5 px-4 py-2 rounded-full transition-colors font-label-sm text-label-sm">Sign
                    Up</a>
                <a  href="login.php";
                    class="bg-primary text-on-primary hover:bg-primary-fixed-dim px-6 py-2 rounded-full font-label-sm text-label-sm transition-colors shadow-lg">
                    LogIn</a>
            </div>
 
</header>

<script>
// Simple toggle for the profile dropdown if focus is not sufficient
const profileTrigger = document.querySelector(".profile-trigger");
if (profileTrigger) {

    profileTrigger.addEventListener("click", function(e) {
        this.classList.toggle("active");
        e.stopPropagation();
    });

    document.addEventListener("click", function() {
        profileTrigger.classList.remove("active");
    });

}

document.addEventListener('click', function() {
    profileTrigger.classList.remove('active');
});

// Prevent search shortcut display on mobile
if (window.innerWidth < 768) {
    const shortcut = document.querySelector(".search-shortcut");

    if (shortcut && window.innerWidth < 768) {
        shortcut.style.display = "none";
    }
}
</script>