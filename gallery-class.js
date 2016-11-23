(function ($) {
    var media = wp.media;

    media.view.Settings.Gallery = media.view.Settings.Gallery.extend({
        render: function () {
            media.view.Settings.prototype.render.apply(this, arguments);
            this.$el.append(media.template('gallery-class'));
            media.gallery.defaults.class = '';
            this.update.apply(this, ['class']);
            return this;
        }
    });
})(jQuery);