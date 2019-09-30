<div class="wrap">
   	<form method="POST" action="<?php echo admin_url('admin.php'); ?>">
   		<nav class="nav-tab-wrapper acsms-nav">
			<a href="<?php echo admin_url(sprintf("admin.php?page=%s-settings", $prefix)) ?>" class="nav-tab nav-tab-active">General</a>
			<a href="#" class="nav-tab"><?php _e("Advanced Settings", 'the-plugin-name') ?></a>
		</nav>

		<?php if($updated): ?>
		<div class="updated notice inline">
		   	<p><?php _e("Your settings has been updated, awesome!", 'the-plugin-name') ?></p>
		</div>
		<?php endif ?>

		<h2><?php _e("General Settings", 'the-plugin-name') ?></h2>
		<div class="acsms-tab-description"><?php _e("General settings for this LittleBizzy plugin", 'the-plugin-name') ?></div>

       	<!-- key for admin_action -->
       	<input type="hidden" name="action" value="<?php printf("%s_save_settings", $prefix) ?>" />

       	<!-- nonce -->
       	<?php wp_nonce_field( 'save-plugin-settings' ); ?>

       	<!-- your form -->
       	<table class="form-table">
           	<tr>
				<th scope="row">
				   	<label for="my-text-field"><?php _e("First Option", 'the-plugin-name') ?></label>
				</th>
				<td>
				   	<input type="text" value="<?php echo $data['first_option'] ?>" name="first_option">
				   	<br><span class="description"><?php _e("Description of the first option", 'the-plugin-name') ?></span>
				</td>
            </tr>
			<tr>
				<th scope="row">
				   	<label for="my-text-field"><?php _e("Second Option", 'the-plugin-name') ?></label>
				</th>
				<td>
				   	<input type="text" value="<?php echo $data['second_option'] ?>" name="second_option">
				   	<br><span class="description"><?php _e("Another option description's goes here", 'the-plugin-name') ?></span>
				</td>
            </tr>
       	</table>

       	<p class="submit">
       		<input type="submit" name="setting-general" value="<?php _e("Save Settings", 'the-plugin-name') ?>" class="button button-primary" />
		</p>
   	</form>
</div>