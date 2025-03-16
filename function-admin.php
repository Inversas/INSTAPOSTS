<?php











// 1. Registrar el Custom Post Type
function create_insta_post_type() {
    register_post_type('insta_post',
        array(
            'labels'      => array(
                'name'          => __('InstaPosts'),
                'singular_name' => __('InstaPost'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'), // Asegurarse de que el soporte para thumbnails está habilitado
            'rewrite'     => array('slug' => 'insta_post'),
            //'show_in_rest'=> true, // Habilitar API REST
        )
    );
}
add_action('init', 'create_insta_post_type');

// Registrar la taxonomía para las categorías
function create_insta_post_taxonomy() {
    register_taxonomy('insta_post_category', 'insta_post', array(
        'labels' => array(
            'name' => __('Categorias de InstaPost'),
            'singular_name' => __('Categoria de InstaPost'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'insta_post_category'),
    ));

    // Crear la categoría "Mosaic"
    if (!term_exists('Mosaic', 'insta_post_category')) {
        wp_insert_term('Mosaic', 'insta_post_category');
    }
}
add_action('init', 'create_insta_post_taxonomy');

// 2. Añadir soporte para hasta 10 imágenes o videos desde la Media Gallery
function add_insta_post_meta_boxes() {
    add_meta_box('insta_post_media', 'Media', 'render_insta_post_media_meta_box', 'insta_post', 'normal', 'default');
}
add_action('add_meta_boxes', 'add_insta_post_meta_boxes');

function render_insta_post_media_meta_box($post) {
    $media = get_post_meta($post->ID, '_insta_post_media', true);
    $thumb = get_post_meta($post->ID, '_insta_post_thumb', true); // Obtener la miniatura
    wp_nonce_field('save_insta_post_media', 'insta_post_media_nonce');
    echo '<div id="insta-post-media-fields">';
    for ($i = 0; $i < 10; $i++) {
        $value = isset($media[$i]) ? $media[$i] : '';
        echo '<p><label for="insta_post_media_'.$i.'">Media '.($i + 1).': </label>';
        echo '<input type="hidden" id="insta_post_media_'.$i.'" name="insta_post_media[]" value="'.esc_attr($value).'" />';
        echo '<button type="button" class="button select-media-button" data-target="#insta_post_media_'.$i.'" data-index="'.$i.'">Select Media</button>';
        if ($value) {
            if (preg_match('/\.(mp4|webm)$/i', $value)) {
                echo '<br><video src="'.esc_url($value).'" style="max-width:100px;" class="media-preview" autoplay loop muted></video>';
                // Mostrar la opción para seleccionar una miniatura si es un video
                if ($i == 0) {
                    echo '<br><label for="insta_post_thumb">Thumbnail: </label>';
                    echo '<input type="hidden" id="insta_post_thumb" name="insta_post_thumb" value="'.esc_attr($thumb).'" />';
                    echo '<button type="button" class="button select-thumbnail-button" data-target="#insta_post_thumb">Select Thumbnail</button>';
                    if ($thumb) {
                        echo '<br><img src="'.esc_url($thumb).'" style="max-width:100px;" class="thumb-preview" />';
                    }
                }
            } else {
                echo '<br><img src="'.esc_url($value).'" style="max-width:100px;" class="media-preview" />';
            }
        }
        echo '</p>';
    }
    echo '</div>';
}

function save_insta_post_media($post_id) {
    // Verificar nonce para seguridad
    if (!isset($_POST['insta_post_media_nonce']) || !wp_verify_nonce($_POST['insta_post_media_nonce'], 'save_insta_post_media')) {
        return;
    }
    // Evitar guardado automático
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Verificar permisos del usuario
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // Guardar los medios
    if (isset($_POST['insta_post_media'])) {
        update_post_meta($post_id, '_insta_post_media', array_map('esc_url_raw', $_POST['insta_post_media']));
    }
    // Guardar la miniatura
    if (isset($_POST['insta_post_thumb'])) {
        update_post_meta($post_id, '_insta_post_thumb', esc_url_raw($_POST['insta_post_thumb']));
    }
}
add_action('save_post', 'save_insta_post_media');

// 3. Crear el shortcode para mostrar los posts
function insta_post_shortcode() {
    $query = new WP_Query(array(
        'post_type' => 'insta_post',
        'posts_per_page' => -1,
        'order' => 'DESC',
    ));
    if ($query->have_posts()) {
        $output = '<div class="insta-post-feed">';
        $mosaic_count = 0;
        while ($query->have_posts()) {
            $query->the_post();
            $media = get_post_meta(get_the_ID(), '_insta_post_media', true);
            $thumb = get_post_meta(get_the_ID(), '_insta_post_thumb', true); // Obtener la miniatura
            $categories = wp_get_post_terms(get_the_ID(), 'insta_post_category', array('fields' => 'slugs'));

            if (in_array('mosaic', $categories)) {
                // Manejar posts Mosaic
                $mosaic_position = $mosaic_count % 3;
                $mosaic_image_index = ($mosaic_position == 0) ? 0 : ($mosaic_position == 1 ? 1 : 2);
                $mosaic_count++;
            } else {
                // Manejar posts no Mosaic
                $mosaic_position = null;
                $mosaic_image_index = 0;
            }

            $first_media_url = isset($media[$mosaic_image_index]) ? $media[$mosaic_image_index] : '';
            $output .= '<div class="insta-post-item '.($mosaic_position !== null ? 'mosaic-'.$mosaic_position : '').'">';
            $output .= '<a href="'.esc_url($first_media_url).'" class="insta-post-link" data-media="'.esc_attr(json_encode($media)).'" data-content="'.get_the_content().'" data-post-id="'.get_the_ID().'" data-mosaic-position="'.$mosaic_position.'" data-is-mosaic="'.($mosaic_position !== null ? 'true' : 'false').'">';
            // Mostrar la miniatura si el primer media es un video
            if (preg_match('/\.(mp4|webm)$/i', $first_media_url) && $thumb) {
                $output .= '<img src="'.esc_url($thumb).'" alt="'.get_the_title().'"/>';
            } else {
                $output .= '<img src="'.esc_url($first_media_url).'" alt="'.get_the_title().'"/>';
            }
            $output .= '</a>';
            $output .= '</div>';
        }
        $output .= '</div>';
        wp_reset_postdata();
        return $output;
    } else {
        return '<p>No InstaPosts found</p>';
    }
}
add_shortcode('insta_posts', 'insta_post_shortcode');

// 4. Añadir scripts y estilos necesarios para el popup de galería y el Media Uploader
function enqueue_insta_post_scripts() {
    wp_enqueue_style('insta-post-gallery', get_template_directory_uri().'/css/insta-post-gallery.css');
    wp_enqueue_script('insta-post-gallery', get_template_directory_uri().'/js/insta-post-gallery.js', array('jquery'), null, true);
    wp_localize_script('insta-post-gallery', 'wpApiSettings', array(
        'root' => esc_url_raw(rest_url()),
        'nonce' => wp_create_nonce('wp_rest')
    ));
    wp_enqueue_media();
    // Incluir Swiper JS
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);

    // Incluir el nuevo archivo edit-insta-post.js
    wp_enqueue_script('edit-insta-post', get_template_directory_uri().'/js/edit-insta-post.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_insta_post_scripts');
add_action('wp_enqueue_scripts', 'enqueue_insta_post_scripts');
?>
