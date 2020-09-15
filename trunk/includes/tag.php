<?php

add_action('wpcf7_admin_init', 'wpcf7_add_tag_generator_intl_tel', 15);

function wpcf7_add_tag_generator_intl_tel()
{
	$tag_generator = WPCF7_TagGenerator::get_instance();
	$tag_generator->add('intl_tel', __('International Telephone', 'international-telephone-input-for-contact-form-7'), 'wpcf7_tag_generator_intl_tel');
}

function wpcf7_tag_generator_intl_tel($contact_form, $args = '')
{
	$args = wp_parse_args($args, array());
	$type = $args['id'];

	$description = __('Generate a input field for enter international telephone number with a flag dropdown.', 'international-telephone-input-for-contact-form-7');

?>
	<div class="control-box">
		<fieldset>
			<legend><?php echo esc_html($description); ?></legend>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><?php echo esc_html(__('Field type', 'international-telephone-input-for-contact-form-7')); ?></th>
						<td>
							<fieldset>
								<legend class="screen-reader-text"><?php echo esc_html(__('Field type', 'international-telephone-input-for-contact-form-7')); ?></legend>
								<label><input type="checkbox" name="required" /> <?php echo esc_html(__('Required field', 'international-telephone-input-for-contact-form-7')); ?></label>
							</fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="<?php echo esc_attr($args['content'] . '-name'); ?>"><?php echo esc_html(__('Name', 'international-telephone-input-for-contact-form-7')); ?></label></th>
						<td><input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr($args['content'] . '-name'); ?>" /></td>
					</tr>

					<tr>
						<th scope="row"><label for="<?php echo esc_attr($args['content'] . '-id'); ?>"><?php echo esc_html(__('ID attribute', 'international-telephone-input-for-contact-form-7')); ?></label></th>
						<td><input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr($args['content'] . '-id'); ?>" /></td>
					</tr>

					<tr>
						<th scope="row"><label for="<?php echo esc_attr($args['content'] . '-class'); ?>"><?php echo esc_html(__('Class attribute', 'international-telephone-input-for-contact-form-7')); ?></label></th>
						<td><input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr($args['content'] . '-class'); ?>" /></td>
					</tr>

					<tr>
						<th scope="row"><label for="<?php echo esc_attr($args['content'] . '-size'); ?>"><?php echo esc_html(__('Field width in px (optional)', 'international-telephone-input-for-contact-form-7')); ?></label></th>
						<td><input type="text" name="size" class="sizevalue oneline option" id="<?php echo esc_attr($args['content'] . '-size'); ?>" /></td>
					</tr>

					<tr>
						<th scope="row"><label for="<?php echo esc_attr($args['content'] . '-values'); ?>"><?php echo esc_html(__('Default value', 'contact-form-7')); ?></label></th>
						<td><input type="text" name="values" class="oneline" id="<?php echo esc_attr($args['content'] . '-values'); ?>" /><br />
							<p class="description"><label><input type="checkbox" name="placeholder" class="option" /><?php echo esc_html(__('Use this text as the placeholder of the field.', 'contact-form-7')); ?><br><?php echo esc_html(__('This will override the dynamic international telephone placeholders for all country. It will only display the input you enter here.', 'contact-form-7')); ?></label></p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="<?php echo esc_attr($args['content'] . '-initialCountry'); ?>"><?php echo esc_html(__('Initial Country', 'international-telephone-input-for-contact-form-7')); ?></label></th>
						<td>
							<input type="text" name="initialCountry" class="initialCountryvalue oneline option" id="<?php echo esc_attr($args['content'] . '-initialCountry'); ?>" placeholder="<?php /* translators: 1. Two-letter country codes placeholder */ _e('e.g. us', 'international-telephone-input-for-contact-form-7'); ?>" maxlength="2" />
							<p class="description"><?php _e('Add a two-letters country code. When this option is set, the IP lookup feature will be disabled. Leave blank if you want to use the IP lookup feature.', 'international-telephone-input-for-contact-form-7') ?></p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="<?php echo esc_attr($args['content'] . '-preferredCountries'); ?>"><?php echo esc_html(__('Preferred Countries', 'international-telephone-input-for-contact-form-7')); ?></label></th>
						<td>
							<input type="text" name="preferredCountries" class="preferredCountriesvalue oneline option" id="<?php echo esc_attr($args['content'] . '-preferredCountries'); ?>" placeholder="<?php /* translators: 1. Two-letter country codes placeholder */ _e('e.g. gb-us', 'international-telephone-input-for-contact-form-7'); ?>" />
							<p class="description"><?php _e('The countries entered here will be moved at the top of the country dropdown list. Use two-letters country codes separated by hyphen.', 'international-telephone-input-for-contact-form-7') ?></p>
						</td>
					</tr>

				</tbody>
			</table>
		</fieldset>
	</div>

	<div class="insert-box">
		<input type="text" name="<?php echo $type; ?>" class="tag code" readonly="readonly" onfocus="this.select()" />

		<div class="submitbox">
			<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr(__('Insert Tag', 'international-telephone-input-for-contact-form-7')); ?>" />
		</div>

		<br class="clear" />
	</div>
<?php
}

?>