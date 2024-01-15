<?php
/**
 * Plugin Name: CarSpecs Plugin
 * Description: Plugin to get specs of cars by their vin number.
 * Version: 1.0
 * Author: Sherzod Safarov
 */

defined('ABSPATH') or die();

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
require('settings/AdminSettings.php');
require('includes/CarSpecsController.php');
class Car_Specs_Plugin {
    private $rapidapi_key;
    private AdminSettings $admin_settings;
    private CarSpecsController $car_specs_controller;

    public function __construct() {
        $this->rapidapi_key = get_option('rapidapi_key');
        $this->admin_settings = new AdminSettings();
        $this->car_specs_controller = new CarSpecsController();

        add_shortcode('car_specs_form', array($this, 'car_specs_form_shortcode'));

        add_action('admin_menu', array($this->admin_settings, 'add_admin_menu'));
        add_action('admin_init', array($this->admin_settings, 'register_settings'));

        add_action('init', array($this, 'handle_form_submission'));
    }

    public function car_specs_form_shortcode() {
        ob_start();
        ?>
        <form action="" method="post">
            <label for="vin_number">VIN Number:</label>
            <input type="text" name="vin_number" required>
            <input type="submit" value="Get Car Specs">
        </form>
        <?php
        $content = ob_get_clean();
        return $content;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws ApiException
     */
    public function handle_form_submission() {
        if (isset($_POST['vin_number'])) {

            // Perform API request using the provided VIN number
            $vin_number = sanitize_text_field($_POST['vin_number']);

            $data = $this->car_specs_controller->getCarSpecsFromApi($vin_number, $this->rapidapi_key);

            include plugin_dir_path(__FILE__) . 'templates/car-specsdisplay.php';

            } else {
                // Handle HTTP request error
                echo '<p>Error making API request.</p>';
            }
    }


}

$car_specs_plugin = new Car_Specs_Plugin();
