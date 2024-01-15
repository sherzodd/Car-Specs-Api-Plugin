<?php

class CarSpecs implements JsonSerializable
{
    private string $make;
    private string $manufacturer_name;
    private string $model;
    private string $model_year;
    private string $plant_city;
    private string $series;
    private string $vehicle_type;
    private string $plant_country;
    private ?string $manufacturer_id;
    private string $body_class;
    private string $doors;
    private string $engine_number_of_cylinders;
    private ?string $displacement_cc;
    private ?string $displacement_ci;
    private ?string $displacement_l;
    private ?string $engine_model;
    private ?string $engine_power;
    private ?string $fuel_type_primary;
    private ?string $engine_brake;
    private ?string $other_engine_info;

    /**
     * @param string $make
     * @param string $manufacturer_name
     * @param string $model
     * @param string $model_year
     * @param string $plant_city
     * @param string $series
     * @param string $vehicle_type
     * @param string $plant_country
     * @param string $manufacturer_id
     * @param string $body_class
     * @param string $doors
     * @param string $engine_number_of_cylinders
     * @param string $displacement_c_c
     * @param string $displacement_c_i
     * @param string $displacement_l
     * @param string $engine_model
     * @param string $engine_power
     * @param string $fuel_type_primary
     * @param string $engine_break
     * @param string $other_engine_info
     */

    public function __construct(string $make,
                                string $manufacturer_name,
                                string $model,
                                string $model_year,
                                string $plant_city,
                                string $series,
                                string $vehicle_type,
                                string $plant_country,
                                ?string $manufacturer_id,
                                string $body_class,
                                string $doors,
                                string $engine_number_of_cylinders,
                                ?string $displacement_c_c,
                                ?string $displacement_c_i,
                                ?string $displacement_l,
                                ?string $engine_model,
                                ?string $engine_power,
                                ?string $fuel_type_primary,
                                ?string $engine_break,
                                ?string $other_engine_info)
    {
        $this->make = $make;
        $this->manufacturer_name = $manufacturer_name;
        $this->model = $model;
        $this->model_year = $model_year;
        $this->plant_city = $plant_city;
        $this->series = $series;
        $this->vehicle_type = $vehicle_type;
        $this->plant_country = $plant_country;
        $this->manufacturer_id = $manufacturer_id;
        $this->body_class = $body_class;
        $this->doors = $doors;
        $this->engine_number_of_cylinders = $engine_number_of_cylinders;
        $this->displacement_cc = $displacement_c_c;
        $this->displacement_ci = $displacement_c_i;
        $this->displacement_l = $displacement_l;
        $this->engine_model = $engine_model;
        $this->engine_power = $engine_power;
        $this->fuel_type_primary = $fuel_type_primary;
        $this->engine_brake = $engine_break;
        $this->other_engine_info = $other_engine_info;
    }

    public function __constructEmpty() {
    }


    public function jsonSerialize(): array
    {
        return [
            'make' => $this->make,
            'manufacturer_name' => $this->manufacturer_name,
            'model' => $this->model,
            'model_year' => $this->model_year,
            'plant_city' => $this->plant_city,
            'series' => $this->series,
            'vehicle_type' => $this->vehicle_type,
            'plant_country' => $this->plant_country,
            'manufacturer_id' => $this->manufacturer_id,
            'body_class' => $this->body_class,
            'doors' => $this->doors,
            'engine_number_of_cylinders' => $this->engine_number_of_cylinders,
            'displacement_c_c' => $this->displacement_cc,
            'displacement_c_i' => $this->displacement_ci,
            'displacement_l' => $this->displacement_l,
            'engine_model' => $this->engine_model,
            'engine_power' => $this->engine_power,
            'fuel_type_primary' => $this->fuel_type_primary,
            'engine_break' => $this->engine_brake,
            'other_engine_info' => $this->other_engine_info,
        ];
    }
}