<?php $options = get_option( 'campaign_monitor_settings' ); ?>
<input type='text' name='campaign_monitor_settings[api_key]' value='<?php echo CampaignMonitorPluginInstance()->get_option('api_key'); ?>'>