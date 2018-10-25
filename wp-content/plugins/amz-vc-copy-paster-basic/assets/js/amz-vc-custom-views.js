if( _.isUndefined(vc) ) var vc = {};

( function( $, window, AmzVcpTemplates, AmzVcpHTML ){
	"use strict";

	window.AmzVcp = {
		// Models: {},
		// Collections: {},
		Views: {}
	};

	// Visual composer content view
	AmzVcp.Views.VcContent = Backbone.View.extend({
		el: '#visual_composer_content',
		buttons: AmzVcpHTML.Buttons,
		amzCopiedItems: {},
		amzCopiedChildItems: {},
		livePaste: 1,

		events: {
			// 'click .amz_control_copy': 'copyShortcode',
		},

		initialize: function() {
			var copiedItems = localStorage.getItem('amz_copied_items');

			this.$countHtml = $('<a/>', { 
										class: ' amz_copy_count', 
										href: '#'
									}).html('0');

			$('#wpb_visual_composer #vc_navbar').find('.vc_navbar-nav').append('<li id="amz-templates" class="amz-templates amz-tooltip"><span>Blocks</span></li><li class="amz_count_wrap amz-tooltip"><span>Clear</span></li>').find('li.amz_count_wrap').append( this.$countHtml );

			// get already copied items from localstorage
			if( copiedItems ) {
				this.amzCopiedItems = JSON.parse( copiedItems );
			}

			this.updateCount();
			
			// Add controls for already create shortcodes
			vc.events.bind( 'backendEditor.show', this.initVc, this );

			// Add controls for newly added shortoces
			vc.shortcodes.bind( 'add', this.addControls, this );

			this.$countHtml.on('click', $.proxy( this.resetCopiedItem, this ) );

			var self = this;
			if( this.livePaste ) { // only update if livePaste is enabled
				
				$(window).bind('storage', function (e) {
				     // console.log(e.originalEvent.key, e.originalEvent.newValue);

				     self.amzCopiedItems = self.getFromLocalStorage();
				     self.$countHtml.html( _.size( self.amzCopiedItems ) );

				 });
			}
		
		},

		test: function( data ) {
			// console.log( 'yes' );
		},

		updateCount: function() {

			this.count = _.size( this.amzCopiedItems );
			this.$countHtml.html( this.count );

			return this.count;
		},

		resetCopiedItem: function(e) {
			e.preventDefault();
			this.count = 0;
			this.$countHtml.html( this.count );

			this.amzCopiedItems = {};
			this.amzCopiedChildItems = {};

			window.localStorage.removeItem( 'amz_copied_items' );
		},

		isContainer: function( model ) {
			var mapped = vc.getMapped( model.get('shortcode') );
			return _.isObject( mapped ) && ( _.isBoolean( mapped.is_container ) && !0 === mapped.is_container || !_.isEmpty( mapped.as_parent ) );
		},

		// Adding control buttons to shortcode controls
		addControls: function( model ) {

			var $elem =  model.view.$el,
				shortcode = model.get('shortcode'),
				$controls, $wrap = $('<div/>', { class: 'amz_controls_wrap' }  ),
				isContainer = this.isContainer( model ), $btn;

			// get controls

			if ( shortcode == 'vc_row' || shortcode == 'vc_row_inner' || shortcode == 'vc_column' || shortcode == 'vc_column_inner' ) {

				$controls = $elem.find('.vc_controls').first();

			} else {

				$controls = $elem.find('.vc_controls').first().children('.vc_controls-cc').first();
				
				if ( ! $controls.length ) {
					$controls = $elem.find('.vc_controls').first().children('div').first();
				}

				if ( ! $controls.length ) {
					$controls = $elem.find('.vc_controls').first();
				}

			}

			if ( $controls.length ) {

				_.each( this.buttons, function( val, key ) {						
					
					// only add paste buttons to container elements
					if( ( key == 'paste' || key == 'pasteSelected' || key == 'pasteBelow' ) && ! isContainer ) {
						return;
					}

					if( shortcode == 'vc_row' && key == 'pasteBelow' ) {

						var $rowBottomBtn = $('<a/>', { 
									class: val.classname, 
									href: '#', 
									title: val.title // @todo: use wp_localization so that user can translate
								} ).html( val.html );

						// add events and append to controls
						$rowBottomBtn.on('click', model,  $.proxy( this[key], this ) );
						var $bottomControl = $('<div/>', { 
								class: 'amz-vcp-row-control-bottom'
							}).append( $rowBottomBtn );

						$rowBottomBtn.appendTo( $bottomControl );
						$elem.append( $bottomControl );
						
					} else {

						if( key == 'pasteBelow' ) {
							return;
						}

						// create button
						$btn = $('<a/>', { 
										class: val.classname + ' amz_control_' + key.toLowerCase() + '_' + shortcode, 
										href: '#', 
										title: val.title 
									} ).html( val.html );

						// change html if row or coloumn
						if( shortcode == 'vc_row' || shortcode == 'vc_row_inner' || shortcode == 'vc_column' || shortcode == 'vc_column_inner' ) {
							$btn.html( '<i class="icon"></i>' );
							$wrap.addClass( 'amz_row_column amz_controls_wrap_' + shortcode );
						}
						
						// add events and append to controls							
						$btn.on('click', model, $.proxy( this[key], this ) );					
						$btn.appendTo( $wrap );

					}					

				}, this );

				// add button on column bottom
				/*if( shortcode == 'vc_column' ) {

					var $bottomControl = $elem.find('.bottom-controls').first(),
						$bottomBtn = $btn.clone();

					$btn.addClass('amz_prepend');

					// add events and append to controls
					$bottomBtn.on('click', model, this[key] );
					$bottomBtn.addClass('amz_append').appendTo( $bottomControl );
					
				}*/

				$controls.append( $wrap );
				
			}

		},

		// after vc build shortcodes, add button to all shortcodes
		initVc: function() {
			var self = this;

			// vc.app.setLoading(); // this causing issue with vc reset window
			$('#vc_logo').addClass('vc_ui-wp-spinner');
			vc.shortcodes.forEach( function( model ) {

				this.addControls( model );
				
			}, this );

			$('#vc_logo').removeClass('vc_ui-wp-spinner');
			// this.$el.parent('.metabox-composer-content').removeClass('vc_loading-shortcodes');

		},

		// adding child elements to this.items
		getChild: function( parent_id ) {
			_.each(vc.shortcodes.where({
				parent_id: parent_id
			}), function( model ) {
				this.items.push ({ 
					name: vc.map[model.get('shortcode')]['name'],
					shortcode: model.get('shortcode'),
					params : model.get('params'),
					order: model.get("order"),
					id: model.get("id"),
					parent_id: parent_id // try to set root parent_id as 0 and set child as 1
				});
				this.getChild( model.get('id') );
			}, this);
		},

		copyItems: function( model ) {
			var params = model.get('params'),
				shortcode = model.get('shortcode'),
				name = vc.map[shortcode]['name'],
				id = model.get('id');
			
			this.items = [];
			             
			// this is not nessacary since we are copying already created shortcode
			// mergedParams = _.extend( {}, vc.getDefaults(shortcode), vc.getMergedParams( shortcode, params ) ),
			/*if( _.isUndefined( params.content ) ){
				mergedParams.content = params.content
			}*/

			// get shortocde name, params and save it in localstorage
			this.items.push ({ 
				name: name,
				shortcode: shortcode,
				params : params,
				order: model.get("order"),
				id: id,
				parent_id: !1
			});

			// make sure to save all of its child shortcodes as well
			this.getChild( id );

			name = ( _.size( this.amzCopiedItems ) + 1 ) + ':' + name;

			this.amzCopiedItems[name] = this.items;

			// console.log( this.amzCopiedItems );

			/*console.log( _.sortBy(this.amzCopiedItems[name], function( scs ) {
                    return scs.order
                }) );*/

			this.saveToLocalStorage(); // add to localstorage and update count

			this.items = [];
		},

		saveToLocalStorage: function(){

			this.updateCount();
			// console.log( JSON.stringify( this.amzCopiedItems  ) );
			window.localStorage.setItem( 'amz_copied_items', JSON.stringify( this.amzCopiedItems  ) );	
		},

		getFromLocalStorage: function(){

			// console.log( JSON.stringify( this.amzCopiedItems  ) );
			return JSON.parse( window.localStorage.getItem( 'amz_copied_items' ) );
		},

		// Copy the clicked shortocode
		copy: function( e ) {
			var model = e.data;

			this.amzCopiedItems = {};
			this.copyItems( model );

			// console.log( 'copy function running!' );

			e.preventDefault();
			e.stopPropagation();
		},

		copyPlus: function( e ) {
			var model = e.data;

			this.copyItems( model );

			// console.log( 'copyPlus' );

			e.preventDefault();
			e.stopPropagation();
		},

		paste: function( e ) {
			var model = e.data,
				params = model.get('params'),
				curShortcode = model.get('shortcode'),
				createParent = true;

				// console.log( 'pasting...' );
				window.amz = this.amzCopiedItems;

				if( this.livePaste ) {
					this.amzCopiedItems = this.getFromLocalStorage();
				}

				_.each( this.amzCopiedItems, function( shortcode ){

					// console.log( shortcode );

					var tag = shortcode.shortcode; 

					var parent_model = _.filter(shortcode, function(model) {
						return !1 === model.parent_id
					});

					parent_model = parent_model[0];

					// we should run paste-inside method for the first copied shortcode, from next shortcode we can run insert below 
					// or we can skip it entirely (meaning dont paste 2nd elem, 3nd elem .. etc)
					// or we can add all the elements in this row/column it-self (by skipping all the container elements).
					if( createParent ) {

						if( parent_model.shortcode === curShortcode ) {
							// model.save( "params", parent_model.params );
							// console.log( model );
							// console.log(parent_model.params);
						}

						if( 'vc_row' === parent_model.shortcode && 'vc_row' === curShortcode ) {
							
							var savedColumns = _.sortBy(_.filter(shortcode, function(model) {
								return parent_model.id === model.parent_id
							}), function(model) {
								return model.order;
							});

							var curColumns = _.sortBy(vc.shortcodes.where({
								parent_id: model.get("id")
							}), function(model) {
								return model.get("order")
							});

							if( savedColumns.length > curColumns.length ){
								// then create more columns (& change old columns width param), overwrite other params, then append child elements
								console.log( "copied item have more columns, so create extra columns" );

								curColumns.forEach( function( model, i ) {

									// model.save( "params",savedColumns[i][params] );
									console.log(savedColumns[i][params]);
									
								}, this );
								// paste params, from saved column to curColumn
								// and paste child
								// 
								// create extra column and repeat above process


							} else if( savedColumns.length < curColumns.length ){
								var colParams;
								// paste on respective column(s) [paste first col items in first cal etc], overwrite params, then append child elements
								console.log( "copied item have less columns, so add shortcodes on respective columns" );

								curColumns.forEach( function( model, i ) {
									
									colParams = {};

									if( i <= savedColumns.lengh ) {
										colParams = savedColumns[i][params];
										delete colParams.width;
									}
									
									// model.save( "params",savedColumns[i][params] );
									console.log( colParams );
									
								}, this );

								// paste params (except param width), from saved column to curColumn
								// and paste child

							} else {
								// overwrite params, then append child elements
								console.log( "both are equal. simply add items" );
							}

						} else if( 'vc_column' === parent_model.shortcode && 'vc_column' === curShortcode ) {

							// if equal then overwrite params (skip width param), then add child elements (append / prepend)

						} else {

							// then element is not equal
							// user may copied row and paste it inside column or any other container
							// or they may copy column and paste it inside row or any other container
							// in these above cases we can skip container shortocode, also we can check parent_as and child_as

							// ----------

							// parent shortocode name is not vc_row or column 
							// then check is_container or content_element 
							// then get parent_as and child_as
							// check content_element = true if false, this can be insert directly by user example section
							// ----
							// ----
							// ----

						}

						createParent = false;
					} 

				}, this );

			e.preventDefault();
			e.stopPropagation();
		},

		getNewOrder: function( order_number ) {

			vc.clone_index /= 10;
			return parseFloat( order_number ) + vc.clone_index;

		},

		createRow: function( row_params, new_order ) {

			new_order = _.isUndefined( new_order ) ? vc.shortcodes.getNextOrder() : new_order;
			row_params = _.isUndefined( row_params ) ? {} : row_params;

			"undefined" != typeof window.vc_settings_presets.vc_row && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row));
			return vc.shortcodes.create({
				shortcode: "vc_row",
				params: row_params,
				order: new_order
			});

		},

		createColumn: function( parent_id, column_params ) {

			column_params = _.isUndefined( column_params ) ? {} : column_params;
			"undefined" != typeof window.vc_settings_presets.vc_column && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column));
			return vc.shortcodes.create({
				shortcode: "vc_column",
				params: column_params,
				parent_id: parent_id,
				root_id: parent_id
			});

		},

		pasteBelow: function( e ) {
			var model = e.data,
				params = model.get('params'),
				shortcode = model.get('shortcode'),
				new_order, createParent = true;

			if( this.livePaste ) {
				this.amzCopiedItems = this.getFromLocalStorage();
			}

			new_order = this.getNewOrder( model.get("order") );

			var row_params, column_params, row_inner_params, column_inner_params, model, column, row, parent_id = false, root_id = false, child_parent_id;

			_.each( this.amzCopiedItems, function( shortcode ){

				// console.log( shortcode );
				
				var tag = shortcode.shortcode; 

				var parent_model = _.filter(shortcode, function(model) {
					return !1 === model.parent_id
				});

				parent_model = parent_model[0];

				// console.log( parent_model );

				if ( "vc_row" === parent_model.shortcode || "vc_column" === parent_model.shortcode ) {
					createParent = true;
				}

				if ( "vc_row" !== parent_model.shortcode ) {

					if( createParent ) {

						if ( "vc_column" !== parent_model.shortcode ) {

							row = this.createRow( {}, new_order );
							parent_id = row.id;
							root_id = row.id;

							new_order = this.getNewOrder( row.order );

							column = this.createColumn( parent_id, { width: "1/1" } );
							parent_id = column.id;


						} else if ( "vc_column" === parent_model.shortcode ) {

							row = this.createRow( {}, new_order );
							parent_id = row.id;
							root_id = row.id;

						}

						createParent = false;

					}

					// create parent (container) 
					// need to bulid property, root id, parent id should be added only if above code runs, bacause of this
					// after 1st loop, if row is copied then its paste inside 1st loop element.
					var sc = vc.shortcodes.create({
						shortcode: parent_model.shortcode,
						params: parent_model.params,
						parent_id: parent_id,
						root_id: root_id
					});

				} else {

					var sc = vc.shortcodes.create({
						shortcode: parent_model.shortcode,
						params: parent_model.params,
						order: new_order
					});

					parent_id = sc.id;
					root_id = sc.id;

					new_order = this.getNewOrder( sc.order );

				}

				// create child
				// other shortcodes which have parent id and re-order by order
				this.amzCopiedChildItems = _.sortBy( _.filter( shortcode, function( model ) {
					return ( model.parent_id )
				}), function( model ) {
					return model.order
				});

				// console.log( this.amzCopiedItems );
				
				// console.log( 'copied child length: ' + _.size( this.amzCopiedChildItems ) );

				if( _.size( this.amzCopiedChildItems ) ) {	

					// if newly create shortcode is a container set it as parent id for child shortcodes
					// otherwise append it to the column or row
					if( vc.map[parent_model.shortcode].is_container || vc.map[parent_model.shortcode].content_element ) {	
						child_parent_id = sc.id;

						if( "vc_row" === parent_model.shortcode ) {
							root_id = parent_id;
						}
					} else {
						child_parent_id = parent_id;
					}

					this.pasteChildItems( parent_model.id, child_parent_id, root_id );
				}

				this.amzCopiedChildItems = {}; // we dont use this outside this function

			}, this );

			e.preventDefault();
			e.stopPropagation();
		},

		// create child elements
		pasteChildItems: function( old_parent_id, new_parent_id, root_id ) {

			_.each( _.filter( this.amzCopiedChildItems, function( model ) {
						return old_parent_id === model.parent_id
				}), function( model ) {

				var new_model = vc.shortcodes.create({
					shortcode: model.shortcode,
					params: model.params,
					parent_id: new_parent_id,
					// order: model.order
				});

				// console.log( new_model );

				this.pasteChildItems( model.id, new_model.id, root_id );

			}, this);
		},

		pasteSelected: function( e ) {
			var model = e.data,
				params = model.get('params'),
				shortcode = model.get('shortcode'),
				mergedParams;

				// console.log( 'pasteSelected' );

			e.preventDefault();
			e.stopPropagation();
		},

		viewScString: function( e ) {
			
			vc.events.trigger('vcp.open.dialog', vc.storage.storageCreateShortcodeString( e.data ), e.data.get('shortcode') );

			e.preventDefault();
			e.stopPropagation();
		}

	});


	/* Shortcode String Dialog View */
	AmzVcp.Views.ViewShortcode = Backbone.View.extend({
		tagName: 'div',
		id: 'amz-shortcode-string-dialog',
		className: 'vc_ui-post-settings-header-container vc_ui-panel-header-container vc_ui-panel-header-o-stacked-bottom ui-draggable-handle',
		template: AmzVcpHTML.ViewShortcodeDialog,

		events: {
			'click .close': 'closeDialog'
		},

		initialize: function() {

			this.el.innerHTML = this.template;

			this.$ta = this.$el.find( '#amz-sc-string-textarea' );
			this.$title = this.$el.find( '#amz-vcp-title' );

			// open show shortcode dialog and when user click view sc button on this model
			vc.events.on( 'vcp.open.dialog', this.render, this );

		},

		initDraggable: function() {
		    this.$el.draggable({
		        cursor: "move",
		        handle: ".vc_ui-panel-header-container",
		    });
		},

		render: function( shortcode, name ) {
			// add shortcode name to title and add shortcode to textarea
			this.$title.text( str_replace( ['vc_','_'], ['', ' '], name ) );
			this.$ta.val( shortcode );
			this.openDialog();
			return this;
		},

		openDialog: function() {

			if ( this.$el.parent().length == 0 ) {

				this.$el.appendTo('#wpwrap').show();

				// Draggable must be set after append to the dom
				this.initDraggable();

			}  else {
				this.$el.show();
			}
			
		},

		closeDialog: function() {
			this.$el.hide();
			this.$ta.val('');
			this.$title.text('');
		}

	});

	var amzVcViewShortcode = new AmzVcp.Views.ViewShortcode();
	window.amzVcContent = new AmzVcp.Views.VcContent();


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

	$('#amz-templates-dialog').on('click', '.amz-close-dialog', function(event) {
		event.preventDefault();
		
		$('#amz-templates-dialog').hide();

	});

	$('#wpb_visual_composer').on('click', '#amz-templates', function(e) {
		e.preventDefault();

		$('.amz-temp-img img').each(function() {
			$(this).attr('src', $(this).data('src'));
		});

		$('#amz-templates-dialog').show();
		
	});

	$('#amz-templates-dialog').on('click', '.amz-template-con', function(e) {
		e.preventDefault();

		if( $(this).hasClass('amz-disabled') ) {
			return;
		}

		var template_id = $(this).data('template-id'),
			$self = $(this),
			nonce = $('#amz-templates-dialog').data('amz-template-nonce');

		$.ajax({
			url: ajaxurl,
			data: {
				action  		  : 'amz_insert_template',
				id				  : template_id,
				amz_template_nonce: nonce
			},
			beforeSend: function() {
				$self.addClass('amz-loading');
				$('#vc_logo').addClass('vc_ui-wp-spinner');
				$('#amz-templates-dialog .amz-template-con').addClass('amz-disabled');
			},
		})
		.done(function( template ) {

			$self.addClass('amz-sucess');		

			vc.shortcodes.createFromString(template);

			$('#vc_logo').removeClass('vc_ui-wp-spinner');
			$self.removeClass('amz-loading');
			
			$('#amz-templates-dialog .amz-template-con').removeClass('amz-disabled');

		})
		.fail(function() {
			console.log("error");
			$('#vc_logo').removeClass('vc_ui-wp-spinner');
			$self.removeClass('amz-loading');
			
			$('#amz-templates-dialog .amz-template-con').removeClass('amz-disabled');
		})
		.always(function() {
			
		});
		
	});

})( jQuery, window, AmzVcpTemplates, AmzVcpHTML );
