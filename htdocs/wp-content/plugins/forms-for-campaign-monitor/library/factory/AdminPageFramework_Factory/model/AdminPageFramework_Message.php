<?php
/**
 Admin Page Framework v3.5.12 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/campaign-monitor>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class CampaignMonitor_AdminPageFramework_Message {
    public $aMessages = array();
    public $aDefaults = array('option_updated' => 'The options have been updated.', 'option_cleared' => 'The options have been cleared.', 'export' => 'Export', 'export_options' => 'Export Options', 'import_options' => 'Import', 'import_options' => 'Import Options', 'submit' => 'Submit', 'import_error' => 'An error occurred while uploading the import file.', 'uploaded_file_type_not_supported' => 'The uploaded file type is not supported: %1$s', 'could_not_load_importing_data' => 'Could not load the importing data.', 'imported_data' => 'The uploaded file has been imported.', 'not_imported_data' => 'No data could be imported.', 'upload_image' => 'Upload Image', 'use_this_image' => 'Use This Image', 'insert_from_url' => 'Insert from URL', 'reset_options' => 'Are you sure you want to reset the options?', 'confirm_perform_task' => 'Please confirm your action.', 'specified_option_been_deleted' => 'The specified options have been deleted.', 'nonce_verification_failed' => 'A problem occurred while processing the form data. Please try again.', 'check_max_input_vars' => 'Not all form fields could not be sent. Please check your server settings of PHP <code>max_input_vars</code> and consult the server administrator to increase the value. <code>max input vars</code>: %1$s. <code>$_POST</code> count: %2$s', 'send_email' => 'Is it okay to send the email?', 'email_sent' => 'The email has been sent.', 'email_scheduled' => 'The email has been scheduled.', 'email_could_not_send' => 'There was a problem sending the email', 'title' => 'Title', 'author' => 'Author', 'categories' => 'Categories', 'tags' => 'Tags', 'comments' => 'Comments', 'date' => 'Date', 'show_all' => 'Show All', 'show_all_authors' => 'Show all Authors', 'powered_by' => 'Powered by', 'settings' => 'Settings', 'manage' => 'Manage', 'select_image' => 'Select Image', 'upload_file' => 'Upload File', 'use_this_file' => 'Use This File', 'select_file' => 'Select File', 'remove_value' => 'Remove Value', 'select_all' => 'Select All', 'select_none' => 'Select None', 'no_term_found' => 'No term found.', 'select' => 'Select', 'insert' => 'Insert', 'use_this' => 'Use This', 'return_to_library' => 'Return to Library', 'queries_in_seconds' => '%1$s queries in %2$s seconds.', 'out_of_x_memory_used' => '%1$s out of %2$s MB (%3$s) memory used.', 'peak_memory_usage' => 'Peak memory usage %1$s MB.', 'initial_memory_usage' => 'Initial memory usage  %1$s MB.', 'allowed_maximum_number_of_fields' => 'The allowed maximum number of fields is {0}.', 'allowed_minimum_number_of_fields' => 'The allowed minimum number of fields is {0}.', 'add' => 'Add', 'remove' => 'Remove', 'allowed_maximum_number_of_sections' => 'The allowed maximum number of sections is {0}', 'allowed_minimum_number_of_sections' => 'The allowed minimum number of sections is {0}', 'add_section' => 'Add Section', 'remove_section' => 'Remove Section', 'toggle_all' => 'Toggle All', 'toggle_all_collapsible_sections' => 'Toggle all collapsible sections', 'reset' => 'Reset', 'yes' => 'Yes', 'no' => 'No', 'on' => 'On', 'off' => 'Off', 'enabled' => 'Enabled', 'disabled' => 'Disabled', 'supported' => 'Supported', 'not_supported' => 'Not Supported', 'functional' => 'Functional', 'not_functional' => 'Not Functional', 'too_long' => 'Too Long', 'acceptable' => 'Acceptable', 'no_log_found' => 'No log found.',);
    protected $_sTextDomain = 'campaign-monitor';
    static private $_aInstancesByTextDomain = array();
    public static function getInstance($sTextDomain = 'campaign-monitor') {
        $_oInstance = isset(self::$_aInstancesByTextDomain[$sTextDomain]) && (self::$_aInstancesByTextDomain[$sTextDomain] instanceof CampaignMonitor_AdminPageFramework_Message) ? self::$_aInstancesByTextDomain[$sTextDomain] : new CampaignMonitor_AdminPageFramework_Message($sTextDomain);
        self::$_aInstancesByTextDomain[$sTextDomain] = $_oInstance;
        return self::$_aInstancesByTextDomain[$sTextDomain];
    }
    public static function instantiate($sTextDomain = 'campaign-monitor') {
        return self::getInstance($sTextDomain);
    }
    public function __construct($sTextDomain = 'campaign-monitor') {
        $this->_sTextDomain = $sTextDomain;
        $this->aMessages = array_fill_keys(array_keys($this->aDefaults), null);
    }
    public function getTextDomain() {
        return $this->_sTextDomain;
    }
    public function get($sKey) {
        return isset($this->aMessages[$sKey]) ? __($this->aMessages[$sKey], $this->_sTextDomain) : __($this->{$sKey}, $this->_sTextDomain);
    }
    public function output($sKey) {
        echo $this->get($sKey);
    }
    public function __($sKey) {
        return $this->get($sKey);
    }
    public function _e($sKey) {
        $this->output($sKey);
    }
    public function __get($sPropertyName) {
        return isset($this->aDefaults[$sPropertyName]) ? $this->aDefaults[$sPropertyName] : $sPropertyName;
    }
    private function __doDummy() {
        __('The options have been updated.', 'campaign-monitor');
        __('The options have been cleared.', 'campaign-monitor');
        __('Export', 'campaign-monitor');
        __('Export Options', 'campaign-monitor');
        __('Import', 'campaign-monitor');
        __('Import Options', 'campaign-monitor');
        __('Submit', 'campaign-monitor');
        __('An error occurred while uploading the import file.', 'campaign-monitor');
        __('The uploaded file type is not supported: %1$s', 'campaign-monitor');
        __('Could not load the importing data.', 'campaign-monitor');
        __('The uploaded file has been imported.', 'campaign-monitor');
        __('No data could be imported.', 'campaign-monitor');
        __('Upload Image', 'campaign-monitor');
        __('Use This Image', 'campaign-monitor');
        __('Insert from URL', 'campaign-monitor');
        __('Are you sure you want to reset the options?', 'campaign-monitor');
        __('Please confirm your action.', 'campaign-monitor');
        __('The specified options have been deleted.', 'campaign-monitor');
        __('A problem occurred while processing the form data. Please try again.', 'campaign-monitor');
        __('Not all form fields could not be sent. Please check your server settings of PHP <code>max_input_vars</code> and consult the server administrator to increase the value. <code>max input vars</code>: %1$s. <code>$_POST</code> count: %2$s', 'campaign-monitor');
        __('Is it okay to send the email?', 'campaign-monitor');
        __('The email has been sent.', 'campaign-monitor');
        __('The email has been scheduled.', 'campaign-monitor');
        __('There was a problem sending the email', 'campaign-monitor');
        __('Title', 'campaign-monitor');
        __('Author', 'campaign-monitor');
        __('Categories', 'campaign-monitor');
        __('Tags', 'campaign-monitor');
        __('Comments', 'campaign-monitor');
        __('Date', 'campaign-monitor');
        __('Show All', 'campaign-monitor');
        __('Show All Authors', 'campaign-monitor');
        __('Powered by', 'campaign-monitor');
        __('Settings', 'campaign-monitor');
        __('Manage', 'campaign-monitor');
        __('Select Image', 'campaign-monitor');
        __('Upload File', 'campaign-monitor');
        __('Use This File', 'campaign-monitor');
        __('Select File', 'campaign-monitor');
        __('Remove Value', 'campaign-monitor');
        __('Select All', 'campaign-monitor');
        __('Select None', 'campaign-monitor');
        __('No term found.', 'campaign-monitor');
        __('Select', 'campaign-monitor');
        __('Insert', 'campaign-monitor');
        __('Use This', 'campaign-monitor');
        __('Return to Library', 'campaign-monitor');
        __('%1$s queries in %2$s seconds.', 'campaign-monitor');
        __('%1$s out of %2$s MB (%3$s) memory used.', 'campaign-monitor');
        __('Peak memory usage %1$s MB.', 'campaign-monitor');
        __('Initial memory usage  %1$s MB.', 'campaign-monitor');
        __('The allowed maximum number of fields is {0}.', 'campaign-monitor');
        __('The allowed minimum number of fields is {0}.', 'campaign-monitor');
        __('Add', 'campaign-monitor');
        __('Remove', 'campaign-monitor');
        __('The allowed maximum number of sections is {0}', 'campaign-monitor');
        __('The allowed minimum number of sections is {0}', 'campaign-monitor');
        __('Add Section', 'campaign-monitor');
        __('Remove Section', 'campaign-monitor');
        __('Toggle All', 'campaign-monitor');
        __('Toggle all collapsible sections', 'campaign-monitor');
        __('Reset', 'campaign-monitor');
        __('Yes', 'campaign-monitor');
        __('No', 'campaign-monitor');
        __('On', 'campaign-monitor');
        __('Off', 'campaign-monitor');
        __('Enabled', 'campaign-monitor');
        __('Disabled', 'campaign-monitor');
        __('Supported', 'campaign-monitor');
        __('Not Supported', 'campaign-monitor');
        __('Functional', 'campaign-monitor');
        __('Not Functional', 'campaign-monitor');
        __('Too Long', 'campaign-monitor');
        __('Acceptable', 'campaign-monitor');
        __('No log found.', 'campaign-monitor');
    }
}