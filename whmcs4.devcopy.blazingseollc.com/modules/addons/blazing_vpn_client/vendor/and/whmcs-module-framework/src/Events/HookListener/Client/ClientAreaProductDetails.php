<?php

namespace Blazing\Vpn\Client\Vendor\WHMCS\Module\Framework\Events\HookListener\Client;

use Blazing\Vpn\Client\Vendor\WHMCS\Module\Framework\Events\AbstractHookListener;
abstract class ClientAreaProductDetails extends AbstractHookListener
{
    const KEY = 'ClientAreaProductDetails';
    protected $code = self::KEY;
}