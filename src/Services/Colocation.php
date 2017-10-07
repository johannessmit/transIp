<?php

namespace TransIp\Services;

use TransIp\Models\DataCenterVisitor;

/**
 * Class Colocation
 *
 * @method DataCenterVisitor[] requestAccess(string $when, int $duration, array $visitors, string $phoneNumber)
 * @method void requestRemoteHands(string $coloName, string $contactName, string $phoneNumber, int $expectedDuration, string $instructions)
 * @method string[] getColoNames()
 * @method string[] getIpAddresses(string $coloName)
 * @method string[] getIpRanges(string $coloName)
 * @method void createIpAddress(string $ipAddress, string $reverseDns)
 * @method void deleteIpAddress(string $ipAddress)
 * @method string getReverseDns(string $ipAddress)
 * @method void setReverseDns(string $ipAddress, string $reverseDns)
 *
 * @package TransIp\Services
 */
class Colocation extends Service
{
    protected $classMap = [
        'DataCenterVisitor' => DataCenterVisitor::class
    ];
}