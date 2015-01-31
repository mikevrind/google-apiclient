<?php

namespace PulkitJalan\Google\Services;

abstract class AbstractClient
{
    /**
     * @var \Google_Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var string
     */
    protected $project;

    /**
     * @var string
     */
    protected $zone;

    /**
     * @param \Google_Client $client
     * @param array          $config
     */
    public function __construct(\Google_Client $client, array $config)
    {
        $this->client = $client;
        $this->config = $config;
        $this->project = array_get($config, 'service.project_id');
        $this->zone = array_get($config, 'service.zone');
    }

    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    public function getProject()
    {
        return $this->project;
    }

    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    public function getZone()
    {
        return $this->zone;
    }

    protected function getRandomString($length = 11)
    {
        $str = range('a', 'z');

        return $str[array_rand($str)].strtolower(str_random($length-1));
    }
}