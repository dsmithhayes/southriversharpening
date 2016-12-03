<?php

namespace SouthRiverSharpening;

class Services
{
    /**
     * @var string
     *      The JSON buffer as a raw string.
     */
    private $jsonBuffer;

    /**
     * @var array
     *      An array of services.
     */
    private $services;

    /**
     * @param string $path
     *      The path of the services file.
     */
    public function __construct($path)
    {
        $this->jsonBuffer = file_get_contents(realpath($path));
        $this->services = json_decode($this->jsonBuffer, true);

        foreach ($this->services as $service) {
            $cost = (float) $service['price'] / 100;
            $this->services[$i]['price'] = '$' . number_format($cost, 2);

            if ($service['per_inch']) {
                $this->services[$i]['price'] .= ' per inch';
            }

            $i++;
        }

        if (!is_array($this->services)) {
            throw new \Exception('Unable to open services JSON file: ' . $path);
        }
    }

    /**
     * @return array
     *      Yields the services array.
     */
    public function getServices()
    {
        return $this->services;
    }
}
