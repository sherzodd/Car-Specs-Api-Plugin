<?php

class AdminSettings {

    public function add_admin_menu() {
        add_menu_page(
            'Car Specs Plugin Settings',
            'Car Specs Settings',
            'manage_options',
            'car_specs_settings',
            array($this, 'display_admin_page')
        );
    }

    public function display_admin_page() {
        ?>
        <div class="wrap">
            <h1>Car Specs Plugin Settings</h1>
            <form action="options.php" method="post">
                <?php
                settings_fields('car_specs_options');
                do_settings_sections('car_specs_settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_settings() {
        register_setting('car_specs_options', 'rapidapi_key');
        add_settings_section('car_specs_settings', 'RapidAPI Settings', array($this, 'settings_section_callback'), 'car_specs_settings');
        add_settings_field('rapidapi_key', 'RapidAPI Key', array($this, 'rapidapi_key_field_callback'), 'car_specs_settings', 'car_specs_settings');
    }

    public function settings_section_callback() {
        echo 'Configure RapidAPI settings for car specs.';
    }

    public function rapidapi_key_field_callback() {
        $key = esc_attr(get_option('rapidapi_key'));
        echo "<input type='text' name='rapidapi_key' value='$key' />";
    }
}
