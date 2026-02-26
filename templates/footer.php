<!-- Footer -->
<footer class="border-t border-dark-700/50 bg-bg-secondary/30 backdrop-blur-sm mt-auto" id="footer">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="text-center">
            <p class="text-dark-400 text-sm">
                Copyright &copy; <span class="text-primary-400 font-semibold">SIPENJALU</span> 2024 All rights reserved
            </p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
    (function() {
        const root = document.documentElement;
        const toggle = document.getElementById('themeToggle');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        function updateIcon(theme) {
            const icon = theme === 'dark' ? 'fa-sun' : 'fa-moon';
            toggle.innerHTML = '<i class="fas ' + icon + ' text-lg"></i>';
        }

        // Theme toggle
        if (toggle) {
            updateIcon(root.getAttribute('data-theme'));
            toggle.addEventListener('click', function() {
                const nextTheme = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                root.setAttribute('data-theme', nextTheme);
                localStorage.setItem('sipenjalu-theme', nextTheme);
                updateIcon(nextTheme);
            });
        }

        // Mobile menu toggle
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }

        // Simple modal system
        window.showModal = function(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }
        };

        window.hideModal = function(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        };

        // Close modal when clicking overlay
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal-overlay')) {
                event.target.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    })();
</script>

</body>
</html>