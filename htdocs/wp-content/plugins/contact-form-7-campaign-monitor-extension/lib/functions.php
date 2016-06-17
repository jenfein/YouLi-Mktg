<?php
/*  Copyright 2013-2016 Renzo Johnson (email: renzojohnson at gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

resetlogfile_cm();

function wpcf7_cm_add_campaignmonitor($args) {
	$cf7_cm_defaults = array();
	$cf7_cm = get_option( 'cf7_cm_'.$args->id(), $cf7_cm_defaults );

	$host = esc_url_raw( $_SERVER['HTTP_HOST'] );
	$url = $_SERVER['REQUEST_URI'];
	$urlactual = $url;
?>

<div class="metabox-holder">

	<h3><?php echo SPARTAN_CME_NAME . ' v' . SPARTAN_CME_VERSION ?></h3>

	<div class="cme-main-fields">

		<p class="mail-field">
			<label for="wpcf7-campaignmonitor-name"><?php echo esc_html( __( 'Subscriber Name:', 'wpcf7' ) ); ?>   <a href="<?php echo CME_URL ?>" class="helping-field" target="_blank" title="get help with Subscriber Name"> Help <span class="red-icon dashicons dashicons-sos"></span></a></label><br />
			<input type="text" id="wpcf7-campaignmonitor-name" name="wpcf7-campaignmonitor[name]" class="wide" size="70" placeholder="[your-name] <= Make sure this the name of your form field" value="<?php echo (isset ($cf7_cm['name'] ) ) ? esc_attr( $cf7_cm['name'] ) : '' ; ?>" />
		</p>

		<p class="mail-field">
			<label for="wpcf7-campaignmonitor-email"><?php echo esc_html( __( 'Subscriber Email:', 'wpcf7' ) ); ?>   <a href="<?php echo CME_URL ?>" class="helping-field" target="_blank" title="get help with Subscriber Email"> Help <span class="red-icon dashicons dashicons-sos"></span></a></label><br />
			<input type="text" id="wpcf7-campaignmonitor-email" name="wpcf7-campaignmonitor[email]" class="wide" size="70" placeholder="[your-email] <= Make sure this the name of your form field" value="<?php echo (isset ( $cf7_cm['email'] ) ) ? esc_attr( $cf7_cm['email'] ) : ''; ?>" />
		</p>


		<p class="mail-field">
			<label for="wpcf7-campaignmonitor-api"><?php echo esc_html( __( 'Client API Key:', 'wpcf7' ) ); ?>   <a href="<?php echo CME_URL ?>" class="helping-field" target="_blank" title="get help with Client API Key"> Help <span class="red-icon dashicons dashicons-sos"></span></a></label><br />
			<input type="text" id="wpcf7-campaignmonitor-api" name="wpcf7-campaignmonitor[api]" class="wide" size="70" placeholder="512a2673a8fc4e588499e82e2d43680d100a824e8ba55394" value="<?php echo (isset($cf7_cm['api']) ) ? esc_attr( $cf7_cm['api'] ) : ''; ?>" />
		</p>


		<p class="mail-field">
			<label for="wpcf7-campaignmonitor-list"><?php echo esc_html( __( 'API Subscriber List ID:', 'wpcf7' ) ); ?>   <a href="<?php echo CME_URL ?>" class="helping-field" target="_blank" title="get help with API Subscriber List ID"> Help <span class="red-icon dashicons dashicons-sos"></span></a></label><br />
			<input type="text" id="wpcf7-campaignmonitor-list" name="wpcf7-campaignmonitor[list]" class="wide" size="70" placeholder="aadc9ca0b08c83fbb714490354463186" value="<?php echo (isset( $cf7_cm['list']) ) ?  esc_attr( $cf7_cm['list']) : '' ; ?>" />
		</p>



<div class="cme-container cme-support" style="display:none">


    <p class="mail-field mt0">
      <label for="wpcf7-campaignmonitor-accept"><?php echo esc_html( __( 'Required Acceptance Field:', 'wpcf7' ) ); ?>   <a href="<?php echo CME_URL ?>" class="helping-field" target="_blank" title="get help with Required Acceptance Field"> Help <span class="red-icon dashicons dashicons-sos"></span></a></label><br />
      <input type="text" id="wpcf7-campaignmonitor-accept" name="wpcf7-campaignmonitor[accept]" class="wide" size="70" placeholder="[opt-in] <= Leave Empty if you are not using the checkbox or read the link above" value="<?php echo (isset ($cf7_cm['accept'] ) ) ? esc_attr( $cf7_cm['accept'] ) : '' ; ?>" />
    </p>


		<p class="mail-field">
			<input type="checkbox" id="wpcf7-campaignmonitor-resubscribeoption" name="wpcf7-campaignmonitor[resubscribeoption]" value="1"<?php echo ( isset($cf7_cm['resubscribeoption']) ) ? ' checked="checked"' : ''; ?> />
			<label for="wpcf7-campaignmonitor-resubscribeoption"><?php echo esc_html( __( 'Allow Users to Resubscribe after being Deleted or Unsubscribed? (checked = true)', 'wpcf7' ) ); ?>   <a href="<?php echo CME_URL ?>" class="helping-field" target="_blank" title="get help with Resubscribe after being Deleted"> Help <span class="red-icon dashicons dashicons-sos"></span></a></label>
		</p>


		<p class="mail-field">
			<input type="checkbox" id="wpcf7-campaignmonitor-cf-active" name="wpcf7-campaignmonitor[cfactive]" value="1"<?php echo ( isset($cf7_cm['cfactive']) ) ? ' checked="checked"' : ''; ?> />
			<label for="wpcf7-campaignmonitor-cfactive"><?php echo esc_html( __( 'Use Custom Fields', 'wpcf7' ) ); ?>   <a href="<?php echo CME_URL ?>" class="helping-field" target="_blank" title="get help with Custom Fields"> Help <span class="red-icon dashicons dashicons-sos"></span></a></label>
		</p>



	<div class="campaignmonitor-custom-fields">

		<?php for($i=1;$i<=13;$i++){ ?>

		<div class="col-6">
				<label for="wpcf7-campaignmonitor-CustomValue<?php echo $i; ?>"><?php echo esc_html( __( 'Contact form mail-tag '.$i.':', 'wpcf7' ) ); ?></label><br />
				<input type="text" id="wpcf7-campaignmonitor-CustomValue<?php echo $i; ?>" name="wpcf7-campaignmonitor[CustomValue<?php echo $i; ?>]" class="wide" size="70" placeholder="[your-mail-tag]" value="<?php echo (isset( $cf7_cm['CustomValue'.$i]) ) ?  esc_attr( $cf7_cm['CustomValue'.$i]) : '' ;  ?>" />
		</div>


		<div class="col-6">
			<label for="wpcf7-campaignmonitor-CustomKey<?php echo $i; ?>"><?php echo esc_html( __( 'Campaignmonitor Custom Field Name '.$i.':', 'wpcf7' ) ); ?></label><br />
			<input type="text" id="wpcf7-campaignmonitor-CustomKey<?php echo $i; ?>" name="wpcf7-campaignmonitor[CustomKey<?php echo $i; ?>]" class="wide" size="70" placeholder="example-field" value="<?php echo (isset( $cf7_cm['CustomKey'.$i]) ) ?  esc_attr( $cf7_cm['CustomKey'.$i]) : '' ;  ?>" />
		</div>

		<?php } ?>

	</div>



		<p class="mail-field">
			<input type="checkbox" id="wpcf7-campaignmonitor-cf-support" name="wpcf7-campaignmonitor[cf-supp]" value="1"<?php echo ( isset($cf7_cm['cf-supp']) ) ? ' checked="checked"' : ''; ?> />
			<label for="wpcf7-campaignmonitor-cfactive"><?php echo esc_html( __( 'Show Developer Backlink', 'wpcf7' ) ); ?> <small>( If checked, a backlink to our site will be shown in the footer. This is not compulsory, but always appreciated <span class="spartan-blue smiles">:)</span> )</small></label>
		</p>


</div>

    <table class="form-table mt0">
      <tbody>
        <tr>
          <th scope="row">Debug Logger</th>
          <td>
            <fieldset><legend class="screen-reader-text"><span>Debug Logger</span></legend><label for="wpcf7-mailchimp-cfactive">
            <input type="checkbox" id="wpcf7-campaignmonitor-logfileEnabled" name="wpcf7-campaignmonitor[logfileEnabled]" value="1"<?php echo ( isset( $cf7_cm['logfileEnabled'] ) ) ? ' checked="checked"' : ''; ?> />
            Enable to troubleshoot issues with the extension.</label>
            </fieldset>
            <p class="description s-small">- View debug log file by clicking <a href="<?php echo esc_textarea( SPARTAN_CME_PLUGIN_URL ). '/logs/log.txt'; ?>" target="_blank">here</a>. <br />- Reset debug log file by clicking <a href="<?php echo esc_textarea( $urlactual ). '&cme_reset_log=1'; ?>" target="_blank">here</a>.</p>
          </td>
        </tr>
      </tbody>
    </table>


    <p class="p-author"><a type="button" aria-expanded="false" class="cme-trigger a-support ">Show advanced settings</a></p>


    <div class="dev-cta">
      <p><span alt="f488" class="dashicons dashicons-megaphone red-icon"> </span> Hello. My name is Renzo Johnson, I <span alt="f487" class="dashicons dashicons-heart red-icon"> </span> WordPress and I develop this FREE plugin to help users like you. I drink copious amounts of coffee to keep me running longer <span alt="f487" class="dashicons dashicons-smiley red-icon"> </span>. If you've found this plugin useful, please consider making a donation.</p>
      <p>Would you like to <a class="button-primary" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NLNDA3PGPMPRN" target="_blank">buy me a coffee?</a></p>
      <!-- <p>I <span alt="f487" class="dashicons dashicons-heart red-icon"> </span> WordPress.</p> -->
    </div>


<!--   <div class="cme-container">

    <p class="p-author">This <a href="<?php echo CME_AUTH ?>" title="This FREE WordPress plugin" alt="This FREE WordPress plugin">FREE WordPress plugin</a> is currently developed in Orlando, Florida by <a href="<?php echo CME_AUTH ?>" target="_blank" title="Front End Developer: Renzo Johnson" alt="Front End Developer: Renzo Johnson">Renzo Johnson</a>. Feel free to contact with your comments or suggestions.</p>

  </div> -->

</div>

<?php

}


function resetlogfile_cm() {
	if ( isset( $_REQUEST['cme_reset_log'] ) ) {

		$cme_debug_logger = new cme_Debug_Logger();

		$cme_debug_logger->reset_cme_log_file( 'log.txt' );
		$cme_debug_logger->reset_cme_log_file( 'log-cron-job.txt' );
		echo '<div id="message" class="updated fade"><p>Debug log files have been reset!</p></div>';
	}
}

function wpcf7_cm_save_campaignmonitor($args) {

	if(!empty($_POST)){
		update_option( 'cf7_cm_'.$args->id(), $_POST['wpcf7-campaignmonitor'] );
	}
}
add_action( 'wpcf7_after_save', 'wpcf7_cm_save_campaignmonitor' );



function show_cm_metabox ( $panels ) {

	$new_page = array(
		'cme-Extension' => array(
			'title' => __( 'Cmpgn Monitor', 'contact-form-7' ),
			'callback' => 'wpcf7_cm_add_campaignmonitor'
		)
	);

	$panels = array_merge($panels, $new_page);

	return $panels;

}
add_filter( 'wpcf7_editor_panels', 'show_cm_metabox' );



function spartan_cme_author_wpcf7( $cme_supps, $class, $content, $args  ) {

	$cf7_cm_defaults = array();
	$cf7_cm = get_option( 'cf7_cm_'.$args->id(), $cf7_cm_defaults );
	// $cfsupp = $cf7_cm['cf-supp'];
  $cfsupp = ( isset( $cf7_cm['cf-supp'] ) ) ? $cf7_cm['cf-supp'] : 0;


  if ( 1 == $cfsupp ) {

	 	$cme_supps .= cme_referer();
	 	$cme_supps .= cme_author();

	 } else {
	 	$cme_supps .= cme_referer();
	 	$cme_supps .= CME_AUTH_COMM;
	 }

	return $cme_supps;

}
add_filter('wpcf7_form_response_output', 'spartan_cme_author_wpcf7', 40, 4);



function wpcf7_cm_subscribe($obj) {

	$cf7_cm = get_option( 'cf7_cm_'.$obj->id() );
	$submission = WPCF7_Submission::get_instance();

	$logfileEnabled = $cf7_cm['logfileEnabled'];
	$logfileEnabled = ( is_null( $logfileEnabled ) ) ? false : $logfileEnabled;

	if( $cf7_cm )
	{
		$subscribe = false;

		$regex = '/\[\s*([a-zA-Z_][0-9a-zA-Z:._-]*)\s*\]/';
		$callback = array( &$obj, 'cf7_cm_callback' );

		$email = cf7_cm_tag_replace( $regex, $cf7_cm['email'], $submission->get_posted_data() );
		$name = cf7_cm_tag_replace( $regex, $cf7_cm['name'], $submission->get_posted_data() );

		$lists = cf7_cm_tag_replace( $regex, $cf7_cm['list'], $submission->get_posted_data() );
		$listarr = explode(',',$lists);

		if( isset($cf7_cm['accept']) && strlen($cf7_cm['accept']) != 0 )
		{
			$accept = cf7_cm_tag_replace( $regex, $cf7_cm['accept'], $submission->get_posted_data() );
			if($accept != $cf7_cm['accept'])
			{
				if(strlen($accept) > 0)
					$subscribe = true;
			}
		}
		else
		{
			$subscribe = true;
		}

		for($i=1;$i<=20;$i++){

			if( isset($cf7_cm['CustomKey'.$i]) && isset($cf7_cm['CustomValue'.$i]) && strlen(trim($cf7_cm['CustomValue'.$i])) != 0 )
			{
				$CustomFields[] = array('Key'=>trim($cf7_cm['CustomKey'.$i]), 'Value'=>cf7_cm_tag_replace( $regex, trim($cf7_cm['CustomValue'.$i]), $submission->get_posted_data() ) );
			}

		}

		if( isset($cf7_cm['resubscribeoption']) && strlen($cf7_cm['resubscribeoption']) != 0 )
		{
			$ResubscribeOption = true;
		}
			else
		{
			$ResubscribeOption = false;
		}

		if($subscribe && $email != $cf7_cm['email'])
		{

			try {

				require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../api/csrest_subscribers.php');

				$wrap = new SPARTAN_CS_REST_Subscribers( trim($listarr[0]), $cf7_cm['api'] );
				foreach($listarr as $listid)
				{

					if( empty($CustomFields) ){
						$CustomFields = array();
					}

					$wrap->set_list_id(trim($listid));
					$result = $wrap->add(array(
						'EmailAddress' => $email,
						'Name' => $name,
						'CustomFields' => $CustomFields,
						'Resubscribe' => $ResubscribeOption
					));
				}

				// $resultsend = $result->response;
				// $resultfinal = $resultsend->Message;
				// $resultfinal = ( is_null( $resultfinal ) or trim( $resultfinal )==''   ) ? 'Email sent Ok' : $resultfinal;

				// $cme_debug_logger = new cme_Debug_Logger();
				// $cme_debug_logger->log_cme_debug( 'Email submission - Result: ' . $resultfinal ,1,$logfileEnabled );

			} catch (Exception $e) {
      		//echo 'Error, check your error log file for details';
		 		$cme_debug_logger = new cme_Debug_Logger();
				$cme_debug_logger->log_cme_debug( 'Email submission - Result: ' .$e->getMessage(),4,$logfileEnabled );
    		}

		}

	}
}
add_action( 'wpcf7_before_send_mail', 'wpcf7_cm_subscribe' );



function cf7_cm_tag_replace( $pattern, $subject, $posted_data, $html = false ) {
	if( preg_match($pattern,$subject,$matches) > 0)
	{

		if ( isset( $posted_data[$matches[1]] ) ) {
			$submitted = $posted_data[$matches[1]];

			if ( is_array( $submitted ) )
				$replaced = join( ', ', $submitted );
			else
				$replaced = $submitted;

			if ( $html ) {
				$replaced = strip_tags( $replaced );
				$replaced = wptexturize( $replaced );
			}

			$replaced = apply_filters( 'wpcf7_mail_tag_replaced', $replaced, $submitted );

			return stripslashes( $replaced );
		}

		if ( $special = apply_filters( 'wpcf7_special_mail_tags', '', $matches[1] ) )
			return $special;

		return $matches[0];
	}
	return $subject;
}



function cme_ext_author_form_class_attr( $class ) {

  $class .= ' cmonitor-ext-' . SPARTAN_CME_VERSION;
  return $class;

}
add_filter( 'wpcf7_form_class_attr', 'cme_ext_author_form_class_attr' );

