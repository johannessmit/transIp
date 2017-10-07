<?php

namespace TransIp\Services;

use TransIp\Models\OperatingSystem;
use TransIp\Models\PrivateNetwork;
use TransIp\Models\Product;
use TransIp\Models\Snapshot;
use TransIp\Models\Vps as VpsModel;
use TransIp\Models\VpsBackup;

/**
 * Class VpsService
 *
 * @method Product[] getAvailableProducts()
 * @method Product[] getAvailableAddons()
 * @method Product[] getActiveAddonsForVps(string $vpsName)
 * @method Product[] getAvailableUpgrades(string $vpsName)
 * @method Product[] getAvailableAddonsForVps(string $vpsName)
 * @method Product[] getCancellableAddonsForVps(string $vpsName)
 * @method void orderVps(string $productName, array $addons, string $operatingSystemName, string $hostname)
 * @method void cloneVps(string $vpsName)
 * @method void orderAddon(string $vpsName, array $addons)
 * @method void orderPrivateNetwork()
 * @method void upgradeVps(string $vpsName, string $upgradeToProductName)
 * @method void cancelVps(string $vpsName, string $endTime)
 * @method void cancelAddon(string $vpsName, string $addonName)
 * @method void cancelPrivateNetwork(string $privateNetworkName, string $endTime)
 * @method PrivateNetwork[] getPrivateNetworksByVps(string $vpsName)
 * @method PrivateNetwork[] getAllPrivateNetworks()
 * @method void addVpsToPrivateNetwork(string $vpsName, string $privateNetworkName)
 * @method void removeVpsFromPrivateNetwork(string $vpsName, string $privateNetworkName)
 * @method UNKNOWN getTrafficInformationForVps(string $vpsName)
 * @method void start(string $vpsName)
 * @method void stop(string $vpsName)
 * @method void reset(string $vpsName)
 * @method void createSnapshot(string $vpsName, string $description)
 * @method void revertSnapshot(string $vpsName, string $snapshotName)
 * @method void revertSnapshotToOtherVps(string $sourceVpsName, string $snapshotName, string $destinationVpsName)
 * @method void removeSnapshot(string $vpsName, string $snapshotName)
 * @method void revertVpsBackup(string $vpsName, int $vpsBackupId)
 * @method Vps getVps(string $vpsName)
 * @method Vps[] getVpses()
 * @method Snapshot[] getSnapshotsByVps(string $vpsName)
 * @method VpsBackup[] getVpsBackupsByVps(string $vpsName)
 * @method OperatingSystem[] getOperatingSystems()
 * @method void installOperatingSystem(string $vpsName, string $operatingSystemName, string $hostname)
 * @method void installOperatingSystemUnattended(string $vpsName, string $operatingSystemName, string $base64InstallText)
 * @method string[] getIpsForVps(string $vpsName)
 * @method string[] getAllIps()
 * @method void addIpv6ToVps(string $vpsName, string $ipv6Address)
 * @method void updatePtrRecord(string $ipAddress, string $ptrRecord)
 * @method void setCustomerLock(string $vpsName, boolean $enabled)
 * @method void handoverVps(string $vpsName, string $targetAccountname)
 *
 *
 * @package TransIp\Services
 */
class Vps extends Service
{
    protected $service = 'VpsService';

    protected $classMap = [
        'Product' => Product::class,
        'PrivateNetwork' => PrivateNetwork::class,
        'Vps' => VpsModel::class,
        'Snapshot' => Snapshot::class,
        'VpsBackup' => VpsBackup::class,
        'OperatingSystem' => OperatingSystem::class
    ];

    protected $options = [
        'encoding' => 'utf-8',
        'features' => SOAP_SINGLE_ELEMENT_ARRAYS, // see http://bugs.php.net/bug.php?id=43338
        'trace' => true
    ];
}