<?php

namespace TransIp\Services;

use TransIp\Models\Haip as HaipModel;

/**
 * Class Haip
 *
 * @method Haip getHaip(string $haipName)
 * @method Haip[] getHaips()
 * @method void changeHaipVps(string $haipName, string $vpsName)
 * @method void attachHaipVps(string $haipName, string $vpsName)
 * @method void detachHaipVps(string $haipName, string $vpsName)
 * @method void setBalancingMode(string $haipName, string $balancingMode, string $cookieName)
 * @method void setHttpHealthCheck(string $haipName, string $path, int $port)
 * @method void setTcpHealthCheck(string $haipName)
 * @method UNKNOWN getStatusReport(string $haipName)
 * @method UNKNOWN getCertificatesByHaip(string $haipName)
 * @method UNKNOWN getAvailableCertificatesByHaip(string $haipName)
 * @method void addCertificateToHaip(string $haipName, int $certificateId)
 * @method void deleteCertificateToHaip(string $haipName, int $certificateId)
 * @method void startHaipLetsEncryptCertificateIssue(string $haipName, string $commonName)
 * @method string getPtrForHaip(string $haipName)
 * @method void setPtrForHaip(string $haipName, string $ptr)
 * @method void setHaipDescription(string $haipName, string $description)
 * @method UNKNOWN getHaipPortConfigurations(string $haipName)
 * @method void setDefaultPortConfiguration(string $haipName)
 * @method void addHaipPortConfiguration(string $haipName, string $name, int $portNumber, string $mode)
 * @method void updateHaipPortConfiguration(string $haipName, int $configurationId, string $name, int $portNumber, string $mode)
 * @method void deleteHaipPortConfiguration(string $haipName, int $configurationId)
 * @method void cancelHaip(string $haipName, string $endTime)
 *
 * @package TransIp\Services
 */
class Haip extends Service
{
    protected $classMap = [
        'Haip' => HaipModel::class
    ];
}