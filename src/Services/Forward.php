<?php

namespace TransIp\Services;

use TransIp\Models\Forward as ForwardModel;

/**
 * Class Forward
 *
 * @method string[] getForwardDomainNames()
 * @method Forward getInfo(string $forwardDomainName)
 * @method void order(Forward $forward)
 * @method void cancel(string $forwardDomainName, string $endTime)
 * @method void modify(Forward $forward)
 *
 * @package TransIp\Services
 */
class Forward extends Service
{
    protected $service = 'ForwardService';

    protected $classMap = [
        'Forward' => ForwardModel::class
    ];
}