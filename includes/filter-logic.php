<?php

// 1. Footer Modal HTML & Logic
add_action( 'wp_footer', function() {
    if ( is_user_logged_in() ) return;
    ?>
    <div id="ecrModal" class="ecr-modal-overlay">
        <div class="ecr-modal-content">
            <span class="ecr-close" onclick="closeEcrModal()">&times;</span>
            <iframe id="ecrIframe" class="ecr-iframe" src=""></iframe>
        </div>
    </div>

    <script>
    function openEcrModal(url) {
    var modal = document.getElementById("ecrModal");
    var iframe = document.getElementById("ecrIframe");
    if(modal && iframe) {
        iframe.src = url;
        // MUST BE 'flex' to enable the centering in the CSS above
        modal.style.display = "flex"; 
        document.body.style.overflow = 'hidden'; 
        }
    }

    function closeEcrModal() {
        var modal = document.getElementById("ecrModal");
        var iframe = document.getElementById("ecrIframe");
        modal.style.display = "none";
        iframe.src = "";
        document.body.style.overflow = 'auto';
    }

    var ecrIframe = document.getElementById("ecrIframe");
    if(ecrIframe) {
        ecrIframe.onload = function() {
            try {
                var iframeWindow = ecrIframe.contentWindow;
                var currentUrl = iframeWindow.location.href;
                if (currentUrl.indexOf('wp-admin') !== -1 || currentUrl.indexOf('?login=success') !== -1) {
                    forceRefresh();
                }
                if (iframeWindow.document.getElementById('wpadminbar')) {
                    forceRefresh();
                }
            } catch (e) {}
        };
    }

    function forceRefresh() {
        var modal = document.getElementById("ecrModal");
        modal.style.display = "none";
        window.location.reload(true); 
    }

    window.onclick = function(event) {
        var modal = document.getElementById("ecrModal");
        if (event.target == modal) { closeEcrModal(); }
    }
    </script>
    <?php
});

// 2. Wrap the content
add_action( 'elementor/frontend/container/before_render', 'ecr_wrap_start', 10, 1 );


function ecr_wrap_start( $element ) {
    if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) return;
    $settings = $element->get_settings_for_display();

    if ( ! empty( $settings['ecr_is_restricted'] ) && 'yes' === $settings['ecr_is_restricted'] && ! is_user_logged_in() ) {
        
        // ADDED: 'nocache' timestamp to break server-side caching
        $current_url = add_query_arg( [
            'login'   => 'success',
            'nocache' => time() 
        ], get_permalink() );

        $login_url = ! empty( $settings['ecr_custom_login_url'] ) ? $settings['ecr_custom_login_url'] : wp_login_url($current_url);
        $reg_url   = ! empty( $settings['ecr_custom_register_url'] ) ? $settings['ecr_custom_register_url'] : wp_registration_url();

        echo '<div class="zolo-style-restriction">';
        echo '<div class="zolo-overlay">
                <div class="zolo-modal">
                    <div style="font-size:40px; margin-bottom:15px;">🔒</div>
                    <h3>Member Exclusive</h3>
                    <p>Please login to view these details.</p>
                    <div class="ecr-btn-group">
                        <a href="javascript:void(0);" onclick="openEcrModal(\''.$login_url.'\')" class="zolo-btn">Login</a>
                        <a href="javascript:void(0);" onclick="openEcrModal(\''.$reg_url.'\')" class="zolo-btn" style="background:#444;">Register</a>
                    </div>
                </div>
              </div>';
        echo '<div class="zolo-blurred-content">';
    }
}

add_action( 'elementor/frontend/container/after_render', 'ecr_wrap_end', 10, 1 );
function ecr_wrap_end( $element ) {
    if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) return;
    $settings = $element->get_settings_for_display();
    if ( ! empty( $settings['ecr_is_restricted'] ) && 'yes' === $settings['ecr_is_restricted'] && ! is_user_logged_in() ) {
        echo '</div></div>';
    }
}