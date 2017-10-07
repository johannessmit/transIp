<?php

namespace TransIp\Services;

use TransIp\Models\Cronjob;
use TransIp\Models\Db;
use TransIp\Models\MailBox;
use TransIp\Models\MailForward;
use TransIp\Models\SubDomain;
use TransIp\Models\Webhost;
use TransIp\Models\WebhostingPackage;

/**
 * Class WebhostingService
 *
 * @method string[] getWebhostingDomainNames()
 * @method WebhostingPackage[] getAvailablePackages()
 * @method WebHost getInfo(string $domainName)
 * @method void order(string $domainName, WebhostingPackage $webhostingPackage)
 * @method WebhostingPackage[] getAvailableUpgrades(string $domainName)
 * @method void upgrade(string $domainName, string $newWebhostingPackage)
 * @method void cancel(string $domainName, string $endTime)
 * @method void setFtpPassword(string $domainName, string $newPassword)
 * @method void createCronjob(string $domainName, Cronjob $cronjob)
 * @method void deleteCronjob(string $domainName, Cronjob $cronjob)
 * @method void createMailBox(string $domainName, MailBox $mailBox)
 * @method void modifyMailBox(string $domainName, MailBox $mailBox)
 * @method void setMailBoxPassword(string $domainName, MailBox $mailBox, string $newPassword)
 * @method void deleteMailBox(string $domainName, MailBox $mailBox)
 * @method void createMailForward(string $domainName, MailForward $mailForward)
 * @method void modifyMailForward(string $domainName, MailForward $mailForward)
 * @method void deleteMailForward(string $domainName, MailForward $mailForward)
 * @method void createDatabase(string $domainName, Db $db)
 * @method void modifyDatabase(string $domainName, Db $db)
 * @method void setDatabasePassword(string $domainName, Db $db, string $newPassword)
 * @method void deleteDatabase(string $domainName, Db $db)
 * @method void createSubdomain(string $domainName, SubDomain $subDomain)
 * @method void deleteSubdomain(string $domainName, SubDomain $subDomain)
 *
 * @package TransIp\Services
 */
class Webhosting extends Service {
    protected $service = 'WebhostingService';

    protected $classMap = [
        'WebhostingPackage' => WebhostingPackage::class,
        'WebHost' => Webhost::class,
        'Cronjob' => Cronjob::class,
        'MailBox' => MailBox::class,
        'Db' => Db::class,
        'MailForward' => MailForward::class,
        'SubDomain' => SubDomain::class,
    ];

    protected $options = [
        'encoding' => 'utf-8',
        'features' => SOAP_SINGLE_ELEMENT_ARRAYS, // see http://bugs.php.net/bug.php?id=43338
        'trace' => true
    ];
}