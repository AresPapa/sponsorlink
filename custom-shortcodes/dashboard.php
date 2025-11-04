// =============== USER DASHBOARD SHORTCODE ===============


<?php
add_shortcode('user_dashboard', function() {
    if (!is_user_logged_in()) {
        return '<p>Please log in to view your dashboard.</p>';
    }

    ob_start(); ?>

    <style>
        #dashboard-container {
            display: flex;
            gap: 20px;
            min-height: 60vh;
        }
        #dashboard-menu {
            width: 220px;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }
        #dashboard-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        #dashboard-menu li {
            margin-bottom: 10px;
        }
        .dashboard-link {
            display: block;
            padding: 10px 14px;
            border-radius: 6px;
            background: #e9ecef;
            color: #333;
            text-decoration: none;
            transition: background 0.2s;
        }
        .dashboard-link:hover {
            background: #dce0e3;
        }
        .dashboard-link.active {
            background: #0073aa;
            color: #fff;
        }
        #dashboard-content {
            flex: 1;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }
    </style>

    <div id="dashboard-container">
        <div id="dashboard-menu">
            <ul>
                <li><a href="#" class="dashboard-link active" data-section="overview">Overview</a></li>
                <li><a href="#" class="dashboard-link" data-section="profile">Profile</a></li>
                <li><a href="#" class="dashboard-link" data-section="negotiations">Negotiations</a></li>
                <li><a href="#" class="dashboard-link" data-section="settings">Settings</a></li>
            </ul>
        </div>

        <div id="dashboard-content">
            <p>Welcome to your dashboard! Select a section.</p>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.dashboard-link');
        const content = document.getElementById('dashboard-content');

        function loadSection(section) {
            content.innerHTML = '<p>Loading...</p>';
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: new URLSearchParams({
                    action: 'load_dashboard_section',
                    section: section
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    content.innerHTML = data.data;
                } else {
                    content.innerHTML = '<p>Error loading content.</p>';
                }
            });
        }

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                links.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                loadSection(this.dataset.section);
            });
        });

        // Load overview by default
        loadSection('overview');
    });
    </script>

    <?php
    return ob_get_clean();
});


// =============== AJAX HANDLER ===============
add_action('wp_ajax_load_dashboard_section', function() {
    if (!is_user_logged_in()) {
        wp_send_json_error('Not logged in');
    }

    $section = sanitize_text_field($_POST['section']);
    $user = wp_get_current_user();

    ob_start();

    switch ($section) {
        case 'overview':
            echo '<h2>Overview</h2>';
            echo '<p>Welcome back, <strong>' . esc_html($user->display_name) . '</strong>!</p>';
            echo '<p>This is your overview section where you can see a summary of your recent activity.</p>';
            break;

        case 'profile':
            echo '<h2>Your Profile</h2>';
            echo '<p><strong>Email:</strong> ' . esc_html($user->user_email) . '</p>';
            echo '<p><strong>Username:</strong> ' . esc_html($user->user_login) . '</p>';
            break;

        case 'negotiations':
            echo '<h2>Negotiations</h2>';
            echo '<p>Your ongoing sponsorship negotiations will appear here.</p>';
            break;

        case 'settings':
            echo '<h2>Settings</h2>';
            echo '<p>Manage your account preferences and privacy options here.</p>';
            break;

        default:
            echo '<p>Invalid section.</p>';
            break;
    }

    wp_send_json_success(ob_get_clean());
});
