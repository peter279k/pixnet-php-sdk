<?php
/**
 * Copyright (c) 2014, PIXNET Digital Media Corporation
 * All rights reserved.
 */

class Pix_Mainpage_Album extends PixAPI
{
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function __get($class_name)
    {
        throw new PixAPIException('CLASS [' . $class_name . '] NOT FOUND', PixAPIException::CLASS_NOT_FOUND);
    }

    public function columns($options = array())
    {
        $parameters = $this->mergeParameters(
            array(),
            $options,
            array('api_version'),
            array()
        );
        $response = $this->query('mainpage/album/columns', $parameters, 'GET');
        return $response;
    }

    public function hot($category_id, $options = array())
    {
        if ('' === $category_id) {
            throw new PixAPIException('Required parameters missing', PixAPIException::REQUIRE_PARAMETERS_MISSING);
        }

        $parameters = $this->mergeParameters(
            array(),
            $options,
            array('page', 'count', 'strict_filter', 'api_version'),
            array()
        );
        $response = $this->query('mainpage/album/categories/hot/' . $category_id, $parameters, 'GET');
        return $response;
    }

    public function latest($category_id, $options = array())
    {
        if ('' === $category_id) {
            throw new PixAPIException('Required parameters missing', PixAPIException::REQUIRE_PARAMETERS_MISSING);
        }

        $parameters = $this->mergeParameters(
            array(),
            $options,
            array('page', 'count', 'strict_filter', 'api_version'),
            array()
        );
        $response = $this->query('mainpage/album/categories/latest/' . $category_id, $parameters, 'GET');
        return $response;
    }

    public function hotWeekly($category_id, $options = array())
    {
        if ('' === $category_id) {
            throw new PixAPIException('Required parameters missing', PixAPIException::REQUIRE_PARAMETERS_MISSING);
        }

        $parameters = $this->mergeParameters(
            array(),
            $options,
            array('page', 'count', 'strict_filter', 'api_version'),
            array()
        );
        $response = $this->query('mainpage/album/categories/hot_weekly/' . $category_id, $parameters, 'GET');
        return $response;
    }

    public function bestSelected()
    {
        $response = $this->query('mainpage/album/best_selected/', array(), 'GET');
        return $response;
    }
}
