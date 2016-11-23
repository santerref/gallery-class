WP Gallery Class
==

This plugin let you add a custom class to WordPress media libraries. The class is added as a wrapper.

Before, without the plugin :

```html
<div id="gallery-4" class="gallery galleryid-9 gallery-columns-1 gallery-size-full"><figure class="gallery-item">
    <div class="gallery-icon landscape">
        <img width="318" height="60" src="http://example.com/wp-content/uploads/2016/11/image1.png" class="attachment-full size-full" alt="bouton-conference">
    </div></figure><figure class="gallery-item">
    <div class="gallery-icon landscape">
        <img width="318" height="60" src="http://example.com/wp-content/uploads/2016/11/image2.png" class="attachment-full size-full" alt="bouton-benevole">
    </div></figure>
</div>
```

After, with the plugin

```html
<div class="gallery-wrapper custom-class">
    <div id="gallery-4" class="gallery galleryid-9 gallery-columns-1 gallery-size-full"><figure class="gallery-item">
        <div class="gallery-icon landscape">
            <img width="318" height="60" src="http://example.com/wp-content/uploads/2016/11/image1.png" class="attachment-full size-full" alt="bouton-conference">
        </div></figure><figure class="gallery-item">
        <div class="gallery-icon landscape">
            <img width="318" height="60" src="http://example.com/wp-content/uploads/2016/11/image2.png" class="attachment-full size-full" alt="bouton-benevole">
        </div></figure>
    </div>
</div>
```