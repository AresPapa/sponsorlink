<?php
if ( ! defined('ABSPATH') ) { exit; }

/**
 * Shortcode: [sl_user_dashboard]
 * Keep markup minimal; styling lives in assets/css/dashboard.css
 */
add_shortcode('sl_user_dashboard', function () {
    if ( ! is_user_logged_in() ) {
        return '<p>Please log in to view your dashboard.</p>';
    }

    ob_start();
    ?>
    <div id="sl-dashboard" class="sl-dash">
        <nav class="sl-dash__side">
            <ul>
                <li><a href="#" class="sl-dash__link is-active" data-section="overview">Overview</a></li>
                <li><a href="#" class="sl-dash__link" data-section="profile">Profile</a></li>
                <li><a href="#" class="sl-dash__link" data-section="negotiations">Negotiations</a></li>
                <li><a href="#" class="sl-dash__link" data-section="settings">Settings</a></li>
            </ul>
        </nav>

        <main id="sl-dash-content" class="sl-dash__content" aria-live="polite">
            <p>Loading…</p>
        </main>
    </div>
    <?php
    return ob_get_clean();
});
