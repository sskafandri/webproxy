<?php

namespace Blazing\Vpn\Client\Vendor\Buzz\Listener;

use Blazing\Vpn\Client\Vendor\Buzz\Message\MessageInterface;
use Blazing\Vpn\Client\Vendor\Buzz\Message\RequestInterface;
use Blazing\Vpn\Client\Vendor\Buzz\Exception\InvalidArgumentException;
class CallbackListener implements ListenerInterface
{
    private $callable;
    /**
     * Constructor.
     *
     * The callback should expect either one or two arguments, depending on
     * whether it is receiving a pre or post send notification.
     *
     *     $listener = new CallbackListener(function($request, $response = null) {
     *         if ($response) {
     *             // postSend
     *         } else {
     *             // preSend
     *         }
     *     });
     *
     * @param mixed $callable A PHP callable
     *
     * @throws InvalidArgumentException If the argument is not callable
     */
    public function __construct($callable)
    {
        if (!is_callable($callable)) {
            throw new InvalidArgumentException('The argument is not callable.');
        }
        $this->callable = $callable;
    }
    public function preSend(RequestInterface $request)
    {
        call_user_func($this->callable, $request);
    }
    public function postSend(RequestInterface $request, MessageInterface $response)
    {
        call_user_func($this->callable, $request, $response);
    }
}