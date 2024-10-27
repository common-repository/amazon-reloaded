<?php 
// get settings
//$settings = $this->getSettings(); 
?>
<p class="hide-if-js">
  <?php _e('The Amazon Reloaded for WordPress plugin requires JavaScript to work correctly.  Enable JavaScript if you wish to use the plugin.'); ?>
</p>
<div class="hide-if-no-js">
  <table class="form-table">
    <tbody>
      <tr>
        <th scope="row"><label for="arfw-terms">
            <?php _e( 'Search Keywords' ); ?>
          </label>
          <img alt="" title="" id="arfw-status" class="ajax-feedback " src="images/wpspin_light.gif" /></th>
        <td><input type="text" class="regular-text" name="arfw-terms" id="arfw-terms" value="" />
          <input class="button-primary" type="submit" name="arfw-search" id="arfw-search" value="<?php _e('Search Amazon'); ?>" /></td>
      </tr>
      <tr>
        <th scope="row"><label for="arfw-index">
            <?php _e( 'Search Index' ); ?>
          </label></th>
        <td><select name="arfw-index" id="arfw-index" disabled="disabled">
            <option selected="selected" value="Blended">Blended</option>
            <option value="Apparel">Apparel</option>
            <option value="Automotive">Automotive</option>
            <option value="Baby">Baby</option>
            <option value="Beauty">Beauty</option>
            <option value="Books">Books</option>
            <option value="Classical">Classical</option>
            <option value="DigitalMusic">DigitalMusic</option>
            <option value="DVD">DVD</option>
            <option value="Electronics">Electronics</option>
            <option value="ForeignBooks">ForeignBooks</option>
            <option value="GourmetFood">GourmetFood</option>
            <option value="Grocery">Grocery</option>
            <option value="HealthPersonalCare">HealthPersonalCare</option>
            <option value="Hobbies">Hobbies</option>
            <option value="HomeGarden">HomeGarden</option>
            <option value="HomeImprovement">HomeImprovement</option>
            <option value="Industrial">Industrial</option>
            <option value="Jewelry">Jewelry</option>
            <option value="KindleStore">KindleStore</option>
            <option value="Kitchen">Kitchen</option>
            <option value="Magazines">Magazines</option>
            <option value="Merchants">Merchants</option>
            <option value="Miscellaneous">Miscellaneous</option>
            <option value="MP3Downloads">MP3Downloads</option>
            <option value="Music">Music</option>
            <option value="MusicalInstruments">MusicalInstruments</option>
            <option value="MusicTracks">MusicTracks</option>
            <option value="OfficeProducts">OfficeProducts</option>
            <option value="OutdoorLiving">OutdoorLiving</option>
            <option value="PCHardware">PCHardware</option>
            <option value="PetSupplies">PetSupplies</option>
            <option value="Photo">Photo</option>
            <option value="Shoes">Shoes</option>
            <option value="SilverMerchant">SilverMerchant</option>
            <option value="Software">Software</option>
            <option value="SoftwareVideoGames">SoftwareVideoGames</option>
            <option value="SportingGoods">SportingGoods</option>
            <option value="Tools">Tools</option>
            <option value="Toys">Toys</option>
            <option value="VHS">VHS</option>
            <option value="Video">Video</option>
            <option value="VideoGames">VideoGames</option>
            <option value="Watches">Watches</option>
            <option value="Wireless">Wireless</option>
            <option value="WirelessAccessories">WirelessAccessories</option>
          </select></td>
      </tr>
    </tbody>
  </table>
  <div id="arfw-error" class="hide-if-js">
    <p>
      <?php _e( 'Unfortunately, an error occurred.  Please try again.' ); ?>
    </p>
  </div>
  <div id="arfw-results" class="hide-if-js">
    <table class="widefat">
      <thead>
        <tr>
          <th scope="col"><?php _e( 'Image' ); ?></th>
          <th scope="col"><?php _e( 'ASIN' ); ?></th>
          <th scope="col"><?php _e( 'Name' ); ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th scope="col"><?php _e( 'Image' ); ?></th>
          <th scope="col"><?php _e( 'ASIN' ); ?></th>
          <th scope="col"><?php _e( 'Name' ); ?></th>
        </tr>
      </tfoot>
      <tbody>
        <tr id="arfw-result-template">
          <td><p> <img src="%IMG_SRC%" alt="%NAME%" /> </p>
            <form>
              <p>
                <select name="arfw-add-image" class="arfw-add-image">
                  <option value="%IMG_SRC%">
                  <?php _e( 'Small' ); ?>
                  </option>
                  <option value="%IMG_SRC_MED%">
                  <?php _e( 'Medium' ); ?>
                  </option>
                  <option value="%IMG_SRC_LRG%">
                  <?php _e( 'Large' ); ?>
                  </option>
                </select>
                <label>
                  <input type="checkbox" class="add-link" name="add-link" value="1" />
                  <?php _e( 'Link Image' ); ?>
                </label>
                <br />
                <br />
                <a href="%DETAIL_PAGE_URL%" class="button arfw-add-image-insert">
                <?php _e( 'Send Image to Editor' ); ?>
                </a> </p>
            </form></td>
          <td> %ASIN% </td>
          <td><a target="_blank" class="arfw-product-link" href="%DETAIL_PAGE_URL%">%NAME%</a> <a href="%DETAIL_PAGE_URL%" class="arfw-product-insert-link button">
            <?php _e( 'Send Link to Editor' ); ?>
            </a>
            </p></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>