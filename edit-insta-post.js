jQuery(document).ready(function($) {
    // Configurar el evento click para los botones de selección de medios
    $(document).on('click', '.select-media-button', function(e) {
        e.preventDefault();
        var button = $(this);
        // Obtener el campo de entrada objetivo asociado con el botón
        var target = $(button.data('target'));
        var index = button.data('index'); // Obtener el índice del media

        // Configurar el frame del Media Uploader
        var frame = wp.media({
            title: 'Select or Upload Media',
            button: {
                text: 'Use this media'
            },
            multiple: false
        });

        // Manejar el evento de selección de medios
        frame.on('select', function() {
            // Obtener el archivo seleccionado
            var attachment = frame.state().get('selection').first().toJSON();
            // Asignar la URL del archivo seleccionado al campo de entrada objetivo
            target.val(attachment.url);
            // Eliminar la vista previa existente si la hay
            button.siblings('img, video').remove();
            // Añadir una nueva vista previa dependiendo del tipo de archivo
            if (attachment.type === 'image') {
                button.after('<br><img src="'+attachment.url+'" style="max-width:100px;" class="media-preview" />'); // Añadir vista previa de imagen
            } else if (attachment.type === 'video') {
                button.after('<br><video src="'+attachment.url+'" style="max-width:100px;" class="media-preview" autoplay loop muted></video>'); // Añadir vista previa de video
                // Si es el primer medio, mostrar la opción de seleccionar una miniatura
                if (index === 0) {
                    var thumbTarget = $('#insta_post_thumb');
                    button.after('<br><label for="insta_post_thumb">Thumbnail: </label>');
                    button.after('<button type="button" class="button select-thumbnail-button" data-target="#insta_post_thumb">Select Thumbnail</button>');
                    if (thumbTarget.val()) {
                        button.after('<br><img src="'+thumbTarget.val()+'" style="max-width:100px;" class="thumb-preview" />');
                        console.log(thumbTarget.val());
                    }
                }
            }
        });

        // Abrir el frame del Media Uploader
        frame.open();
    });

    // Configurar el evento click para los botones de selección de miniaturas
    $(document).on('click', '.select-thumbnail-button', function(e) {
        e.preventDefault();
        var button = $(this);
        // Obtener el campo de entrada objetivo asociado con el botón
        var target = $(button.data('target'));

        // Configurar el frame del Media Uploader
        var frame = wp.media({
            title: 'Select or Upload Thumbnail',
            button: {
                text: 'Use this thumbnail'
            },
            multiple: false
        });

        // Manejar el evento de selección de medios
        frame.on('select', function() {
            // Obtener el archivo seleccionado
            var attachment = frame.state().get('selection').first().toJSON();
            // Asignar la URL del archivo seleccionado al campo de entrada objetivo
            target.val(attachment.url);
            // Eliminar la vista previa existente si la hay
            button.siblings('img').remove();
            // Añadir una nueva vista previa
            button.after('<br><img src="'+attachment.url+'" style="max-width:100px;" class="thumb-preview" />');
        });

        // Abrir el frame del Media Uploader
        frame.open();
    });
});
