<?php

namespace TransIp\Models;

class Webhost
{
    /**
     * Domain name of the webhosting package
     *
     * @var string
     */
    public $domainName;

    /**
     * The list of active cronjobs for this webhosting package
     *
     * @var Cronjob[]
     */
    public $cronjobs;

    /**
     * The list of active Mailboxes for this webhosting package
     *
     * @var MailBox[]
     */
    public $mailBoxes;

    /**
     * The list of active Databases for this webhosting package
     *
     * @var Db[]
     */
    public $dbs;

    /**
     * The list of active mail aliases/forwards for this webhosting package
     *
     * @var MailForward[]
     */
    public $mailForwards;

    /**
     * The list of active subdomains for this webhosting package
     *
     * @var SubDomain[]
     */
    public $subDomains;
}