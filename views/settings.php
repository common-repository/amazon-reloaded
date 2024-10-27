<?php 
// get settings
$settings = $this->getSettings(); 
?>
<div class="wrap">
  <?php screen_icon(); ?>
  <h2>
    <?php _e( 'Amazon Reloaded for WordPress Settings' ); ?>
  </h2>
  <form method="post">
    <?php 
	// when is not empty
	if( !empty( $settings[ 'amazon-secret-key' ] ) ) { 
	?>
    <h3>
      <?php _e( 'Test Your Credentials' ); ?>
    </h3>
    <p>
      <?php _e( 'Click the following button to test the credentials you have supplied.  Make sure you save your credentials first.' ); ?>
    </p>
    <p class="submit">
      <input type="submit" class="button-primary" name="test-arfw-settings" id="test-arfw-settings" value="<?php _e( 'Save and Test Credentials' ); ?>" />
      <?php wp_nonce_field( 'test-arfw-settings', '_wpnonce2' ); ?>
    </p>
    <?php } ?>
    <h3>
      <?php _e( 'Amazon API Settings' ); ?>
    </h3>
    <p><?php printf( __( 'In order for this plugin to work properly, you must setup your Amazon Web Services secret and API key.  If you do not currently have these keys, you need to visit <a href="%1$s">Amazon Web Services</a> and create one.' ), 'https://aws-portal.amazon.com/gp/aws/developer/account/index.html?action=access-key' ); ?></p>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row"><label for="amazon-api-key">
              <?php _e( 'Amazon API Key (Access Key ID)' ); ?>
            </label></th>
          <td><input type="text" class="regular-text" name="amazon-api-key" id="amazon-api-key" value="<?php echo esc_attr( $settings[ 'amazon-api-key' ] );  ?>" /></td>
        </tr>
        <tr>
          <th scope="row"><label for="amazon-secret-key">
              <?php _e( 'Amazon Secret Key' ); ?>
            </label></th>
          <td><input type="text" class="regular-text" name="amazon-secret-key" id="amazon-secret-key" value="<?php echo esc_attr( $settings[ 'amazon-secret-key' ] ); ?>" /></td>
        </tr>
      </tbody>
    </table>
    <h3>
      <?php _e( 'Associates Settings' ); ?>
    </h3>
    <p>
      <?php _e( 'Use these settings to customize the search results returned from Amazon using this plugin.' ); ?>
    </p>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row"><label for="amazon-associates-id">
              <?php _e( 'Amazon Associates ID' ); ?>
            </label></th>
          <td><input type="text" class="regular-text" name="amazon-associates-id" id="amazon-associates-id" value="<?php echo esc_attr( $settings[ 'amazon-associates-id' ] ); ?>" />
            <br />
            <?php printf( __( 'If you do not have an Amazon associaties ID and want to earn affiliate commissions from links posted on your site, visit the <a href="%1$s">Amazon Affiliate Program</a> page and sign up for an account.' ), 'https://affiliate-program.amazon.com/gp/advertising/api/detail/main.html' ); ?></td>
        </tr>
        <tr>
          <th scope="row"><label for="amazon-locale">
              <?php _e( 'Locale' ); ?>
            </label></th>
          <td><select name="amazon-locale" id="amazon-locale">
              <option <?php selected( $settings[ 'amazon-locale' ], 'com' ); ?> value="com">
              <?php _e( 'United States' ); ?>
              </option>
              <option <?php selected( $settings[ 'amazon-locale' ], 'co.uk' ); ?> value="co.uk">
              <?php _e( 'United Kingdom' ); ?>
              </option>
              <option <?php selected( $settings[ 'amazon-locale' ], 'ca' ); ?> value="ca">
              <?php _e( 'Canada' ); ?>
              </option>
              <option <?php selected( $settings[ 'amazon-locale' ], 'de' ); ?> value="de">
              <?php _e( 'Germany' ); ?>
              </option>
              <option <?php selected( $settings[ 'amazon-locale' ], 'fr' ); ?> value="fr">
              <?php _e( 'France' ); ?>
              </option>
              <option <?php selected( $settings[ 'amazon-locale' ], 'jp' ); ?> value="jp">
              <?php _e( 'Japan' ); ?>
              </option>
            </select></td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
      <input type="submit" class="button-primary" name="save-arfw-settings" id="save-arfw-settings" value="<?php _e( 'Save Settings' ); ?>" />
      <?php wp_nonce_field( 'save-arfw-settings' ); ?>
    </p>
  </form>
</div>

<?
if ( isset($_GET['credentials-success']) ||  isset($_GET['credentials-failure'])) { 
	// check if credentials are saved
	if( $_GET['credentials-success'] ) {
	?>
	<div id="amazon-credentials-success-message" class="updated fade">
	  <p>
		<?php _e( '<strong>Your credentials are correct!</strong>  You should have no problem searching for products.' ); ?>
	  </p>
	</div>
	<?php
	} else if( $_GET[ 'credentials-failure' ] == 1 ) {
		?>
	<div id="amazon-credentials-failure-message" class="error">
	  <p>
		<?php _e( 'Your credentials seem to be incorrect.  Please check them and try again.' ); ?>
	  </p>
	</div>
	<?php
	}
}
?>