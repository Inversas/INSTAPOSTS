// Ejecutar este código cuando el documento esté listo
jQuery(document).ready(function($) {
    // Inicializar la variable para controlar la visibilidad del popup
    let isPopupVisible = false;
    // Inicializar la variable para almacenar el contenedor del popup
    let $popupContainer = null;
    // Variable para almacenar instancias Swiper
    let swipers = {};
    // Variable para controlar si se está arrastrando un elemento
    let isDragging = false;
    // Variable para almacenar el índice actual de la imagen
    let currentIndex = 0;
    // Variable para almacenar el video actual
    let currentVideo = null;

    // Función para reproducir video
    function playVideo(videoElement) {
        videoElement.play();
    }

    // Función para detener video
    function stopVideo(videoElement) {
        videoElement.pause();
        videoElement.currentTime = 0; // Reiniciar el video
    }

    // Configurar el evento dragstart para detectar cuando se empieza a arrastrar un elemento
    $(document).on('dragstart', function() {
        isDragging = true;
    });

    // Configurar el evento dragend para detectar cuando se suelta el elemento arrastrado
    $(document).on('dragend', function() {
        isDragging = false;
    });

    // Configurar el evento mouseup global para restablecer isDragging
    $(document).on('mouseup', function() {
        if (isDragging) {
            isDragging = false;
        }
    });

    // Configurar el evento click para los enlaces de InstaPost
    $('.insta-post-link').on('click', function(e) {
        // Prevenir el comportamiento predeterminado del enlace
        e.preventDefault();
        // Obtener los datos de los medios asociados con el enlace
        const mediaData = $(this).attr('data-media');
        // Obtener el contenido del post
        const postContent = $(this).attr('data-content');
        // Obtener el ID del post
        const postId = $(this).attr('data-post-id');
        // Obtener la posición del post Mosaic
        const mosaicPosition = $(this).attr('data-mosaic-position');
        // Verificar si es Mosaic
        const isMosaic = $(this).attr('data-is-mosaic') === 'true';
        let media = [];

        // Intentar parsear los datos de los medios
        try {
            media = JSON.parse(mediaData);
        } catch (error) {
            console.error('Error parsing JSON:', error);
            return;
        }

        // Filtrar los medios para asegurar que solo se incluyan imágenes y videos válidos
        media = media.filter(url => url.match(/\.(jpeg|jpg|gif|png|mp4|webm)$/));

        // Inicializar la posición inicial de los medios
        currentIndex = 0;

        // Ajustar la posición inicial según la posición del post Mosaic
        if (mosaicPosition !== "null" && mosaicPosition !== "undefined") {
            currentIndex = parseInt(mosaicPosition);
            if (isNaN(currentIndex)) {
                currentIndex = 0;
            } else {
                currentIndex = currentIndex % 3;
            }
        }

        // Crear el contenedor del popup si no existe
        if (!$popupContainer) {
            $popupContainer = $('<div class="insta-post-popup-container"><div class="nav-btn prev-post">&lt;</div><div class="nav-btn next-post">&gt;</div></div>');
            $('body').append($popupContainer);

            // Configurar el evento click para el botón de navegación entre posts anterior
            $popupContainer.find('.prev-post').on('click', function() {
              if (currentVideo) {
                  stopVideo(currentVideo);
                  currentVideo = null;
              }

                const currentPopup = $popupContainer.find('.insta-post-popup:visible');
                const currentPostId = currentPopup.attr('id').replace('insta-post-popup-', '');
                const prevPostLink = $('.insta-post-link').eq($('.insta-post-link').index($(`.insta-post-link[data-post-id="${currentPostId}"]`)) - 1);
                if (prevPostLink.length) {
                    prevPostLink.click();
                }

            });

            // Configurar el evento click para el botón de navegación entre posts siguiente
            $popupContainer.find('.next-post').on('click', function() {
              if (currentVideo) {
                  stopVideo(currentVideo);
                  currentVideo = null;
              }
                const currentPopup = $popupContainer.find('.insta-post-popup:visible');
                const currentPostId = currentPopup.attr('id').replace('insta-post-popup-', '');
                const nextPostLink = $('.insta-post-link').eq($('.insta-post-link').index($(`.insta-post-link[data-post-id="${currentPostId}"]`)) + 1);
                if (nextPostLink.length) {
                    nextPostLink.click();
                }

            });
        }

        // Buscar el popup existente para el post actual
        let $popup = $popupContainer.find(`#insta-post-popup-${postId}`);

        // Función para mostrar el medio seleccionado y actualizar los botones de navegación
        function showMedia(index) {
            if (isMosaic) {
                //$popup.find('.swiper-slide').hide().eq(index).show();
            } else {
                $popup.find('.popup-content').hide().eq(index).show();
            }
            if (index === 0) {
                $popup.find('.nav-btn.prev').hide();
            } else {
                $popup.find('.nav-btn.prev').show();
            }
            if (index === media.length - 1) {
                $popup.find('.nav-btn.next').hide();
            } else {
                $popup.find('.nav-btn.next').show();
            }

            // Detener el video anterior si es necesario
            if (currentVideo) {
                stopVideo(currentVideo);
                currentVideo = null;
            }

            // Reproducir el nuevo video si es necesario
            const newMediaElement = $popup.find('.popup-content').eq(index).find('video')[0];
            if (newMediaElement) {
                playVideo(newMediaElement);
                currentVideo = newMediaElement;
            }
        }

        // Función para actualizar los botones de navegación entre posts
        function updatePostNavButtons() {
            const totalPosts = $('.insta-post-link').length;
            const currentPostIndex = $('.insta-post-link').index($(`.insta-post-link[data-post-id="${postId}"]`));
            if (currentPostIndex === 0) {
                $popupContainer.find('.prev-post').hide();
            } else {
                $popupContainer.find('.prev-post').show();
            }
            if (currentPostIndex === totalPosts - 1) {
                $popupContainer.find('.next-post').hide();
            } else {
                $popupContainer.find('.next-post').show();
            }
        }

        // Crear un nuevo popup si no existe
        if ($popup.length === 0) {
            if (isMosaic) {
                // Estructura específica para Mosaic
                $popup = $(`
                    <div id="insta-post-popup-${postId}" class="insta-post-popup">
                        <div class="media-container">
                            <div class="nav-btn nav-btn-swiper prev swiper-button-prev"><</div>
                            <div class="close-btn">X</div>
                            <div class="nav-btn nav-btn-swiper next swiper-button-next">></div>
                            <div class="swiper-container" id="slider-${postId}">
                                <div class="swiper-wrapper" id="slides-${postId}">
                                    ${media.map(url => {
                                        const isVideo = url.match(/\.(mp4|webm)$/);
                                        return `<div class="swiper-slide">
                                                    ${isVideo ? `<video src="${url}" alt="media" style="max-width:100%;" class="media-preview" loop></video>`
                                                              : `<img src="${url}" alt="media" style="max-width:100%;" class="media-preview" />`}
                                                </div>`;
                                    }).join('')}
                                </div>
                            </div>
                        </div>
                        <div class="insta-post-content">${postContent}</div>
                    </div>
                `);
                $popupContainer.append($popup);

                // Inicializar Swiper
                swipers[postId] = new Swiper(`#slider-${postId}`, {
                    initialSlide: currentIndex,
                    navigation: {
                        nextEl: `.swiper-button-next`,
                        prevEl: `.swiper-button-prev`,
                    },
                    loop: false,
                    on: {
                        slideChange: function () {
                            currentIndex = this.activeIndex;
                            showMedia(currentIndex);
                        }
                    }
                });

                // Configurar el evento click para cerrar el popup
                $popup.find('.close-btn').on('click', function() {
                    $popup.hide();
                    $popupContainer.hide();
                    isPopupVisible = false;
                    // Detener el video actual si es necesario
                    if (currentVideo) {
                        stopVideo(currentVideo);
                        currentVideo = null;
                    }
                });

                // Configurar eventos de arrastre y clic para los slides
                $popup.find('.swiper-slide').on('mousedown', function() {
                    isDragging = false;
                }).on('mousemove', function() {
                    isDragging = true;
                }).on('mouseup', function() {
                    isDragging = false;
                });

            } else {
                $popup = $(`<div id="insta-post-popup-${postId}" class="insta-post-popup"><div class="media-container"><div class="nav-btn prev"><</div><div class="close-btn">X</div><div class="nav-btn next">></div></div><div class="insta-post-content">${postContent}</div></div>`);
                $popupContainer.append($popup);

                const $mediaContainer = $popup.find('.media-container');
                const $postContentElement = $popup.find('.insta-post-content');

                // Añadir los medios al popup
                media.forEach((url, index) => {
                    const isVideo = url.match(/\.(mp4|webm)$/);
                    let mediaElement;
                    if (isVideo) {
                        mediaElement = $('<div class="popup-content"><video src="'+url+'" style="max-width:100%;" class="media-preview" loop></video></div>');
                    } else {
                        mediaElement = $('<div class="popup-content"><img src="'+url+'" style="max-width:100%;" class="media-preview" /></div>');
                    }
                    if (index !== currentIndex) {
                        mediaElement.hide();
                    }
                    $mediaContainer.append(mediaElement);
                });

                // Mostrar el medio inicial y actualizar los botones de navegación
                showMedia(currentIndex);

                // Mostrar el contenido del post
                $postContentElement.html(postContent);

                // Ocultar los botones de navegación si hay menos de 2 medios
                if (media.length < 2) {
                    $popup.find('.nav-btn').hide();
                }

                // Configurar el evento click para cerrar el popup
                $popup.find('.close-btn').on('click', function() {
                    $popup.hide();
                    $popupContainer.hide();
                    isPopupVisible = false;
                    // Detener el video actual si es necesario
                    if (currentVideo) {
                        stopVideo(currentVideo);
                        currentVideo = null;
                    }
                });

                // Configurar el evento click para el botón de navegación anterior
                $popup.find('.nav-btn.prev').on('click', function() {
                    currentIndex = (currentIndex > 0) ? currentIndex - 1 : media.length - 1;
                    showMedia(currentIndex);
                });

                // Configurar el evento click para el botón de navegación siguiente
                $popup.find('.nav-btn.next').on('click', function() {
                    currentIndex = (currentIndex < media.length - 1) ? currentIndex + 1 : 0;
                    showMedia(currentIndex);
                });

                // Configurar eventos de arrastre y clic para los slides
                $popup.find('.swiper-slide').on('mousedown', function() {
                    isDragging = false;
                }).on('mousemove', function() {
                    isDragging = true;
                }).on('mouseup', function() {
                    isDragging = false;
                });

            }

        } else {
            // Mostrar el popup existente si ya fue creado
            $popupContainer.children('.insta-post-popup').hide();
            $popup.show();
            // Reiniciar currentIndex para mosaicPosition si es necesario
            if (mosaicPosition !== "null" && mosaicPosition !== "undefined") {
                currentIndex = parseInt(mosaicPosition);
                if (isNaN(currentIndex)) {
                    currentIndex = 0;
                } else {
                    currentIndex = currentIndex % 3;
                }
            } else {
                currentIndex = 0; // Inicializar currentIndex a 0 si no es mosaic
            }

            // Mostrar el medio inicial y actualizar los botones de navegación
            showMedia(currentIndex);

            // Reinicializar Swiper si es Mosaic
            if (isMosaic && swipers[postId]) {
                swipers[postId].slideTo(currentIndex, 0, false);
                swipers[postId].update();
            }
        }

        // Ocultar todos los popups excepto el que se acaba de abrir
        $popupContainer.children('.insta-post-popup').not($popup).hide();

        // Mostrar el contenedor del popup
        $popupContainer.show();
        isPopupVisible = true;

        // Configurar el evento click fuera del popup para cerrarlo
        $popupContainer.off('click').on('click', function(e) {
            if (isPopupVisible && !isDragging && !$(e.target).closest('.insta-post-popup').length && !$(e.target).closest('.nav-btn').length) {
                $popup.hide();
                $popupContainer.hide();
                isPopupVisible = false;
                isDragging = false;
                // Detener el video actual si es necesario
                if (currentVideo) {
                    stopVideo(currentVideo);
                    currentVideo = null;
                }
            }
        });


        if (window.innerWidth >= 768) {
            // Actualizar los botones de navegación entre posts
            updatePostNavButtons();
        }
    });
});
