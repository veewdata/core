<?php

namespace tdt\core;

/**
 * The base controller
 * @copyright (C) 2011,2013 by OKFN Belgium vzw/asbl
 * @license AGPLv3
 * @author Michiel Vancoillie <michiel@okfn.be>
 */
class BaseController extends \Controller {

    /*
     * Handles all core requests
     */
    public function handleRequest($uri){

        // Check first segment of the request
        switch(\Request::segment(1)){
            case 'discovery':
                // Discovery document
                $controller = 'tdt\core\definitions\DiscoveryController';
                break;
            // TODO: don't hardcode this part
            case 'definitions':
                // Definitions request
                $controller = 'tdt\core\definitions\DefinitionController';
                $uri = str_replace('definitions/', '', $uri);
                break;
            // TODO:: add info
            default:
                // None of the above -> must be a dataset request
                $controller = 'tdt\core\datasets\DatasetController';
                break;
        }

        return $controller::handle($uri);
    }
}