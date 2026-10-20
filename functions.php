<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('astra-parent-style', get_template_directory_uri().'/style.css');
});


// Elementor template 771 (TQSoft content) is output on every page. On the SG2Pay page,
// stop it being rendered at all, so search engines and AI crawlers only see SG2Pay content.
add_filter('elementor/frontend/builder_content_data', function($data, $post_id) {
    if ((int) $post_id === 771 && strpos($_SERVER['REQUEST_URI'], '/sg2pay') !== false) {
        return [];
    }
    return $data;
}, 10, 2);

// Fallback: still hide it visually if it ever renders.
add_action('wp_head', function() {
    if (strpos($_SERVER['REQUEST_URI'], '/sg2pay') !== false) {
        echo '<style>.elementor.elementor-771{display:none!important}</style>';
    }
});

add_action('wp_head', function() {
    echo '<style>
.sg2pay-free-badge{display:inline-block;background:#2ecc71;color:#fff;font-size:13px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:4px 14px;border-radius:20px;margin-bottom:12px}
.sg2pay-cta-row{display:flex;flex-wrap:wrap;gap:12px;align-items:center;justify-content:center;margin-top:24px}
.sg2pay-cta-row a{text-decoration:none}
.sg2pay-btn-web{display:inline-flex;align-items:center;gap:8px;background:#1a73e8;color:#fff!important;font-size:15px;font-weight:600;padding:12px 24px;border-radius:8px;transition:background .2s}
.sg2pay-btn-web:hover{background:#1558b0;color:#fff!important}
.sg2pay-web-embed-section{background:#f5f7fa;border-radius:16px;padding:40px 24px;text-align:center;margin:40px 0}
.sg2pay-web-embed-section h2{margin-bottom:8px}
.sg2pay-web-embed-section p{color:#555;margin-bottom:24px}
.sg2pay-iframe-wrap{position:relative;width:100%;max-width:420px;margin:0 auto;border-radius:24px;overflow:hidden;box-shadow:0 16px 48px rgba(0,0,0,.18);border:8px solid #222;background:#222}
.sg2pay-iframe-wrap iframe{display:block;width:100%;height:700px;border:none}
.sg2pay-features{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;margin:32px 0}
.sg2pay-feature-card{background:#fff;border-radius:12px;padding:24px 20px;box-shadow:0 2px 12px rgba(0,0,0,.07);text-align:center}
.sg2pay-feature-card .icon{font-size:32px;margin-bottom:12px}
.sg2pay-feature-card h3{font-size:16px;font-weight:700;margin-bottom:6px}
.sg2pay-feature-card p{font-size:14px;color:#666;margin:0}
.sg2pay-how-it-works{display:flex;flex-direction:column;gap:24px;max-width:640px;margin:0 auto}
.sg2pay-step{display:flex;align-items:flex-start;gap:20px}
.sg2pay-step__num{flex-shrink:0;width:40px;height:40px;border-radius:50%;background:#1a73e8;color:#fff;font-size:18px;font-weight:700;display:flex;align-items:center;justify-content:center}
.sg2pay-step__body h3{margin:0 0 4px;font-size:16px;font-weight:700}
.sg2pay-step__body p{margin:0;font-size:14px;color:#555}
@media(max-width:768px){.sg2pay-cta-row{flex-direction:column;align-items:stretch}.sg2pay-btn-web{justify-content:center}.sg2pay-iframe-wrap iframe{height:560px}}
</style>';
});
