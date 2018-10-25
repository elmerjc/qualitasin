<?php
/**
 * Navigation Menu API: Walker_Nav_Menu_Edit class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */

/**
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Composer_Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu {
	/**
	 * Starts the list before the elements are added.
	 *
	 * @see Walker_Nav_Menu::start_lvl()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   Not used.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @see Walker_Nav_Menu::end_lvl()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   Not used.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {}

	/**
	 * Start the element output.
	 *
	 * @see Walker_Nav_Menu::start_el()
	 * @since 3.0.0
	 *
	 * @global int $_wp_nav_menu_max_depth
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   Not used.
	 * @param int    $id     Not used.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $_wp_nav_menu_max_depth;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		ob_start();
		$item_id = esc_attr( $item->ID );
		$removed_args = array(
			'action',
			'customlink-tab',
			'edit-menu-item',
			'menu-item',
			'page-tab',
			'_wpnonce',
		);

		$original_title = '';
		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) )
				$original_title = false;
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title = get_the_title( $original_object->ID );
		} elseif ( 'post_type_archive' == $item->type ) {
			$original_object = get_post_type_object( $item->object );
			if ( $original_object ) {
				$original_title = $original_object->labels->archives;
			}
		}

		$classes = array(
			'menu-item menu-item-depth-' . esc_attr( $depth ),
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
		);

		$title = $item->title;

		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			/* translators: %s: title of menu item which is invalid */
			$title = sprintf( esc_html__( '%s (Invalid)', 'composer' ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			/* translators: %s: title of menu item in draft status */
			$title = sprintf( esc_html__('%s (Pending)', 'composer' ), $item->title );
		}

		$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

		$submenu_text = '';
		if ( 0 == $depth )
			$submenu_text = 'style="display: none;"';

		?>
		<li id="menu-item-<?php echo esc_attr( $item_id ); ?>" class="<?php echo esc_attr( implode(' ', $classes ) ); ?>">
			<div class="menu-item-bar">
				<div class="menu-item-handle">
					<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php esc_html_e( 'sub item', 'composer' ); ?></span></span>
					<span class="item-controls">
						<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
						<span class="item-order hide-if-js">
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-up-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-up" aria-label="<?php esc_attr_e( 'Move up', 'composer' ) ?>">&#8593;</a>
							|
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-down-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-down" aria-label="<?php esc_attr_e( 'Move down', 'composer' ) ?>">&#8595;</a>
						</span>
						<a class="item-edit" id="edit-<?php echo esc_attr( $item_id ); ?>" href="<?php
							echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
						?>" aria-label="<?php esc_attr_e( 'Edit menu item', 'composer' ); ?>"><?php esc_html_e( 'Edit', 'composer' ); ?></a>
					</span>
				</div>
			</div>

			<div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo esc_attr( $item_id ); ?>">
				<?php if ( 'custom' == $item->type ) : ?>
					<p class="field-url description description-wide">
						<label for="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>">
							<?php esc_html_e( 'URL', 'composer' ); ?><br />
							<input type="text" id="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
						</label>
					</p>
				<?php endif; ?>
				<p class="description description-wide">
					<label for="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'Navigation Label', 'composer' ); ?><br />
						<input type="text" id="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
					</label>
				</p>
				<p class="field-title-attribute field-attr-title description description-wide">
					<label for="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'Title Attribute', 'composer' ); ?><br />
						<input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
					</label>
				</p>
				<p class="field-link-target description">
					<label for="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>">
						<input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $item->target, '_blank' ); ?> />
						<?php esc_html_e( 'Open link in a new tab', 'composer' ); ?>
					</label>
				</p>
				<p class="field-css-classes description description-thin">
					<label for="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'CSS Classes (optional)', 'composer' ); ?><br />
						<input type="text" id="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
					</label>
				</p>
				<p class="field-xfn description description-thin">
					<label for="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'Link Relationship (XFN)', 'composer' ); ?><br />
						<input type="text" id="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
					</label>
				</p>
				<p class="field-description description description-wide">
					<label for="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'Description', 'composer' ); ?><br />
						<textarea id="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
						<span class="description"><?php esc_html_e('The description will be displayed in the menu if the current theme supports it.', 'composer' ); ?></span>
					</label>
				</p>

				<?php
	            /* New fields insertion starts here */
	            //Insert Icon Field
	            ?>      
	            <p class="pix-field-custom description description-wide"><br class="clearboth"> 
	                <label for="edit-menu-item-subtitle-<?php echo esc_attr( $item_id ); ?>">
	                    <?php esc_html_e( 'Insert Menu Icon', 'composer' ); ?><br />
	                    <input type="hidden" id="edit-menu-item-icon-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-custom edit-menu-item-icon" name="menu-item-icon[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->icon ); ?>" />
	                    <span class="pix-inserted-icon"></span>

	                    <a href="#" class="button pix-insert-menu-icon"><i class="fa fa-arrow-circle-o-down"></i> <?php esc_html_e('Insert Icon', 'composer' ); ?></a>
	                    <a href="#" class="button pix-remove-menu-icon hidden"><i class="fa fa-times"></i> <?php esc_html_e('Remove Icon', 'composer' ); ?></a>
	                </label>
	            </p>
				<?php //Mega Menu ?>
	            <p class="pix-field-custom-megamenu description description-wide">
	                <label for="edit-menu-item-megamenu-<?php echo esc_attr( $item_id ); ?>">
	                    <?php esc_html_e( 'Mega Menu', 'composer' ); ?><br />
						<span class="switch-light switch-candy" onclick="">
							<input type="checkbox" id="edit-menu-item-megamenu-<?php echo esc_attr( $item_id ); ?>" name="menu-item-megamenu[<?php echo esc_attr( $item_id ); ?>]" value='1'  <?php checked( 1, $item->megamenu ); ?>>
							<span><span><?php esc_html_e('No','composer' ); ?></span><span><?php esc_html_e('Yes','composer' ); ?></span></span><a></a>
						</span>
	                </label>
	            </p>
				
				<div class="pix-field-custom-megamenucol-div">
	            <?php //Mega Menu Columns ?>
		            <div class="pix-field-custom-megamenucol description description-wide">
		                <label>
		                    <?php esc_html_e( 'Mega Menu Columns', 'composer' ); ?><br />
		                </label>
						<?php 
							$item->megamenucol = (isset($item->megamenucol) && !empty($item->megamenucol)) ? $item->megamenucol : 2;
						?>
						<div class="switch-toggle switch-5 switch-candy" onclick="">
							<input type="radio" id="edit-menu-item-megamenucol2-<?php echo esc_attr( $item_id ); ?>" name="menu-item-megamenucol[<?php echo esc_attr( $item_id ); ?>]" class="col2-menu" value='2'  <?php checked( 2, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol2-<?php echo esc_attr( $item_id ); ?>" onclick=""><?php esc_html_e('2','composer' ); ?></label>

							<input type="radio" id="edit-menu-item-megamenucol3-<?php echo esc_attr( $item_id ); ?>" name="menu-item-megamenucol[<?php echo esc_attr( $item_id ); ?>]" value='3'  <?php checked( 3, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol3-<?php echo esc_attr( $item_id ); ?>" onclick=""><?php esc_html_e('3','composer' ); ?></label>

							<input type="radio" id="edit-menu-item-megamenucol4-<?php echo esc_attr( $item_id ); ?>" name="menu-item-megamenucol[<?php echo esc_attr( $item_id ); ?>]" value='4'  <?php checked( 4, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol4-<?php echo esc_attr( $item_id ); ?>" onclick=""><?php esc_html_e('4','composer' ); ?></label>
                                                       
                                                        <input type="radio" id="edit-menu-item-megamenucol5-<?php echo esc_attr( $item_id ); ?>" name="menu-item-megamenucol[<?php echo esc_attr( $item_id ); ?>]" value='5'  <?php checked( 5, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol5-<?php echo esc_attr( $item_id ); ?>" onclick=""><?php esc_html_e('5','composer' ); ?></label>
                                                       
                                                        <input type="radio" id="edit-menu-item-megamenucol6-<?php echo esc_attr( $item_id ); ?>" name="menu-item-megamenucol[<?php echo esc_attr( $item_id ); ?>]" value='6'  <?php checked( 6, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol6-<?php echo esc_attr( $item_id ); ?>" onclick=""><?php esc_html_e('6','composer' ); ?></label>
							<a></a>
						</div>
						
		            </div>

		            <?php //Mega Menu position ?>
		            <p class="pix-field-custom-megamenupos description description-wide">
		                <label for="edit-menu-item-megamenupos-<?php echo esc_attr( $item_id ); ?>">
		                    <?php esc_html_e( 'Mega Menu Position', 'composer' ); ?><br />
							<span class="switch-light switch-candy" onclick="">
								<input type="checkbox" id="edit-menu-item-megamenupos-<?php echo esc_attr( $item_id ); ?>" name="menu-item-megamenupos[<?php echo esc_attr( $item_id ); ?>]" value='1'  <?php checked( 1, $item->megamenupos); ?>>
								<span><span><?php esc_html_e('Left','composer' ); ?></span><span><?php esc_html_e('Right','composer' ); ?></span></span><a></a>
							</span>
		                </label>
		            </p>

	            </div>

	            <?php //Mega Menu Title ?>
	            <p class="pix-field-custom-megamenutitle description description-wide">
	                <label for="edit-menu-item-megamenutitle-<?php echo esc_attr( $item_id ); ?>">
	                    <?php esc_html_e( 'Hide Title (only hide if mega menu enabled)', 'composer' ); ?><br />
						<span class="switch-light switch-candy" onclick="">
							<input type="checkbox" id="edit-menu-item-megamenutitle-<?php echo esc_attr( $item_id ); ?>" name="menu-item-megamenutitle[<?php echo esc_attr( $item_id ); ?>]" value='1'  <?php checked( 1, $item->megamenutitle ); ?>>
							<span><span><?php esc_html_e('Show','composer' ); ?></span><span><?php esc_html_e('Hide','composer' ); ?></span></span><a></a>
						</span>
	                </label>
	            </p>

	            <?php //Mega Menu Background Images ?>
	            <div class="pix-field-custom-megamenubgimg description description-wide">
	                <label for="edit-menu-item-megamenubgimg-<?php echo esc_attr( $item_id ); ?>">
	                    <?php esc_html_e( 'Insert Background Image', 'composer' ); ?><br />
	                </label>	
	                <div class="pix-pull-left pix_image_select pix-container">
	                	<input type="hidden" id="edit-menu-item-megamenubgimg-<?php echo esc_attr( $item_id ); ?>" class="pix-saved-val widefat code edit-menu-item-megamenubgimg" name="menu-item-megamenubgimg[<?php echo esc_attr( $item_id ); ?>]" value='<?php echo esc_attr( $item->megamenubgimg ); ?>' />
	                	<a href="#" class="select-files" data-title="Insert Images"  data-file-type="image" data-multi-select="false" data-insert="true"><?php esc_html_e('Insert Images', 'composer' ); ?></a>
	                </div>	                
	                
	            </div>

	            <p class="pix-field-custom-newtag description description-wide">
	                <label for="edit-menu-item-newtag-<?php echo esc_attr( $item_id ); ?>">
	                    <?php esc_html_e( 'New Tag', 'composer' ); ?><br />
						<span class="switch-light switch-candy" onclick="">
							<input type="checkbox" id="edit-menu-item-newtag-<?php echo esc_attr( $item_id ); ?>" name="menu-item-newtag[<?php echo esc_attr( $item_id ); ?>]" value='1'  <?php checked( 1, $item->newtag ); ?>>
							<span><span><?php esc_html_e('No','composer' ); ?></span><span><?php esc_html_e('Yes','composer' ); ?></span></span><a></a>
						</span>
	                </label>
	            </p>
				
				<?php /* for demo purpose
				<p class="field-imageurl description description-wide">
					<label for="edit-menu-item-imageurl-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'Image URL', 'composer' ); ?><br />
						<textarea id="edit-menu-item-imageurl-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-imageurl" rows="3" cols="20" name="menu-item-imageurl[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $item->imageurl ); // textarea_escaped ?></textarea>
						<span class="imageurl"><?php esc_html_e('The imageurl will be displayed in the menu if the current theme supports it.', 'composer' ); ?></span>
					</label>
				</p> */ ?>

	            <?php //Mega Menu Title ?>
	            <p class="pix-field-custom-megamenuchildtitle description description-wide">
	                <label for="edit-menu-item-megamenuchildtitle-<?php echo esc_attr( $item_id ); ?>">
	                    <?php esc_html_e( 'Display as Title', 'composer' ); ?><br />
						<span class="switch-light switch-candy" onclick="">
							<input type="checkbox" id="edit-menu-item-megamenuchildtitle-<?php echo esc_attr( $item_id ); ?>" name="menu-item-megamenuchildtitle[<?php echo esc_attr( $item_id ); ?>]" value='1'  <?php checked( 1, $item->megamenuchildtitle ); ?>>
							<span><span><?php esc_html_e('No','composer' ); ?></span><span><?php esc_html_e('Yes','composer' ); ?></span></span><a></a>
						</span>
	                </label>
	            </p>

	            <?php
	            /* New fields insertion ends here */
	            ?>

				<fieldset class="field-move hide-if-no-js description description-wide">
                    <span class="field-move-visual-label" aria-hidden="true"><?php esc_html_e( 'Move', 'composer' ); ?></span>
                    <button type="button" class="button-link menus-move menus-move-up" data-dir="up"><?php esc_html_e( 'Up one', 'composer' ); ?></button>
                    <button type="button" class="button-link menus-move menus-move-down" data-dir="down"><?php esc_html_e( 'Down one', 'composer' ); ?></button>
                    <button type="button" class="button-link menus-move menus-move-left" data-dir="left"></button>
                    <button type="button" class="button-link menus-move menus-move-right" data-dir="right"></button>
                    <button type="button" class="button-link menus-move menus-move-top" data-dir="top"><?php esc_html_e( 'To the top', 'composer' ); ?></button>
                </fieldset>

				<div class="menu-item-actions description-wide submitbox">
					<?php if ( 'custom' != $item->type && $original_title !== false ) : ?>
						<p class="link-to-original">
							<?php printf( __('Original: %s', 'composer' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
						</p>
					<?php endif; ?>
					<a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr( $item_id ); ?>" href="<?php
					echo wp_nonce_url(
						add_query_arg(
							array(
								'action' => 'delete-menu-item',
								'menu-item' => $item_id,
							),
							admin_url( 'nav-menus.php' )
						),
						'delete-menu_item_' . $item_id
					); ?>"><?php esc_html_e( 'Remove', 'composer' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr( $item_id ); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
						?>#menu-item-settings-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e('Cancel', 'composer'); ?></a>
				</div>

				<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item_id ); ?>" />
				<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
				<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
				<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
				<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
				<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
			</div><!-- .menu-item-settings-->
			<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
	}

} // Walker_Nav_Menu_Edit
