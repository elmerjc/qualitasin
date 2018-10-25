<?php

composer_require_file ( COMPOSER_EXTRAS . '/composer-like-me/like-me.php' );
composer_require_file ( COMPOSER_EXTRAS . '/composer-menu-extend/composer-menu-extend.php' );
composer_require_file ( COMPOSER_EXTRAS . '/composer-sidebars/composer-sidebars.php' );

/* =============================================================================
Icon Font Array
========================================================================== */

function composer_load_icon_fonts(){
	
	$pix_icons = array( 'pixicon-alert', 'pixicon-book', 'pixicon-briefcase', 'pixicon-bug', 'pixicon-dashboard', 'pixicon-comment-discussion', 'pixicon-comment', 'pixicon-cloud-upload', 'pixicon-cloud-download', 'pixicon-database', 'pixicon-device-desktop', 'pixicon-device-mobile', 'pixicon-diff', 'pixicon-eye', 'pixicon-file-code', 'pixicon-gear', 'pixicon-gift', 'pixicon-home', 'pixicon-graph', 'pixicon-hourglass', 'pixicon-inbox', 'pixicon-link', 'pixicon-light-bulb', 'pixicon-law', 'pixicon-key', 'pixicon-location', 'pixicon-paintcan', 'pixicon-package', 'pixicon-pulse', 'pixicon-puzzle', 'pixicon-question', 'pixicon-rocket', 'pixicon-ruby', 'pixicon-tools', 'pixicon-trashcan', 'pixicon-zap', 'pixicon-sync', 'pixicon-star', 'pixicon-squirrel', 'pixicon-steps', 'pixicon-list', 'pixicon-arrow-up', 'pixicon-arrow-left', 'pixicon-arrow-right', 'pixicon-arrow-top-left', 'pixicon-arrow-top-right', 'pixicon-arrow-bottom-right', 'pixicon-arrow-top-left-1', 'pixicon-arrow-up-down-1', 'pixicon-arrow-up-down-seperate', 'pixicon-arrow-left-right-seperate', 'pixicon-arrow-left-right', 'pixicon-compress', 'pixicon-expand', 'pixicon-arrows', 'pixicon-arrow-angle-up', 'pixicon-arrow-angle-down', 'pixicon-arrow-angle-left', 'pixicon-arrow-angle-right', 'pixicon-arrow-angle-double-up', 'pixicon-arrow-angle-double-down', 'pixicon-arrow-angle-double-left', 'pixicon-arrow-angle-double-right', 'pixicon-arrow-circle-up', 'pixicon-arrow-circle-down', 'pixicon-arrow-circle-left', 'pixicon-arrow-circle-right', 'pixicon-arrow-circle-double-up', 'pixicon-arrow-circle-double-down', 'pixicon-arrow-circle-double-left', 'pixicon-arrow-circle-double-right', 'pixicon-arrow-caret-up', 'pixicon-arrow-caret-down', 'pixicon-arrow-caret-left', 'pixicon-arrow-caret-right', 'pixicon-arrow-caret-circle-up', 'pixicon-arrow-caret-circle-down', 'pixicon-arrow-caret-circle-left', 'pixicon-arrow-caret-circle-right', 'pixicon-share', 'pixicon-minus', 'pixicon-plus', 'pixicon-remove', 'pixicon-elegant-check', 'pixicon-circle-minus', 'pixicon-circle-plus', 'pixicon-circle-remove', 'pixicon-circle-check', 'pixicon-zoom-out', 'pixicon-zoom-in', 'pixicon-elegant-search', 'pixicon-square', 'pixicon-square-button', 'pixicon-square-minus', 'pixicon-square-plus', 'pixicon-square-check', 'pixicon-circle', 'pixicon-circle-dot', 'pixicon-circle-square', 'pixicon-square-solid', 'pixicon-circle-pause', 'pixicon-pause', 'pixicon-menu', 'pixicon-square-list', 'pixicon-circle-list', 'pixicon-bullet-list', 'pixicon-number-list', 'pixicon-settings-2', 'pixicon-settings-vertical', 'pixicon-file', 'pixicon-files', 'pixicon-pencil-1', 'pixicon-pencil-square', 'pixicon-edit', 'pixicon-folder', 'pixicon-folder-opened', 'pixicon-folder-add', 'pixicon-info', 'pixicon-exclamation', 'pixicon-exclamation-circle', 'pixicon-exclamation-sign', 'pixicon-question-circle', 'pixicon-question-1', 'pixicon-comment-1', 'pixicon-comments', 'pixicon-mute', 'pixicon-sound-low', 'pixicon-audio', 'pixicon-quote', 'pixicon-quote-circle', 'pixicon-time', 'pixicon-lock-2', 'pixicon-unlock', 'pixicon-key-2', 'pixicon-cloud-2', 'pixicon-cloud-upload-1', 'pixicon-cloud-download-1', 'pixicon-image', 'pixicon-images', 'pixicon-bulb-1', 'pixicon-gift-1', 'pixicon-home-1', 'pixicon-science', 'pixicon-mobile-1', 'pixicon-tablet', 'pixicon-laptop', 'pixicon-desktop', 'pixicon-camera-2', 'pixicon-envelope', 'pixicon-cone', 'pixicon-ribbion', 'pixicon-bag-1', 'pixicon-card', 'pixicon-cart', 'pixicon-pin', 'pixicon-tag-2', 'pixicon-tags', 'pixicon-delete', 'pixicon-mouse-1', 'pixicon-mic', 'pixicon-campass', 'pixicon-location-3', 'pixicon-pinned', 'pixicon-map-1', 'pixicon-hard-drive', 'pixicon-briefcase-1', 'pixicon-book-1', 'pixicon-calender', 'pixicon-movie', 'pixicon-grid', 'pixicon-contacts', 'pixicon-head-phone', 'pixicon-life-saver', 'pixicon-chart', 'pixicon-reload', 'pixicon-link-2', 'pixicon-link-3', 'pixicon-spinner', 'pixicon-ban', 'pixicon-layout', 'pixicon-heart-2', 'pixicon-star-o', 'pixicon-star-half', 'pixicon-star-4', 'pixicon-star-half-1', 'pixicon-tool', 'pixicon-wrench-1', 'pixicon-gear-1', 'pixicon-gears', 'pixicon-arrow-solid-up', 'pixicon-arrow-solid-down', 'pixicon-arrow-solid-left', 'pixicon-arrow-solid-right', 'pixicon-arrow-solid-top-left', 'pixicon-arrow-solid-top-right', 'pixicon-arrow-solid-bottom-right', 'pixicon-arrow-solid-bottom-left', 'pixicon-compress-solid', 'pixicon-expand-solid', 'pixicon-angle-up-solid', 'pixicon-angle-down-solid', 'pixicon-angle-left-solid', 'pixicon-angle-right-solid', 'pixicon-angle-double-up-solid', 'pixicon-angle-double-down-solid', 'pixicon-angle-double-left-solid', 'pixicon-angle-double-right-solid', 'pixicon-caret-up-solid', 'pixicon-caret-down-solid', 'pixicon-caret-left-solid', 'pixicon-caret-right-solid', 'pixicon-circle-minus-solid', 'pixicon-circle-plus-solid', 'pixicon-circle-remove-solid', 'pixicon-circle-check-solid', 'pixicon-zoom-out-solid', 'pixicon-zoom-in-solid', 'pixicon-circle-stop-solid', 'pixicon-arrow-down', 'pixicon-circle-list-solid', 'pixicon-file-solid', 'pixicon-files-solid', 'pixicon-pencil-solid', 'pixicon-folder-solid', 'pixicon-folder-opened-solid', 'pixicon-folder-add-solid', 'pixicon-upload-solid', 'pixicon-download-solid', 'pixicon-info-solid', 'pixicon-exclamation-circle-solid', 'pixicon-exclamation-solid', 'pixicon-alert-2', 'pixicon-help', 'pixicon-comment-solid', 'pixicon-comments-solid', 'pixicon-mute-solid', 'pixicon-audio-low-solid', 'pixicon-audio-solid', 'pixicon-quote-solid', 'pixicon-time-solid', 'pixicon-lock-solid', 'pixicon-unlock-solid', 'pixicon-key-3', 'pixicon-cloud-solid', 'pixicon-cloud-upload-solid', 'pixicon-cloud-download-solid', 'pixicon-bulb-solid', 'pixicon-gift-solid', 'pixicon-home-solid', 'pixicon-camera-solid', 'pixicon-envelope-solid', 'pixicon-cone-solid', 'pixicon-ribbon-solid', 'pixicon-bag-solid', 'pixicon-cart-solid', 'pixicon-tag-solid', 'pixicon-tags-solid', 'pixicon-delete-solid', 'pixicon-mouse-solid', 'pixicon-mic-solid', 'pixicon-compass-solid', 'pixicon-location-solid', 'pixicon-pin-solid', 'pixicon-map-solid', 'pixicon-hard-drive-solid', 'pixicon-briefcase-solid', 'pixicon-book-solid', 'pixicon-contacts-solid', 'pixicon-layout-solid', 'pixicon-heart-solid', 'pixicon-user-1', 'pixicon-users-1', 'pixicon-grid-cion', 'pixicon-grid-1', 'pixicon-music-1', 'pixicon-pause-1', 'pixicon-phone-4', 'pixicon-upload', 'pixicon-download', 'pixicon-facebook', 'pixicon-twitter', 'pixicon-pinterest', 'pixicon-gplus', 'pixicon-tumblr', 'pixicon-stumbleupon', 'pixicon-wordpress-1', 'pixicon-instagram', 'pixicon-dribbble', 'pixicon-vimeo', 'pixicon-linked-in', 'pixicon-rss', 'pixicon-deviantart', 'pixicon-share-1', 'pixicon-buddy-marks', 'pixicon-skype', 'pixicon-youtube', 'pixicon-picasa', 'pixicon-google-drive', 'pixicon-flickr', 'pixicon-blogger', 'pixicon-rss-1', 'pixicon-delicious', 'pixicon-facebook-circle', 'pixicon-twitter-circle', 'pixicon-pinterest-circle', 'pixicon-gplus-circle', 'pixicon-tumblr-circle', 'pixicon-stumbleupon-circle', 'pixicon-instagram-circle', 'pixicon-dribbble-circle', 'pixicon-vimeo-circle', 'pixicon-linkedin-circle', 'pixicon-rss-circle', 'pixicon-devianart-circle', 'pixicon-share-circle', 'pixicon-buddy-marks-circle', 'pixicon-skype-circle', 'pixicon-youtube-circle', 'pixicon-picasa-circle', 'pixicon-google-drive-circle', 'pixicon-flickr-circle', 'pixicon-blogger-circle', 'pixicon-rss-circle-1', 'pixicon-delicious-1', 'pixicon-facebook-square', 'pixicon-twitter-square', 'pixicon-pinterest-square', 'pixicon-gplus-square', 'pixicon-tumblr-square', 'pixicon-stumbleupon-1', 'pixicon-wordpress-square', 'pixicon-instagram-square', 'pixicon-dribbble-square', 'pixicon-vimeo-square', 'pixicon-linkedin-square', 'pixicon-rss-square', 'pixicon-devianart-square', 'pixicon-share-square', 'pixicon-buddy-marks-square', 'pixicon-skype-square', 'pixicon-youtube-square', 'pixicon-picasa-square', 'pixicon-google-drive-square', 'pixicon-flickr-square', 'pixicon-blogger-square', 'pixicon-rss-square-1', 'pixicon-delicious-square', 'pixicon-printer', 'pixicon-calculator', 'pixicon-hospital', 'pixicon-save', 'pixicon-hard-drive-1', 'pixicon-file-search', 'pixicon-id-card', 'pixicon-id-card-1', 'pixicon-puzzle-piece', 'pixicon-thumb-up', 'pixicon-thumb-down', 'pixicon-cup-2', 'pixicon-dollar', 'pixicon-wallet', 'pixicon-pen-2', 'pixicon-graph-2', 'pixicon-network', 'pixicon-graphsheet', 'pixicon-briefcase-2', 'pixicon-exclamation-1', 'pixicon-modules', 'pixicon-globe', 'pixicon-globe-1', 'pixicon-target', 'pixicon-sand-clock', 'pixicon-balance', 'pixicon-rook', 'pixicon-printer-solid', 'pixicon-calculator-solid', 'pixicon-hospital-solid', 'pixicon-save-solid', 'pixicon-hard-drive-solid-1', 'pixicon-file-search-solid', 'pixicon-id-card-solid', 'pixicon-id-card-solid-1', 'pixicon-puzzle-piece-solid', 'pixicon-thumb-up-solid', 'pixicon-thumb-down-solid', 'pixicon-cup-solid', 'pixicon-dollar-solid', 'pixicon-wallet-solid', 'pixicon-pen-solid', 'pixicon-graph-solid', 'pixicon-network-solid', 'pixicon-graphsheet-solid', 'pixicon-briefcase-solid-1', 'pixicon-shield', 'pixicon-modules-solid', 'pixicon-globe-solid', 'pixicon-paste', 'pixicon-bubble-comment-streamline-talk', 'pixicon-book-read-streamline', 'pixicon-book-dowload-streamline', 'pixicon-caddie-shop-shopping-streamline', 'pixicon-caddie-shopping-streamline', 'pixicon-chef-food-restaurant-streamline', 'pixicon-cocktail-mojito-streamline', 'pixicon-computer-imac-2', 'pixicon-computer-network-streamline', 'pixicon-dashboard-speed-streamline', 'pixicon-design-pencil-rule-streamline', 'pixicon-drug-medecine-streamline-syringue', 'pixicon-design-graphic-tablet-streamline-tablet', 'pixicon-earth-globe-streamline', 'pixicon-eat-food-fork-knife-streamline', 'pixicon-eat-food-hotdog-streamline', 'pixicon-email-mail-streamline', 'pixicon-first-aid-medecine-shield-streamline', 'pixicon-ibook-laptop', 'pixicon-ipad-streamline', 'pixicon-iphone-streamline', 'pixicon-ink-pen-streamline', 'pixicon-like-love-streamline', 'pixicon-link-streamline', 'pixicon-man-people-streamline-user', 'pixicon-magnet-streamline', 'pixicon-lock-locker-streamline', 'pixicon-locker-streamline-unlock', 'pixicon-paint-bucket-streamline', 'pixicon-painting-pallet-streamline', 'pixicon-painting-roll-streamline', 'pixicon-picture-streamline-1', 'pixicon-receipt-shopping-streamline', 'pixicon-settings-streamline-1', 'pixicon-settings-streamline-2', 'pixicon-speech-streamline-talk-user', 'pixicon-streamline-umbrella-weather', 'pixicon-streamline-sync', 'pixicon-adn', 'pixicon-barcode', 'pixicon-chat-bubble-two', 'pixicon-folder2', 'pixicon-stackoverflow', 'pixicon-windows', 'pixicon-book-open', 'pixicon-bucket', 'pixicon-bag', 'pixicon-alert-1', 'pixicon-back-in-time', 'pixicon-archive', 'pixicon-adjust', 'pixicon-address', 'pixicon-cloud-thunder', 'pixicon-chart-area', 'pixicon-chart-bar', 'pixicon-chart-line', 'pixicon-chart-pie', 'pixicon-check', 'pixicon-docs', 'pixicon-map', 'pixicon-monitor', 'pixicon-mobile', 'pixicon-paper-plane', 'pixicon-rocket-1', 'pixicon-soundcloud', 'pixicon-sound', 'pixicon-thermometer', 'pixicon-trash', 'pixicon-trophy', 'pixicon-traffic-cone', 'pixicon-tools-1', 'pixicon-user', 'pixicon-user-add', 'pixicon-users', 'pixicon-water', 'pixicon-ticket', 'pixicon-suitcase', 'pixicon-reply', 'pixicon-picture', 'pixicon-mouse', 'pixicon-moon', 'pixicon-note', 'pixicon-lock', 'pixicon-lock-open', 'pixicon-location-1', 'pixicon-lifebuoy', 'pixicon-link-1', 'pixicon-leaf', 'pixicon-hourglass-1', 'pixicon-gauge', 'pixicon-flashlight', 'pixicon-flash', 'pixicon-flag', 'pixicon-feather', 'pixicon-flight', 'pixicon-eye-1', 'pixicon-drive', 'pixicon-cog', 'pixicon-cup', 'pixicon-cloud', 'pixicon-brush', 'pixicon-attention', 'pixicon-bell', 'pixicon-behance', 'pixicon-battery', 'pixicon-connection-0', 'pixicon-connection-1', 'pixicon-connection-2', 'pixicon-connection-3', 'pixicon-connection-4', 'pixicon-coffee', 'pixicon-barbell', 'pixicon-bars', 'pixicon-diamond', 'pixicon-graph-1', 'pixicon-lab', 'pixicon-pencil', 'pixicon-phone', 'pixicon-phone-2', 'pixicon-phone-3', 'pixicon-power', 'pixicon-tag', 'pixicon-syringe', 'pixicon-pill', 'pixicon-settings', 'pixicon-star-1', 'pixicon-stopwatch', 'pixicon-wifi-3', 'pixicon-banknote', 'pixicon-bubble', 'pixicon-bulb', 'pixicon-calendar', 'pixicon-camera', 'pixicon-clip', 'pixicon-cloud-1', 'pixicon-cup-1', 'pixicon-data', 'pixicon-diamond-1', 'pixicon-fire', 'pixicon-food', 'pixicon-heart', 'pixicon-key-1', 'pixicon-lab-1', 'pixicon-location-2', 'pixicon-lock-1', 'pixicon-mail', 'pixicon-megaphone', 'pixicon-music', 'pixicon-note-1', 'pixicon-paperplane', 'pixicon-params', 'pixicon-pen', 'pixicon-phone-1', 'pixicon-photo', 'pixicon-search', 'pixicon-settings-1', 'pixicon-shop', 'pixicon-stack', 'pixicon-star-2', 'pixicon-study', 'pixicon-tag-1', 'pixicon-truck', 'pixicon-eye-2', 'pixicon-vallet', 'pixicon-pen-1', 'pixicon-letter', 'pixicon-heart-1', 'pixicon-heart-broken', 'pixicon-trash-can', 'pixicon-bolt', 'pixicon-star-empty', 'pixicon-warning-alt', 'pixicon-white-question', 'pixicon-whatsapp', 'pixicon-aws', 'pixicon-star-3', 'pixicon-stopwatch-1', 'pixicon-paperplane-ico', 'pixicon-camera-1', 'pixicon-coverflow-line', 'pixicon-coverflow', 'pixicon-symbol-man', 'pixicon-symbol-woman', 'pixicon-symbol-mixed', 'pixicon-book-close', 'pixicon-bubble-3', 'pixicon-character', 'pixicon-ipad', 'pixicon-modem', 'pixicon-pie-chart', 'pixicon-amazon', 'pixicon-ebay', 'pixicon-wordpress', 'pixicon-wordpress-alt', 'pixicon-file-add', 'pixicon-calendar-1', 'pixicon-calendar-2', 'pixicon-wrench', 'pixicon-at-sign', 'pixicon-results-demographics', 'pixicon-transportation-car', 'pixicon-transportation-bus', 'pixicon-transportation-plane', 'pixicon-transportation-ship', 'pixicon-transportation-train', 'pixicon-transportation-truck', 'pixicon-shopping-cart', 'pixicon-muffin', 'pixicon-leaf-1', 'pixicon-light', 'pixicon-light-off', 'pixicon-server-add', 'pixicon-server-security', 'pixicon-point-of-interest', 'pixicon-crown', 'pixicon-cooler', 'pixicon-computer-accept', 'pixicon-browser-window', 'pixicon-telescope', 'pixicon-clippy', 'pixicon-credit-card', 'pixicon-device-camera', 'pixicon-device-camera-video', 'pixicon-git-compare', 'pixicon-git-merge', 'pixicon-git-pull-request', 'pixicon-git-branch', 'pixicon-milestone', 'pixicon-microscope', 'pixicon-organization', 'pixicon-pin-1', 'pixicon-person', 'pixicon-plug', 'pixicon-podium', 'pixicon-repo-forked', 'pixicon-settings-3', 'pixicon-terminal', 'pixicon-phone-classic-on', 'pixicon-phone-classic-off', 'pixicon-notes-accept', 'pixicon-satellite-ground', 'pixicon-trash-full', 'pixicon-tree', 'pixicon-boat', 'pixicon-bike', 'pixicon-car', 'pixicon-cart-shopping-1', 'pixicon-campfire', 'pixicon-call-old-telephone', 'pixicon-burning-fire', 'pixicon-brush-1', 'pixicon-cannabis-hemp', 'pixicon-click-hand-1', 'pixicon-case-medic', 'pixicon-cloud-download-2', 'pixicon-cloud-sun', 'pixicon-cloud-upload-2', 'pixicon-clouds-cloudy', 'pixicon-code-html-file-1', 'pixicon-color-palette', 'pixicon-content-34', 'pixicon-gears-setting', 'pixicon-harddrive', 'pixicon-helicopter', 'pixicon-rocket-2', 'pixicon-palm-tree', 'pixicon-paint-brush-2', 'pixicon-square-vector-1', 'pixicon-square-vector-2', 'pixicon-yang-ying', 'pixicon-loop', 'pixicon-paint-bucket', 'pixicon-price-tag', 'pixicon-pricetag-multiple', 'pixicon-puzzle-1', 'pixicon-social-instagram', 'pixicon-trophy-1', 'pixicon-compass', 'pixicon-key-4', 'pixicon-graduation-cap', 'pixicon-heart-3', 'pixicon-heart-empty', 'pixicon-magnet', 'pixicon-newspaper', 'pixicon-phone-5', 'pixicon-math-ico', 'pixicon-mfg-icon', 'pixicon-magnifying', 'pixicon-vector-pen', 'pixicon-retweet', 'pixicon-settings-4', 'pixicon-meter', 'pixicon-lock-3', 'pixicon-locked', 'pixicon-map-2', 'pixicon-measure', 'pixicon-users-outline', 'pixicon-user-outline', 'pixicon-windows-1', 'pixicon-select', 'pixicon-screen', 'pixicon-files-1', 'pixicon-camera-3', 'pixicon-clock', 'pixicon-photobucket', 'pixicon-git-commit', 'pixicon-eleganticons', 'pixicon-arrows-anticlockwise', 'pixicon-arrows-anticlockwise-dashed', 'pixicon-arrows-button-down', 'pixicon-arrows-button-off', 'pixicon-arrows-button-on', 'pixicon-arrows-button-up', 'pixicon-arrows-check', 'pixicon-arrows-circle-check', 'pixicon-arrows-circle-down', 'pixicon-arrows-circle-downleft', 'pixicon-arrows-circle-downright', 'pixicon-arrows-circle-left', 'pixicon-arrows-circle-minus', 'pixicon-arrows-circle-plus', 'pixicon-arrows-circle-remove', 'pixicon-arrows-circle-right', 'pixicon-arrows-circle-up', 'pixicon-arrows-circle-upleft', 'pixicon-arrows-circle-upright', 'pixicon-arrows-clockwise', 'pixicon-arrows-clockwise-dashed', 'pixicon-arrows-compress', 'pixicon-arrows-deny', 'pixicon-arrows-diagonal', 'pixicon-arrows-diagonal2', 'pixicon-arrows-down', 'pixicon-arrows-down-double-34', 'pixicon-arrows-downleft', 'pixicon-arrows-downright', 'pixicon-arrows-drag-down', 'pixicon-arrows-drag-down-dashed', 'pixicon-arrows-drag-horiz', 'pixicon-arrows-drag-left', 'pixicon-arrows-drag-left-dashed', 'pixicon-arrows-drag-right', 'pixicon-arrows-drag-right-dashed', 'pixicon-arrows-drag-up', 'pixicon-arrows-drag-up-dashed', 'pixicon-arrows-drag-vert', 'pixicon-arrows-exclamation', 'pixicon-arrows-expand', 'pixicon-arrows-expand-diagonal1', 'pixicon-arrows-expand-horizontal1', 'pixicon-arrows-expand-vertical1', 'pixicon-arrows-fit-horizontal', 'pixicon-arrows-fit-vertical', 'pixicon-arrows-glide', 'pixicon-arrows-glide-horizontal', 'pixicon-arrows-glide-vertical', 'pixicon-arrows-hamburger1', 'pixicon-arrows-hamburger-2', 'pixicon-arrows-horizontal', 'pixicon-arrows-info', 'pixicon-arrows-keyboard-alt', 'pixicon-arrows-keyboard-cmd-29', 'pixicon-arrows-keyboard-delete', 'pixicon-arrows-keyboard-down-28', 'pixicon-arrows-keyboard-left', 'pixicon-arrows-keyboard-return', 'pixicon-arrows-keyboard-right', 'pixicon-arrows-keyboard-shift', 'pixicon-arrows-keyboard-tab', 'pixicon-arrows-keyboard-up', 'pixicon-arrows-left', 'pixicon-arrows-left-double-32', 'pixicon-arrows-minus', 'pixicon-arrows-move', 'pixicon-arrows-move2', 'pixicon-arrows-move-bottom', 'pixicon-arrows-move-left', 'pixicon-arrows-move-right', 'pixicon-arrows-move-top', 'pixicon-arrows-plus', 'pixicon-arrows-question', 'pixicon-arrows-remove', 'pixicon-arrows-right', 'pixicon-arrows-right-double-31', 'pixicon-arrows-rotate', 'pixicon-arrows-rotate-anti', 'pixicon-arrows-rotate-anti-dashed', 'pixicon-arrows-rotate-dashed', 'pixicon-arrows-shrink', 'pixicon-arrows-shrink-diagonal1', 'pixicon-arrows-shrink-diagonal2', 'pixicon-arrows-shrink-horizonal2', 'pixicon-arrows-shrink-horizontal1', 'pixicon-arrows-shrink-vertical1', 'pixicon-arrows-shrink-vertical2', 'pixicon-arrows-sign-down', 'pixicon-arrows-sign-left', 'pixicon-arrows-sign-right', 'pixicon-arrows-sign-up', 'pixicon-arrows-slide-down1', 'pixicon-arrows-slide-down2', 'pixicon-arrows-slide-left1', 'pixicon-arrows-slide-left2', 'pixicon-arrows-slide-right1', 'pixicon-arrows-slide-right2', 'pixicon-arrows-slide-up1', 'pixicon-arrows-slide-up2', 'pixicon-arrows-slim-down', 'pixicon-arrows-slim-down-dashed', 'pixicon-arrows-slim-left', 'pixicon-arrows-slim-left-dashed', 'pixicon-arrows-slim-right', 'pixicon-arrows-slim-right-dashed', 'pixicon-arrows-slim-up', 'pixicon-arrows-slim-up-dashed', 'pixicon-arrows-square-check', 'pixicon-arrows-square-down', 'pixicon-arrows-square-downleft', 'pixicon-arrows-square-downright', 'pixicon-arrows-square-left', 'pixicon-arrows-square-minus', 'pixicon-arrows-square-plus', 'pixicon-arrows-square-remove', 'pixicon-arrows-square-right', 'pixicon-arrows-square-up', 'pixicon-arrows-square-upleft', 'pixicon-arrows-square-upright', 'pixicon-arrows-squares', 'pixicon-arrows-stretch-diagonal1', 'pixicon-arrows-stretch-diagonal2', 'pixicon-arrows-stretch-diagonal3', 'pixicon-arrows-stretch-diagonal4', 'pixicon-arrows-stretch-horizontal1', 'pixicon-arrows-stretch-horizontal2', 'pixicon-arrows-stretch-vertical1', 'pixicon-arrows-stretch-vertical2', 'pixicon-arrows-switch-horizontal', 'pixicon-arrows-switch-vertical', 'pixicon-arrows-up', 'pixicon-arrows-up-double-33', 'pixicon-arrows-upleft', 'pixicon-arrows-upright', 'pixicon-arrows-vertical', 'pixicon-basic-accelerator', 'pixicon-basic-alarm', 'pixicon-basic-anchor', 'pixicon-basic-anticlockwise', 'pixicon-basic-archive', 'pixicon-basic-archive-full', 'pixicon-basic-ban', 'pixicon-basic-battery-charge', 'pixicon-basic-battery-empty', 'pixicon-basic-battery-full', 'pixicon-basic-battery-half', 'pixicon-basic-bolt', 'pixicon-basic-book', 'pixicon-basic-book-pen', 'pixicon-basic-book-pencil', 'pixicon-basic-bookmark', 'pixicon-basic-calculator', 'pixicon-basic-calendar', 'pixicon-basic-cards-diamonds', 'pixicon-basic-cards-hearts', 'pixicon-basic-case', 'pixicon-basic-chronometer', 'pixicon-basic-clessidre', 'pixicon-basic-clock', 'pixicon-basic-clockwise', 'pixicon-basic-cloud', 'pixicon-basic-clubs', 'pixicon-basic-compass', 'pixicon-basic-cup', 'pixicon-basic-diamonds', 'pixicon-basic-display', 'pixicon-basic-download', 'pixicon-basic-exclamation', 'pixicon-basic-eye', 'pixicon-basic-eye-closed', 'pixicon-basic-female', 'pixicon-basic-flag1', 'pixicon-basic-flag2', 'pixicon-basic-floppydisk', 'pixicon-basic-folder', 'pixicon-basic-folder-multiple', 'pixicon-basic-gear', 'pixicon-basic-geolocalize-01', 'pixicon-basic-geolocalize-05', 'pixicon-basic-globe', 'pixicon-basic-gunsight', 'pixicon-basic-hammer', 'pixicon-basic-headset', 'pixicon-basic-heart', 'pixicon-basic-heart-broken', 'pixicon-basic-helm', 'pixicon-basic-home', 'pixicon-basic-info', 'pixicon-basic-ipod', 'pixicon-basic-joypad', 'pixicon-basic-key', 'pixicon-basic-keyboard', 'pixicon-basic-laptop', 'pixicon-basic-life-buoy', 'pixicon-basic-lightbulb', 'pixicon-basic-link', 'pixicon-basic-lock', 'pixicon-basic-lock-open', 'pixicon-basic-magic-mouse', 'pixicon-basic-magnifier', 'pixicon-basic-magnifier-minus', 'pixicon-basic-magnifier-plus', 'pixicon-basic-mail', 'pixicon-basic-mail-multiple', 'pixicon-basic-mail-open', 'pixicon-basic-mail-open-text', 'pixicon-basic-male', 'pixicon-basic-map', 'pixicon-basic-message', 'pixicon-basic-message-multiple', 'pixicon-basic-message-txt', 'pixicon-basic-mixer2', 'pixicon-basic-mouse', 'pixicon-basic-notebook', 'pixicon-basic-notebook-pen', 'pixicon-basic-notebook-pencil', 'pixicon-basic-paperplane', 'pixicon-basic-pencil-ruler', 'pixicon-basic-pencil-ruler-pen', 'pixicon-basic-photo', 'pixicon-basic-picture', 'pixicon-basic-picture-multiple', 'pixicon-basic-pin1', 'pixicon-basic-pin2', 'pixicon-basic-postcard', 'pixicon-basic-postcard-multiple', 'pixicon-basic-printer', 'pixicon-basic-question', 'pixicon-basic-rss', 'pixicon-basic-server', 'pixicon-basic-server2', 'pixicon-basic-server-cloud', 'pixicon-basic-server-download', 'pixicon-basic-server-upload', 'pixicon-basic-settings', 'pixicon-basic-share', 'pixicon-basic-sheet', 'pixicon-basic-sheet-multiple', 'pixicon-basic-sheet-pen', 'pixicon-basic-sheet-pencil', 'pixicon-basic-sheet-txt', 'pixicon-basic-signs', 'pixicon-basic-smartphone', 'pixicon-basic-spades', 'pixicon-basic-spread', 'pixicon-basic-spread-bookmark', 'pixicon-basic-spread-text', 'pixicon-basic-spread-text-bookmark', 'pixicon-basic-star', 'pixicon-basic-tablet', 'pixicon-basic-target', 'pixicon-basic-todo', 'pixicon-basic-todo-pen', 'pixicon-basic-todo-pencil', 'pixicon-basic-todo-txt', 'pixicon-basic-todolist-pen', 'pixicon-basic-todolist-pencil', 'pixicon-basic-trashcan', 'pixicon-basic-trashcan-full', 'pixicon-basic-trashcan-refresh', 'pixicon-basic-trashcan-remove', 'pixicon-basic-upload', 'pixicon-basic-usb', 'pixicon-basic-video', 'pixicon-basic-watch', 'pixicon-basic-webpage', 'pixicon-basic-webpage-img-txt', 'pixicon-basic-webpage-multiple', 'pixicon-basic-webpage-txt', 'pixicon-basic-world', 'pixicon-ecommerce-bag', 'pixicon-ecommerce-bag-check', 'pixicon-ecommerce-bag-cloud', 'pixicon-ecommerce-bag-download', 'pixicon-ecommerce-bag-minus', 'pixicon-ecommerce-bag-plus', 'pixicon-ecommerce-bag-refresh', 'pixicon-ecommerce-bag-remove', 'pixicon-ecommerce-bag-search', 'pixicon-ecommerce-bag-upload', 'pixicon-ecommerce-banknote', 'pixicon-ecommerce-banknotes', 'pixicon-ecommerce-basket', 'pixicon-ecommerce-basket-check', 'pixicon-ecommerce-basket-cloud', 'pixicon-ecommerce-basket-download', 'pixicon-ecommerce-basket-minus', 'pixicon-ecommerce-basket-plus', 'pixicon-ecommerce-basket-refresh', 'pixicon-ecommerce-basket-remove', 'pixicon-ecommerce-basket-search', 'pixicon-ecommerce-basket-upload', 'pixicon-ecommerce-bath', 'pixicon-ecommerce-cart', 'pixicon-ecommerce-cart-check', 'pixicon-ecommerce-cart-cloud', 'pixicon-ecommerce-cart-content', 'pixicon-ecommerce-cart-download', 'pixicon-ecommerce-cart-minus', 'pixicon-ecommerce-cart-plus', 'pixicon-ecommerce-cart-refresh', 'pixicon-ecommerce-cart-remove', 'pixicon-ecommerce-cart-search', 'pixicon-ecommerce-cart-upload', 'pixicon-ecommerce-cent', 'pixicon-ecommerce-colon', 'pixicon-ecommerce-creditcard', 'pixicon-ecommerce-diamond', 'pixicon-ecommerce-dollar', 'pixicon-ecommerce-euro', 'pixicon-ecommerce-franc', 'pixicon-ecommerce-gift', 'pixicon-ecommerce-graph1', 'pixicon-ecommerce-graph2', 'pixicon-ecommerce-graph3', 'pixicon-ecommerce-graph-decrease', 'pixicon-ecommerce-graph-increase', 'pixicon-ecommerce-guarani', 'pixicon-ecommerce-kips', 'pixicon-ecommerce-lira', 'pixicon-ecommerce-megaphone', 'pixicon-ecommerce-money', 'pixicon-ecommerce-naira', 'pixicon-ecommerce-pesos', 'pixicon-ecommerce-pound', 'pixicon-ecommerce-receipt', 'pixicon-ecommerce-receipt-bath', 'pixicon-ecommerce-receipt-cent', 'pixicon-ecommerce-receipt-dollar', 'pixicon-ecommerce-receipt-euro', 'pixicon-ecommerce-receipt-franc', 'pixicon-ecommerce-receipt-guarani', 'pixicon-ecommerce-receipt-kips', 'pixicon-ecommerce-receipt-lira', 'pixicon-ecommerce-receipt-naira', 'pixicon-ecommerce-receipt-pesos', 'pixicon-ecommerce-receipt-pound', 'pixicon-ecommerce-receipt-rublo', 'pixicon-ecommerce-receipt-rupee', 'pixicon-ecommerce-receipt-tugrik', 'pixicon-ecommerce-receipt-won', 'pixicon-ecommerce-receipt-yen', 'pixicon-ecommerce-receipt-yen2', 'pixicon-ecommerce-recept-colon', 'pixicon-ecommerce-rublo', 'pixicon-ecommerce-rupee', 'pixicon-ecommerce-safe', 'pixicon-ecommerce-sale', 'pixicon-ecommerce-sales', 'pixicon-ecommerce-ticket', 'pixicon-ecommerce-tugriks', 'pixicon-ecommerce-wallet', 'pixicon-ecommerce-won', 'pixicon-ecommerce-yen', 'pixicon-ecommerce-yen2', 'pixicon-music-beginning-button', 'pixicon-music-bell', 'pixicon-music-cd', 'pixicon-music-diapason', 'pixicon-music-eject-button', 'pixicon-music-end-button', 'pixicon-music-fastforward-button', 'pixicon-music-headphones', 'pixicon-music-ipod', 'pixicon-music-loudspeaker', 'pixicon-music-microphone', 'pixicon-music-microphone-old', 'pixicon-music-mixer', 'pixicon-music-mute', 'pixicon-music-note-multiple', 'pixicon-music-note-single', 'pixicon-music-pause-button', 'pixicon-music-play-button', 'pixicon-music-playlist', 'pixicon-music-radio-ghettoblaster', 'pixicon-music-radio-portable', 'pixicon-music-record', 'pixicon-music-recordplayer', 'pixicon-music-repeat-button', 'pixicon-music-rewind-button', 'pixicon-music-shuffle-button', 'pixicon-music-stop-button', 'pixicon-music-tape', 'pixicon-music-volume-down', 'pixicon-music-volume-up', 'pixicon-software-add-vectorpoint', 'pixicon-software-box-oval', 'pixicon-software-box-polygon', 'pixicon-software-box-rectangle', 'pixicon-software-box-roundedrectangle', 'pixicon-software-character', 'pixicon-software-crop', 'pixicon-software-eyedropper', 'pixicon-software-font-allcaps', 'pixicon-software-font-baseline-shift', 'pixicon-software-font-horizontal-scale', 'pixicon-software-font-kerning', 'pixicon-software-font-leading', 'pixicon-software-font-size', 'pixicon-software-font-smallcapital', 'pixicon-software-font-smallcaps', 'pixicon-software-font-strikethrough', 'pixicon-software-font-tracking', 'pixicon-software-font-underline', 'pixicon-software-font-vertical-scale', 'pixicon-software-horizontal-align-center', 'pixicon-software-horizontal-align-left', 'pixicon-software-horizontal-align-right', 'pixicon-software-horizontal-distribute-center', 'pixicon-software-horizontal-distribute-left', 'pixicon-software-horizontal-distribute-right', 'pixicon-software-indent-firstline', 'pixicon-software-indent-left', 'pixicon-software-indent-right', 'pixicon-software-lasso', 'pixicon-software-layers1', 'pixicon-software-layers2', 'pixicon-software-layout', 'pixicon-software-layout-2columns', 'pixicon-software-layout-3columns', 'pixicon-software-layout-4boxes', 'pixicon-software-layout-4columns', 'pixicon-software-layout-4lines', 'pixicon-software-layout-8boxes', 'pixicon-software-layout-header', 'pixicon-software-layout-header-2columns', 'pixicon-software-layout-header-3columns', 'pixicon-software-layout-header-4boxes', 'pixicon-software-layout-header-4columns', 'pixicon-software-layout-header-complex', 'pixicon-software-layout-header-complex2', 'pixicon-software-layout-header-complex3', 'pixicon-software-layout-header-complex4', 'pixicon-software-layout-header-sideleft', 'pixicon-software-layout-header-sideright', 'pixicon-software-layout-sidebar-left', 'pixicon-software-layout-sidebar-right', 'pixicon-software-magnete', 'pixicon-software-pages', 'pixicon-software-paintbrush', 'pixicon-software-paintbucket', 'pixicon-software-paintroller', 'pixicon-software-paragraph', 'pixicon-software-paragraph-align-left', 'pixicon-software-paragraph-align-right', 'pixicon-software-paragraph-center', 'pixicon-software-paragraph-justify-all', 'pixicon-software-paragraph-justify-center', 'pixicon-software-paragraph-justify-left', 'pixicon-software-paragraph-justify-right', 'pixicon-software-paragraph-space-after', 'pixicon-software-paragraph-space-before', 'pixicon-software-pathfinder-exclude', 'pixicon-software-pathfinder-intersect', 'pixicon-software-pathfinder-subtract', 'pixicon-software-pathfinder-unite', 'pixicon-software-pen', 'pixicon-software-pen-add', 'pixicon-software-pen-remove', 'pixicon-software-pencil', 'pixicon-software-polygonallasso', 'pixicon-software-reflect-horizontal', 'pixicon-software-reflect-vertical', 'pixicon-software-remove-vectorpoint', 'pixicon-software-scale-expand', 'pixicon-software-scale-reduce', 'pixicon-software-selection-oval', 'pixicon-software-selection-polygon', 'pixicon-software-selection-rectangle', 'pixicon-software-selection-roundedrectangle', 'pixicon-software-shape-oval', 'pixicon-software-shape-polygon', 'pixicon-software-shape-rectangle', 'pixicon-software-shape-roundedrectangle', 'pixicon-software-slice', 'pixicon-software-transform-bezier', 'pixicon-software-vector-box', 'pixicon-software-vector-composite', 'pixicon-software-vector-line', 'pixicon-software-vertical-align-bottom', 'pixicon-software-vertical-align-center', 'pixicon-software-vertical-align-top', 'pixicon-software-vertical-distribute-bottom', 'pixicon-software-vertical-distribute-center', 'pixicon-software-vertical-distribute-top', 'pixicon-anchor', 'pixicon-badge', 'pixicon-bell-1', 'pixicon-chemestry', 'pixicon-controller', 'pixicon-credit-card-1', 'pixicon-crop', 'pixicon-cup-3', 'pixicon-disc', 'pixicon-dribbble-1', 'pixicon-dropbox', 'pixicon-emoticon', 'pixicon-energy', 'pixicon-envelope-letter', 'pixicon-envelope-open', 'pixicon-eyeglasses', 'pixicon-facebook-1', 'pixicon-fire-1', 'pixicon-follow', 'pixicon-following', 'pixicon-friends', 'pixicon-ghost', 'pixicon-graduation-cap-1', 'pixicon-hourglass-2', 'pixicon-magic-wand', 'pixicon-magnet-1', 'pixicon-monitor-1', 'pixicon-mouse-2', 'pixicon-moustache', 'pixicon-move', 'pixicon-notebook', 'pixicon-phone-6', 'pixicon-plane', 'pixicon-shield-1', 'pixicon-speedometer', 'pixicon-tablet-1', 'pixicon-tumblr-1', 'pixicon-twitter-1', 'pixicon-unfollow', 'pixicon-youtube-1', 'pixicon-arrow-left-1', 'pixicon-arrow-right-1', 'pixicon-bag-2', 'pixicon-basket', 'pixicon-basket-loaded', 'pixicon-briefcase-3', 'pixicon-bubbles', 'pixicon-calculator-1', 'pixicon-call-end', 'pixicon-call-in', 'pixicon-call-out', 'pixicon-compass-1', 'pixicon-cup-4', 'pixicon-diamond-2', 'pixicon-direction', 'pixicon-directions', 'pixicon-documents', 'pixicon-drawer', 'pixicon-droplet', 'pixicon-feed', 'pixicon-film', 'pixicon-folder-1', 'pixicon-frame', 'pixicon-globe-1-1', 'pixicon-globe-2', 'pixicon-handbag', 'pixicon-headphones', 'pixicon-headphones-microphone', 'pixicon-layers', 'pixicon-map-3', 'pixicon-opened-book', 'pixicon-picture-1', 'pixicon-pin-2', 'pixicon-playlist', 'pixicon-present', 'pixicon-printer-1', 'pixicon-puzzle-2', 'pixicon-speach', 'pixicon-vector', 'pixicon-wallet-1', 'pixicon-ban-1', 'pixicon-bubble-1', 'pixicon-check-1', 'pixicon-clock-1', 'pixicon-close', 'pixicon-document', 'pixicon-download-1', 'pixicon-envelope-1', 'pixicon-eye-3', 'pixicon-female', 'pixicon-female-user', 'pixicon-flag-1', 'pixicon-folder-2', 'pixicon-heart-4', 'pixicon-info-1', 'pixicon-key-5', 'pixicon-link-4', 'pixicon-lock-4', 'pixicon-magnifier', 'pixicon-male', 'pixicon-male-user', 'pixicon-paper-clip', 'pixicon-paper-plane-1', 'pixicon-photo-1', 'pixicon-plus-1', 'pixicon-pointer', 'pixicon-power-1', 'pixicon-refresh', 'pixicon-reload-1', 'pixicon-settings-5', 'pixicon-star-5', 'pixicon-target-1', 'pixicon-unlock-1', 'pixicon-upload-1', 'pixicon-video', 'pixicon-volume-1', 'pixicon-volume-2', 'pixicon-volume-off', 'pixicon-zoom-in-1', 'pixicon-zoom-out-1', 'pixicon-actual-size', 'pixicon-bar-chart', 'pixicon-bulb-2', 'pixicon-calendar-3', 'pixicon-config', 'pixicon-cursor', 'pixicon-dislike', 'pixicon-end', 'pixicon-forward', 'pixicon-full-screen', 'pixicon-graph-3', 'pixicon-grid-2', 'pixicon-help-1', 'pixicon-home-2', 'pixicon-left', 'pixicon-like', 'pixicon-list-1', 'pixicon-login', 'pixicon-logout', 'pixicon-loop-1', 'pixicon-microphone', 'pixicon-music-note1', 'pixicon-music-note2', 'pixicon-note-2', 'pixicon-pause-2', 'pixicon-pencil-2', 'pixicon-pie-chart-1', 'pixicon-play', 'pixicon-question-2', 'pixicon-rewind', 'pixicon-right', 'pixicon-rocket-3', 'pixicon-share1', 'pixicon-share2', 'pixicon-shuffle', 'pixicon-start', 'pixicon-tag-3', 'pixicon-trash-1', 'pixicon-umbrella', 'pixicon-wrench-2', 'pixicon-mouse-3', 'pixicon-hierarchy-2', 'pixicon-hierarchy', 'pixicon-bicycle', 'pixicon-bicycle-vintage', 'pixicon-bag-3', 'pixicon-ribbon', 'pixicon-lock-5', 'pixicon-sun', 'pixicon-speaker', 'pixicon-speaker-off');

	$pix_icons_class_html = '';

	foreach ( $pix_icons as $icon ) {
		$pix_icons_class_html 	.= '<i class="'. esc_attr( $icon ) .'"></i> ';
	}
	
    echo json_encode( $pix_icons_class_html );
	
	die();
}
add_action('wp_ajax_composer_load_icon_fonts', 'composer_load_icon_fonts');

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Events
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function composer_body_classes( $classes ) {
	global $smof_data;

	// Adds a class of group-blog to blogs with more than 1 published author.

	$prefix = composer_get_prefix();
	$id = get_the_id();

	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( composer_is_shop() || composer_is_product_category() ) {
		$shop_page_id = wc_get_page_id( 'shop' );
		$sidebar_position = composer_get_option_value( 'shop_sidebar', 'full-width' );
	}elseif( composer_is_single_shop() ){
		$sidebar_position = composer_get_option_value( 'single_shop_sidebar', 'full-width' );		
	}else{
		if( is_home() || is_singular( 'post' ) || is_archive() || is_search() ) {
            //Sidebar position
            $sidebar_position = isset($smof_data[$prefix.'sidebar']) ? $smof_data[$prefix.'sidebar'] : 'right-sidebar';
		}
		else if( is_page() ) {
			//Sidebar position
            $sidebar_position = composer_get_meta_value( $id, '_amz_layout', 'default' ); // id, meta_key, meta_default
		}
		else{
			$sidebar_position = '';
		}
	}

    if( $sidebar_position == 'left-sidebar' || $sidebar_position == 'left-nav' ) {
	        $classes[] = 'sidebar-left';
    }
    elseif( $sidebar_position == 'right-sidebar' || $sidebar_position == 'right-nav' ) {
	        $classes[] = 'sidebar-right';
    }

    if( has_nav_menu( 'mobile-nav' ) ){
    	$classes[] = 'seperate-mobile-nav';
    }

	$mobile_responsive = composer_get_option_value( 'mobile_responsive', 'no' );
	if( 'off' === $mobile_responsive ){
		$classes[] = 'pix-no-responsive';
	}

	${$prefix.'header_layout'} = composer_get_meta_value( $id, '_amz_header_layout', 'default', 'header_layout', 'header-1' );

	if( ${$prefix.'header_layout'} == 'left-header'){
		$classes[] = 'left-header-con';
	}
	if( ${$prefix.'header_layout'} == 'right-header'){
		$classes[] = 'right-header-con';
	}

	${$prefix.'mobile_menu_align'} = composer_get_option_value( 'mobile_menu_align', 'left' );

	if( ${$prefix.'mobile_menu_align'} == 'right'){
		$classes[] = 'right-mobile-menu';
	}

	$flyin_sidebar = composer_get_option_value( 'flyin_sidebar', 'off' );
	if( 'on' === $flyin_sidebar ){
		$classes[] = 'flyin-sidebar-wrapper';
	}

	$pix_ajax = composer_get_option_value( 'pix_ajax', 'no' );
	if( 'yes' === $pix_ajax && !isset( $_GET['vc_editable'] ) ){
		$classes[] = 'pix-ajaxify';
	}

	$pix_preloader = composer_get_option_value( 'pix_preloader', 'no' );
	if( 'yes' === $pix_preloader && !isset( $_GET['vc_editable'] ) ){
		$classes[] = 'pix-preloader-enabled';
		$classes[] = 'pix-preload-enabled';
	}


	${$prefix.'boxed_content'} = composer_get_meta_value( $id, '_amz_boxed_content', 'default', 'boxed_content', 'wide' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

	// If content Boxed enabled in themeoption insert this div
	if ( ${$prefix.'boxed_content'} === 'frame' ) {
		$classes[] = ' composer-frame';
	}elseif ( ${$prefix.'boxed_content'} === 'boxed' ) {
		$classes[] = 'composer-boxed';
	}else {
		$classes[] = 'composer-wide';
	}

	${$prefix.'transparent_header'} = composer_get_meta_value( $id, '_amz_transparent_header', 'default', 'transparent_header', 'hide' );
	if( 'show' === ${$prefix.'transparent_header'} ) {
		$classes[] = 'composer-trans-header-enabled';
	}

	${$prefix.'top_header'} = composer_get_meta_value( $id, '_amz_top_header', 'default', 'top_header', 'hide' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

    if( ${$prefix.'top_header'} === 'show' ) {
    	$classes[] = 'composer-top-header-enabled';
    }

	${$prefix.'header_background_style'} = composer_get_meta_value( $id, '_amz_header_background_style', 'default', 'header_background_style', 'light' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

	if( 'dark' === ${$prefix.'header_background_style'} ){
		$classes[] = 'composer-header-dark';
	}

	${$prefix.'header_width'} = composer_get_meta_value( $id, '_amz_header_width', 'default', 'header_width', 'wide' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

	/* Header Container Width */
	if( ${$prefix.'header_width'} === 'wide' ){
		$classes[] = 'full-header';
	}

	return $classes;
}
add_filter( 'body_class', 'composer_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function composer_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'composer' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'composer_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function composer_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'composer_render_title' );
endif;





/* Duplicate posts option */
if( !function_exists( 'amz_duplicate_post_link' ) ) {
	
	function amz_duplicate_post_link( $actions, $post ) {

		if ( ( $post->post_type == 'pix_portfolio' ) && current_user_can('edit_posts') ) {
			$actions['duplicate'] = '<a href="admin.php?action=amz_duplicate_post_as_draft&amp;post=' . $post->ID . '">' . esc_html__( 'Duplicate', 'composer' ) .'</a>';
		}
		return $actions;

	}

}

add_filter( 'page_row_actions', 'amz_duplicate_post_link', 10, 2 );

/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function amz_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'amz_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		} 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'edit.php?post_type=pix_portfolio' ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_amz_duplicate_post_as_draft', 'amz_duplicate_post_as_draft' );

