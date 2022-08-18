<?php
/**
 * @package  SsbCodeBlockTheme
 */

namespace Inc\Settings;

class Settings{
    
    private $ssbcodeOption;

	public function register() {
        add_action( 'admin_menu', array( $this, 'ssbcodeAddPluginPage' ) );
        add_action( 'admin_init', array( $this, 'ssbCodePageInit' ) );
    }

    public function ssbcodeAddPluginPage() {
        add_options_page(
            'SSBCode Blocks Theme', // page_title
            'SSBCode Blocks Theme', // menu_title
            'manage_options', // capability
            'ssbcode-blocks', // menu_slug
            array( $this, 'ssbcodeCreateAdminPage' ) // function
        );
    }

    public function ssbcodeCreateAdminPage() {
        $this->ssbcodeOption = get_option( 'ssbcodeOptionName' ); ?>

        <div class="wrap">
            <h2>Settings - SSBCode Blocks Theme</h2>


            <form method="post" action="options.php">
                <?php
                    settings_fields( 'ssbcodeOptionGroup' );
                    do_settings_sections( 'ssbcodeAdmin' );
                    submit_button();
                ?>
            </form>
        </div>
    <?php }

    public function ssbCodePageInit() {
        register_setting(
            'ssbcodeOptionGroup', // option_group
            'ssbcodeOptionName', // option_name
            array( $this, 'ssbcodeSanitize' ) // sanitize_callback
        );

        add_settings_section(
            'ssbcodeSettingsSection', // id
            'Settings', // title
            array( $this, 'ssbcodeSectionInfo' ), // callback
            'ssbcodeAdmin' // page
        );

        add_settings_field(
            'activate_deactivate_0', // id
            'Deactivate', // title
            array( $this, 'activate_deactivate_0_callback' ), // callback
            'ssbcodeAdmin', // page
            'ssbcodeSettingsSection' // section
        );
    }

    public function ssbcodeSanitize($input) {
        $sanitary_values = array();
        if ( isset( $input['activate_deactivate_0'] ) ) {
            $sanitary_values['activate_deactivate_0'] = $input['activate_deactivate_0'];
        }

        return $sanitary_values;
    }

    public function ssbcodeSectionInfo() {
        
    }

    public function activate_deactivate_0_callback() {
        printf(
            '<input type="checkbox" name="ssbcodeOptionName[activate_deactivate_0]" id="activate_deactivate_0" value="activate_deactivate_0" %s> <label for="activate_deactivate_0">Disable plugin functionality</label>',
            ( isset( $this->ssbcodeOption['activate_deactivate_0'] ) && $this->ssbcodeOption['activate_deactivate_0'] === 'activate_deactivate_0' ) ? 'checked' : ''
        );
    }

}

