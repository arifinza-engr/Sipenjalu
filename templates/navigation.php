<?php
// Navigation template - requires $userData to be available globally
global $userData;
$menu = getNavigationMenu($userData['level']);
?>

<nav class="fixed top-0 left-0 right-0 z-50 bg-bg-secondary/90 backdrop-blur-xl border-b border-dark-700/50 shadow-2xl" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a class="flex items-center space-x-3 font-bold text-white hover:text-primary-400 transition-colors" href="index">
                <img src="assets/img/tittle.png" alt="Logo" width="32" height="32" class="rounded-lg">
                <span id="text-brand" class="text-xl font-display tracking-wide">SIPENJALU</span>
            </a>

            <div class="hidden md:flex items-center space-x-8">
                <div class="flex items-center space-x-6">
                    <?php
                    // Render menu items manually for desktop
                    foreach ($menu as $key => $item) {
                        if (!isset($item['roles']) || !in_array($userData['level'], $item['roles'])) {
                            continue;
                        }

                        if (isset($item['submenu'])) {
                            echo renderDropdownMenu($item, false);
                        } else {
                            echo renderMenuLink($item, false);
                        }
                    }
                    ?>
                </div>

                <?php echo renderUserSection($userData); ?>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden text-white p-2 rounded-lg hover:bg-dark-800 transition-colors" id="mobile-menu-button">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-bg-tertiary/95 backdrop-blur-xl rounded-lg mt-2 border border-dark-700 shadow-2xl">
                <?php
                // Render menu items manually for mobile
                foreach ($menu as $key => $item) {
                    if (!isset($item['roles']) || !in_array($userData['level'], $item['roles'])) {
                        continue;
                    }

                    if (isset($item['submenu'])) {
                        echo renderDropdownMenu($item, true);
                    } else {
                        echo renderMenuLink($item, true);
                    }
                }
                ?>
                <?php echo renderUserSection($userData, true); ?>
            </div>
        </div>
    </div>
</nav>

<div class="fixed top-4 right-4 z-40">
    <button class="bg-dark-800/80 backdrop-blur-sm border border-dark-600 text-dark-200 hover:text-white p-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105" type="button" id="themeToggle" aria-label="Toggle theme">
        <i class="fas fa-moon text-lg"></i>
    </button>
</div>