<?php

namespace TransIp\Services;

use TransIp\Models\DnsEntry;
use TransIp\Models\Domain as DomainModel;
use TransIp\Models\DomainAction;
use TransIp\Models\DomainBranding;
use TransIp\Models\DomainCheckResult;
use TransIp\Models\Nameserver;
use TransIp\Models\Tld;
use TransIp\Models\WhoisContact;

/**
 * Class DomainService
 *
 * @method DomainCheckResult[] batchCheckAvailability(array $domainNames)
 * @method string checkAvailability(string $domainName)
 * @method string getWhois(string $domainName)
 * @method string[] getDomainNames()
 * @method Domain getInfo(string $domainName)
 * @method Domain[] batchGetInfo(array $domainNames)
 * @method string getAuthCode(string $domainName)
 * @method boolean getIsLocked(string $domainName)
 * @method void register(Domain $domain)
 * @method void cancel(string $domainName, string $endTime)
 * @method void transferWithOwnerChange(Domain $domain, string $authCode)
 * @method void transferWithoutOwnerChange(Domain $domain, string $authCode)
 * @method void setNameservers(string $domainName, Nameserver[] $nameservers)
 * @method void setLock(string $domainName)
 * @method void unsetLock(string $domainName)
 * @method void setDnsEntries(string $domainName, DnsEntry[] $dnsEntries)
 * @method void setOwner(string $domainName, WhoisContact $registrantWhoisContact)
 * @method void setContacts(string $domainName, WhoisContact[] $contacts)
 * @method Tld[] getAllTldInfos()
 * @method Tld getTldInfo(string $tldName)
 * @method DomainAction getCurrentDomainAction(string $domainName)
 * @method void retryCurrentDomainActionWithNewData(Domain $domain)
 * @method void retryTransferWithDifferentAuthCode(Domain $domain, string $newAuthCode)
 * @method void cancelDomainAction(Domain $domain)
 *
 * @package TransIp\Services
 */
class Domain extends Service
{
    protected $classMap = [
        'DomainCheckResult' => DomainCheckResult::class,
        'Domain' => DomainModel::class,
        'Nameserver' => Nameserver::class,
        'WhoisContact' => WhoisContact::class,
        'DnsEntry' => DnsEntry::class,
        'DomainBranding' => DomainBranding::class,
        'Tld' => Tld::class,
        'DomainAction' => DomainAction::class,
    ];
}