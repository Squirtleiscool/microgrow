(function($) {
    // distinct list of all document IDs to be fetched via AJAX requests
    var ids;

    // current index in ids array
    var i;

    // whether we're in the visual editor
    var is_editor;

    // CSS selector to match documents requiring Thumber
    var thumber_exts = ['doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'pub', 'vsd', 'vsdx'];
    var thumber_exts_sel = '.document-gallery [data-ext="' + thumber_exts.join('"],[data-ext="') + '"]';

    // whether pointer has already been shown
    var thumber_pointer_shown = false;

    // find all document-icons without icons generated and start processing
    $(document).ready(function() {
        is_editor = typeof tinymce !== 'undefined';
        sizeGalleryIcons();
        resetPendingIcons();
        handleVisualEditor();
        registerPaginationHandler();
    });

    /**
     * Sets the size of the gallery icons based on the column count.
     * @param $gallery If given, the target gallery. Otherwise all galleries on page.
     */
    function sizeGalleryIcons($gallery) {
        ($gallery || $('.document-gallery[data-icon-width]')).each(function() {
            var icon_width = $(this).data('icon-width');
            if (typeof icon_width !== 'undefined') {
                $(this).find('.document-icon').width(icon_width + '%');
            }
        });
    }

    /**
     * Handles necessary logic for when we're rendering gallery preview within visual editor.
     */
    function handleVisualEditor() {
        if (is_editor) {
            tinymce.PluginManager.add('dg', function (editor, url) {
                editor.on('LoadContent update.dg undo', function (e) {
                    $(e.target.contentDocument).find('[data-wpview-type="dg"] [data-shortcode]').each(function () {
                        retrieveGallery((typeof $(this).data('shortcode') === 'object' ? $(this).data('shortcode') : JSON.parse(decodeURIComponent($(this).data('shortcode')))), $(this));
                    });
                });
            });
        }
    }

    /**
     * Listen for all pagination clicks in current DOM and any future DOM elements.
     */
    function registerPaginationHandler() {
        $('body').delegate('.dg-paginate-wrapper .paginate a', 'click', function (e) {
            var $target = $(this).closest('.dg-paginate-wrapper');
            var atts = $target.data('shortcode');
            atts['skip'] = 0;
            var split = $(this).attr('href').split('#')[1].split('=');
            if ( split.length >= 2 ) {
                atts['skip'] = atts['limit'] * (split.pop() - 1);
            }

            retrieveGallery(atts, $target, function (gallery) {
                var adminBarHeight = $('#wpadminbar').height() || 0;
                var targetTop = gallery.offset().top - adminBarHeight;

                // scroll to gallery if top is not visible
                if ( $(document).scrollTop() > targetTop ) {
                    $('html, body').animate({
                        scrollTop: targetTop - 20
                    }, 'slow');
                }
            });

            e.preventDefault();
        });
    }

    /**
     * Collects all of the DG icons that need to be generated and starts requesting them via AJAX.
     */
    function resetPendingIcons() {
        ids = [];
        i = 0;

        $('.document-gallery img[data-id]').each(function() {
            var id = $(this).data('id');

            // if we have multiple galleries, we could have multiple elements
            // needing the same icon and no need to request multiple times
            if (-1 === $.inArray(id, ids)) {
                ids.push(id);
            }
        });

        retrieveNextIcons();
    }

    /**
     * Requests a gallery generated with the given attributes to populate the given target element.
     * @param atts array The gallery shortcode attributes.
     * @param $target element The element to be updated with the AJAX HTML response.
     * @param callback function If provided, will be invoked once new gallery content is loaded with the updated element passed in.
     */
    function retrieveGallery(atts, $target, callback) {
        // TODO: Cache already-retrieved gallery pages. Need to be careful not to keep too many at a time
        // (could consume a lot of memory) & handle caching pages for multiple galleries on a single pages.
        if ( typeof atts['id'] === 'undefined' ) {
            atts['id'] = wp.media.dgDefaults.id;
        }

        // request new gallery page from server
        $.post(ajaxurl, { action: 'dg_generate_gallery', atts: atts }, function(html) {
            var $parsedHtml = $($.parseHTML(html));
            if (is_editor && !thumber_pointer_shown && $parsedHtml.find(thumber_exts_sel).length) {
                thumber_pointer_shown = true;
                $('#insert-media-button').trigger('ready.dg');
            }

            // keep old ID
            var targetId = $target.attr('id');
            $parsedHtml.attr('id', targetId);

            // update gallery element with new content
            $target.replaceWith($parsedHtml);
            $target = $('#' + targetId);
            sizeGalleryIcons($target);
            resetPendingIcons();

            // invoke callback if provided
            if ( typeof callback !== 'undefined' ) {
                // get the new DOM element
                callback($target);
            }
        });
    }

    /**
     * Sends AJAX request to server requesting some of the not-yet-generated icons (if any).
     */
    function retrieveNextIcons() {
        // max number of icons to retrieve per AJAX request
        var batchLimit = 4;

        // IDs already retrieved
        var idBatch = [];

        for (; i < ids.length; i++) {
            if (idBatch.length === batchLimit) {
                break;
            }

            idBatch.push(ids[i]);
        }

        if (idBatch.length !== 0) {
            // request the next batch of icons
            $.ajax({
                type:     'POST',
                url:      ajaxurl,
                dataType: 'json',
                data:     { action: 'dg_generate_icons', ids: idBatch },
                success:  processRetrievedThumbnails,
                error:    function(xhr) { console.error(xhr.responseText); }
            });
        }
    }

    /**
     * Find all of the relevant elements and set the img src, then start next batch of thumbnail retrieval.
     * @param response Associative array mapping attachment ID to thumbnail URL.
     */
    function processRetrievedThumbnails(response) {
        for (var id in response) {
            if (response.hasOwnProperty(id)) {
                var $target = $('.document-gallery img[data-id="' + id + '"]');
                $target.removeAttr('data-id');

                (function(id, $target) {
                    var speed = 'fast';
                    $target.fadeOut(speed, function () {
                        $(this).attr('src', response[id]);
                        $(this).fadeIn(speed);
                    });
                })(id, $target);
            }
        }

        // start next batch once this response is processed
        retrieveNextIcons();
    }
})(jQuery);