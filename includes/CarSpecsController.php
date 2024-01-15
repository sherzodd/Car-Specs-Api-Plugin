<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
require('CarSpecs.php');

class CarSpecsController{
    /**
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getCarSpecsFromApi(string $vim_number, string $rapidapi_key): CarSpecs
    {
        $client = new Client();

        $apiEndpoint = 'https://car-api2.p.rapidapi.com/api/vin/';

        try {
            $response = $client->get($apiEndpoint . $vim_number, [
                'headers' => [
                'X-RapidAPI-Host' => 'car-api2.p.rapidapi.com',
                'X-RapidAPI-Key' => $rapidapi_key,
                ]
            ]);

            if ($response->getStatusCode() === 200) {
                $data = json_decode($response->getBody(), true);
                $enginePower = $data['specs']['engine_power'] ?? null;

                return new CarSpecs(
                    $data['make'],
                    $data['specs']['manufacturer_name'],
                    $data['model'],
                    $data['year'],
                    $data['specs']['plant_city'],
                    $data['specs']['series'],
                    $data['specs']['vehicle_type'],
                    $data['specs']['plant_country'],
                    '',
                    $data['specs']['body_class'],
                    $data['specs']['doors'],
                    $data['specs']['engine_number_of_cylinders'],
                    $data['specs']['displacement_cc'],
                    $data['specs']['displacement_ci'],
                    $data['specs']['displacement_l'],
                    $data['specs']['engine_model'],
                    $enginePower,
                    $data['specs']['fuel_type_primary'],
                    $data['specs']['engine_brake_hp_from'],
                    $data['specs']['other_engine_info']
                );
            } else {
                // Handle non-200 status code
                echo 'API request failed with status code ' . $response->getStatusCode();
                throw new ApiException('API request failed with status code ' . $response->getStatusCode());
            }
        } catch (Exception $e) {
            throw new ApiException('Error: ' . $e->getMessage());
        }
    }
}
