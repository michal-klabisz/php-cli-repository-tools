<?php
namespace Klabisz\Api\Types;

const GITHUB = "github";

namespace Klabisz\Api;

class ServiceFactory {
    
    public static function getService($serviceType = Types\GITHUB) {
            if ($serviceType === Types\GITHUB || !$serviceType) {
                return new GitHub();
            } else {
                throw new \Exception("Unknown service '${serviceType}'");
            }
    }
}
