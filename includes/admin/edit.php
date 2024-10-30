<?php
/*
 * $postTypes
 * $configuration
 * $editURL
 */
?>

<div class="wrap">
	<h2><?php _e('Edit configuration:', 'justrows'); echo ' ', $configuration->getOption('name'); ?></h2>
	<form method="POST" action="<?php echo $editURL; ?>">

	<div class="jredit-well jredit-basic-info">

		<div class="jredit-field jredit-field-config-name">
			<label for="configurationNameInput"><?php _e('Configuration name:', 'justrows'); ?></label>
			<input id="configurationNameInput" name="config[name]" value="<?php echo $configuration->getOption('name'); ?>" />
		</div>

		<?php
		$slug = $configuration->getOption('slug');
        if ( !empty($slug) ) {
		?>
        	<div class="jredit-field jredit-field-config-shortcode">
            	<div class="shortcode-label"><?php _e('Configuration shortcode:', 'justrows'); ?></div>
				<div class="shortcode-input">[justrows slug="<?php echo $slug; ?>"]</div>
            </div>
		<?php
		}
		?>
	</div>

	<!-- Rows content -->
	<div class="jredit-well jredit-rows-content">
		<h3><?php echo __('Rows content'); ?></h3>

		<div class="jredit-field jredit-field-post-type">
			<label for="postTypeInput"><?php _e('Post type:', 'justrows'); ?></label>
			<select id="postTypeInput" name="config[postType]">
				<option value><?php _e('- Select -', 'justrows'); ?></option>
				<?php
					foreach($postTypes as $postType) {
						if ($postType == $configuration->getOption('postType'))
							echo '<option value="'.$postType.'" selected="selected">'.$postType.'</option>';
						else
							echo '<option value="'.$postType.'">'.$postType.'</option>';
					}
				?>
			</select>
		</div>

		<div class="jredit-field jredit-field-order-by">
			<label for="orderByInput"><?php _e('Order by:', 'justrows'); ?></label>
			<select id="orderByInput" name="config[orderBy]">
				<option value="date"<?php if ($configuration->getOption('orderBy') == 'date') echo ' selected="selected"'; ?>><?php _e('Date', 'justrows'); ?></option>
				<option value="modified"<?php if ($configuration->getOption('orderBy') == 'modified') echo ' selected="selected"'; ?>><?php _e('Last modified date', 'justrows'); ?></option>
				<option value="menu_order"<?php if ($configuration->getOption('orderBy') == 'menu_order') echo ' selected="selected"'; ?>><?php _e('Menu order', 'justrows'); ?></option>
				<option value="ID"<?php if ($configuration->getOption('orderBy') == 'ID') echo ' selected="selected"'; ?>><?php _e('ID', 'justrows'); ?></option>
				<option value="title"<?php if ($configuration->getOption('orderBy') == 'title') echo ' selected="selected"'; ?>><?php _e('Title', 'justrows'); ?></option>
				<option value="author"<?php if ($configuration->getOption('orderBy') == 'author') echo ' selected="selected"'; ?>><?php _e('Author', 'justrows'); ?></option>
				<option value="comment_count"<?php if ($configuration->getOption('orderBy') == 'comment_count') echo ' selected="selected"'; ?>><?php _e('Number of comments', 'justrows'); ?></option>
				<option value="parent"<?php if ($configuration->getOption('orderBy') == 'parent') echo ' selected="selected"'; ?>><?php _e('Parent', 'justrows'); ?></option>
				<option value="rand"<?php if ($configuration->getOption('orderBy') == 'rand') echo ' selected="selected"'; ?>><?php _e('Random', 'justrows'); ?></option>
				<option value="meta_value"<?php if ($configuration->getOption('orderBy') == 'meta_value') echo ' selected="selected"'; ?>><?php _e('Custom field (alphabetic)', 'justrows'); ?></option>
				<option value="meta_value_num"<?php if ($configuration->getOption('orderBy') == 'meta_value_num') echo ' selected="selected"'; ?>><?php _e('Custom field (numeric)', 'justrows'); ?></option>
			</select>
		</div>

		<div class="jredit-field jredit-field-order-by-field-name" style="display:none;">
			<label for="orderByFieldNameInput"><?php _e('Ordering field name:', 'justrows'); ?></label>
			<input id="orderByFieldNameInput" name="config[orderByFieldName]" value="<?php echo $configuration->getOption('orderByFieldName'); ?>"></input>
		</div>

		<div class="jredit-field jredit-field-order">
			<label for="orderInput"><?php _e('Order:', 'justrows'); ?></label>
			<select id="orderInput" name="config[order]">
				<option value="DESC" <?php if ('DESC' == $configuration->getOption('order')) echo 'selected="selected"'; ?>><?php _e('Descending', 'justrows'); ?></option>
				<option value="ASC" <?php if ('ASC' == $configuration->getOption('order')) echo 'selected="selected"'; ?>><?php _e('Ascending', 'justrows'); ?></option>
			</select>
		</div>

		<hr />

		<div class="jredit-field jredit-field-filter-by">
			<label for="filterByInput"><?php _e('Filter by:', 'justrows'); ?></label>
			<select id="filterByInput" name="config[filterBy]">
				<option value="none"<?php if ($configuration->getOption('filterBy') == 'none') echo ' selected="selected"'; ?>><?php _e('None', 'justrows'); ?></option>
				<option value="taxonomy"<?php if ($configuration->getOption('filterBy') == 'taxonomy') echo ' selected="selected"'; ?>><?php _e('Taxonomy', 'justrows'); ?></option>
			</select>
		</div>

		<div class="jredit-field jredit-field-taxonomy-name" style="display:none;">
			<label for="taxonomyNameInput"><?php _e('Taxonomy name:', 'justrows'); ?></label>
			<select id="taxonomyNameInput" name="config[taxonomyName]">
				<option id="blankTaxonomyOpt" value=""></option>
				<?php
					$taxonomyName = $configuration->getOption('taxonomyName');
					if (!empty($taxonomyName))
						echo '<option id="previousTaxonomyOpt" value="'.$taxonomyName.'" selected="selected">'.$taxonomyName.'</option>';

					foreach($postTypesTaxonomies as  $postType => $typeTaxonomies) {
						foreach($typeTaxonomies as  $taxonomy) {
							$selected = '';
							if ($taxonomy == $configuration->getOption('taxonomyName')) $selected = ' selected="selected"';
							echo '<option class="'. $postType. '" value="'.$taxonomy.'"'.$selected.'>'.$taxonomy.'</option>';
						}
					}
				?>
			</select>
		</div>

		<div class="jredit-field jredit-field-taxonomy-value" style="display:none;">
			<label for="taxonomyValueInput"><?php _e('Taxonomy match:', 'justrows'); ?></label>
			<input id="taxonomyValueInput" name="config[taxonomyValue]" value="<?php echo $configuration->getOption('taxonomyValue'); ?>"></input>
		</div>

		<hr />

		<div class="jredit-field jredit-field-posts-limit">
			<label for="postsLimitInput"><?php _e('Posts limit:', 'justrows'); ?></label>
			<input id="postsLimitInput" name="config[postsLimit]" value="<?php echo $configuration->getOption('postsLimit'); ?>" />
		</div>

		<div class="jredit-field jredit-field-append-method">
			<label for="appendMethodInput"><?php _e('Append method:', 'justrows'); ?></label>
			<select id="appendMethodInput" name="config[appendMethod]">
	            <option value="none" <?php if ('none' == $configuration->getOption('appendMethod')) echo 'selected="selected"'; ?>><?php _e('None', 'justrows'); ?></option>
				<option value="button" <?php if ('button' == $configuration->getOption('appendMethod')) echo 'selected="selected"'; ?>><?php _e('Button', 'justrows'); ?></option>
				<option value="infinite-scrolling" <?php if ('infinite-scrolling' == $configuration->getOption('appendMethod')) echo 'selected="selected"'; ?>><?php _e('Infinite scrolling', 'justrows'); ?></option>
			</select>
		</div>

		<div class="jredit-field jredit-field-infinite-scrolling-offset" style="display:none;">
			<label for="infiniteScrollingOffsetInput"><?php _e('Offset from bottom of page at which trigger the append:', 'justrows'); ?></label>
			<input id="infiniteScrollingOffsetInput" name="config[infiniteScrollingOffset]" value="<?php echo $configuration->getOption('infiniteScrollingOffset'); ?>" />
		</div>

		<hr />

		<div class="jredit-field jredit-field-caption-source">
			<label for="captionSourceInput"><?php _e('Caption source:', 'justrows'); ?></label>
			<select id="captionSourceInput" name="config[captionSource]">
				<option value="none" <?php if ($configuration->getOption('captionSource') == 'none') echo ' selected="selected"'; ?>><?php _e('No captions', 'justrows'); ?></option>
				<option value="image-descr"<?php if ($configuration->getOption('captionSource') == 'image-descr') echo ' selected="selected"'; ?>><?php _e('Featured image\'s description', 'justrows'); ?></option>
				<option value="custom-field"<?php if ($configuration->getOption('captionSource') == 'custom-field') echo ' selected="selected"'; ?>><?php _e('Custom field', 'justrows'); ?></option>
			</select>
		</div>

		<div class="jredit-field jredit-field-caption-field" style="display:none;">
			<label for="captionFieldInput"><?php _e('Caption field name:', 'justrows'); ?></label>
			<input id="captionFieldInput" name="config[captionField]" value="<?php echo $configuration->getOption('captionField'); ?>"></input>
		</div>

	</div><!-- end of rows content -->

	<!-- Rows style -->
	<div class="jredit-well jredit-rows-style">
		<h3><?php echo __('Rows style'); ?></h3>

		<div class="jredit-field jredit-field-layout">
			<label for="layoutInput"><?php _e('Layout:', 'justrows'); ?></label>
			<select id="layoutInput" name="config[layout]">
				<?php
					foreach($layouts as $layout) {
						$attrs = '';
						if ($layout['slug'] == $configuration->getOption('layout')) $attrs = ' selected="selected"';
						echo '<option value="'.$layout['slug'].'"'.$attrs.'>'.$layout['name'].'</option>';
					}
				?>
			</select>
		</div>

		<div class="jredit-field jredit-field-rows-thumb-size">
			<label for="rowsThumbSizeInput"><?php _e('Thumbnail size to use for rows:', 'justrows'); ?></label>
			<select id="rowsThumbSizeInput" name="config[rowsThumbSize]">
			<?php
				foreach(get_intermediate_image_sizes() as $thumbSize) {
				?>
					<option value="<?php echo $thumbSize; ?>" <?php if ($thumbSize == $configuration->getOption('rowsThumbSize')) echo 'selected="selected"'; ?>><?php echo $thumbSize; ?></option>
				<?php
				}
			?>
			</select>
		</div>

		<hr />

		<div class="jredit-field jredit-field-animation">
			<label for="animationInput"><?php _e('Images animate-in:', 'justrows'); ?></label>
			<select id="animationInput" name="config[animation]">
				<option value="false<?php if ('false' == $configuration->getOption('animation')) echo 'selected="selected"'; ?>"><?php _e('None', 'justrows'); ?></option>
				<option value="fade"<?php if ('fade' == $configuration->getOption('animation')) echo 'selected="selected"'; ?>><?php _e('Fade', 'justrows'); ?></option>
			</select>
		</div>

		<div class="jredit-field jredit-field-animation-duration">
			<label for="animationDurationInput"><?php _e('Images animate-in duration:', 'justrows'); ?></label>
			<input id="animationDurationInput" name="config[animationDuration]" value="<?php echo $configuration->getOption('animationDuration'); ?>" />
		</div>

	</div><!-- end of rows style -->

	<!-- Row images destination -->
	<div class="jredit-well jredit-row-images-destination">
		<h3><?php echo __('Row images destination'); ?></h3>

		<div class="jredit-field jredit-field-destination-url">
			<label for="destinationUrlInput"><?php _e('Destination url:', 'justrows'); ?></label>
			<select id="destinationUrlInput" name="config[destinationUrl]">
				<option value="post" <?php if ($configuration->getOption('destinationUrl') == 'post') echo ' selected="selected"'; ?>><?php _e('Post', 'justrows'); ?></option>
				<option value="featured-img" <?php if ($configuration->getOption('destinationUrl') == 'featured-img') echo ' selected="selected"'; ?>><?php _e('Featured image', 'justrows'); ?></option>
				<option value="custom-field" <?php if ($configuration->getOption('destinationUrl') == 'custom-field') echo ' selected="selected"'; ?>><?php _e('Custom field', 'justrows'); ?></option>
			</select>
		</div>

		<div class="jredit-field jredit-field-destination-url-field" style="display:none;">
			<label for="destinationUrlFieldInput"><?php _e('Destination url custom field name:', 'justrows'); ?></label>
			<input id="destinationUrlFieldInput" name="config[destinationUrlField]" value="<?php echo $configuration->getOption('destinationUrlField'); ?>" />
		</div>

		<div class="jredit-field jredit-field-destination-new-tab">
			<label for="destinationNewTabInput"><?php _e('Open in new tab:', 'justrows'); ?></label>
			<input id="destinationNewTabInput" name="config[destinationNewTab]" type="checkbox" value="1" <?php if (true == $configuration->getOption('destinationNewTab')) echo 'checked="checked" '; ?>/>
		</div>

	</div><!-- end of rows style -->

	<!-- No javascript fallback -->
	<div class="jredit-well jredit-no-js-fallback">
		<h3><?php echo __('No javascript fallback'); ?></h3>

		<div class="jredit-field jredit-field-no-js">
			<label for="noJsInput"><?php _e('No Javascript content:', 'justrows'); ?></label>
			<textarea id="noJsInput" name="config[noJs]"><?php echo $configuration->getOption('noJs'); ?></textarea>
		</div>

	</div><!-- end of no javascript fallback -->

	<input type="hidden" name="update_settings" value="Y" />
	<input class="jredit-submit button button-primary" name="save" value="<?php _e('Save', 'justrows'); ?>" type="submit">

	</form>
</div>
