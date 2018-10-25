if( _.isUndefined(vc) ) var vc = {};

( function( $, window ) {
	"use strict";

	$('#vc_navbar').find('.vc_navbar-nav').append('<li id="amz-templates" class="amz-templates amz-fontend-template-icon amz-tooltip"><span>Blocks</span></li>');

	/* Primary tabs */
	var $tabs = $('#amz-templates-dialog .amz-tab-group');

	$tabs.each(function( i ) {

		var $tabContents = $(this).parents('.tab-group-wrap').next('.tab-content-wrap');
		var currentTabIndex = 0;

		$(this).find('li').each( function( index ) {
			if( $(this).hasClass('vc_active') ) {
				currentTabIndex = index;
			}
		});

		if( currentTabIndex == 0 ) {
			$(this).find('li').first().addClass('vc_active');
		}

		$tabContents.find('.tab-content').eq( parseInt(currentTabIndex) ).addClass('vc_active').fadeIn();

		$(this).on('click', 'li', function(e) {
			e.preventDefault();				
			e.stopPropagation();
			
			var index = $(this).index(),
				$tab_content = $tabContents.find('.tab-content').eq( parseInt(index) );

			$(this).addClass('vc_active').siblings().removeClass('vc_active');
			$tab_content.fadeIn().addClass('vc_active').siblings().hide().removeClass('vc_active');

			// lazy load images

		});

	});

	/* Sub tabs */
	var $tabs = $('#amz-templates-dialog .amz-sub-tabs');

	$tabs.each(function( i ) {

		var $tabContents = $(this).parent('.amz-sub-tab-group').next('.tab-sub-content-wrap');
		var currentTabIndex = 0;

		$(this).find('li').each( function( index ) {
			if( $(this).hasClass('vc_active') ) {
				currentTabIndex = index;
			}
		});

		if( currentTabIndex == 0 ) {
			$(this).find('li').first().addClass('vc_active');
		}

		$tabContents.find('.sub-tab-content').eq( parseInt(currentTabIndex) ).addClass('vc_active').fadeIn();

		$(this).on('click', 'li', function(e) {
			e.preventDefault();				
			e.stopPropagation();
			
			var tab = $(this).data('tab'),
				$tab_content = $tabContents.find('.sub-tab-content.'+tab );

			$(this).addClass('vc_active').siblings().removeClass('vc_active');
			$tab_content.fadeIn().addClass('vc_active').siblings().hide().removeClass('vc_active');

			// lazy load images

		});

	});

	$('#wpbody-content').on('click', '#amz-templates', function(e) {
		e.preventDefault();

		$('#amz-templates-dialog .amz-temp-img img').each(function() {
			$(this).attr('src', $(this).data('src'));
		});

		$('#amz-templates-dialog').show();
		
	});

	window.AmzTp = {};
	AmzTp.templates_panel_view = vc.TemplatesPanelViewBackend.extend({
        template_load_action: "amz_frontend_load_template",
        loadUrl: !1,
        initialize: function() {
            this.loadUrl = vc.$frame.attr("src"), vc.TemplatesPanelViewFrontend.__super__.initialize.call(this)
        },
        events: $.extend(vc.PanelView.prototype.events, {
            "click .amz-template-con": "loadTemplate",
            "click .amz-close-dialog": "hideWindow"
        }),
        hideWindow: function() {
            this.$el.hide();
        },
        render: function() {
            return vc.TemplatesPanelViewFrontend.__super__.render.call(this)
        },
        loadTemplate: function(e) {
            e.preventDefault(), e.stopPropagation();

            var $self = $(e.target).closest(".amz-template-con"),
            	template_id = $self.data('template-id'),            	
            	nonce = this.$el.data('amz-template-nonce');

        	if( $self.hasClass('amz-disabled') ) {
        		return;
        	}

            console.log( template_id );

            $.ajax({
                type: "POST",
                url: window.ajaxurl,
                data: {
                    action  		   : this.template_load_action,
                    id				   : template_id,
                    amz_template_nonce : nonce,
                    vc_inline: !0,
                },
                beforeSend: function() {
                	$self.addClass('amz-loading');
                	console.log( this.$el );
                	$('#amz-templates-dialog').find('.amz-template-con').addClass('amz-disabled');
                },
                context: $self
            }).done(this.renderTemplate)
            .fail(function() {
				console.log("error");
				
				$self.removeClass('amz-loading');
				
				$('#amz-templates-dialog .amz-template-con').removeClass('amz-disabled');
			});
        },
        renderTemplate: function(html) {
        	// console.log(html);
            var template, data;
            _.each($(html), function(element) {
                if ("vc_template-data" === element.id) try {
                    data = JSON.parse(element.innerHTML)
                } catch (e) {
                    vcConsoleLog(e)
                }
                "vc_template-html" === element.id && (template = element.innerHTML)
            }), template && data && vc.builder.buildFromTemplate(template, data) ? vc.showMessage(window.i18nLocale.template_added_with_id, "error") : vc.showMessage(window.i18nLocale.template_added, "success"), vc.closeActivePanel()

            	$('#amz-templates-dialog').hide();

            	this.addClass('amz-sucess').removeClass('amz-loading');

            	$('#amz-templates-dialog .amz-template-con').removeClass('amz-disabled');

        }
    });

	var amzTpView = new AmzTp.templates_panel_view({
        el: "#amz-templates-dialog"
    });


})( jQuery, window );
