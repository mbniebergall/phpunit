<?php

declare(strict_types=1);

namespace Infrastructure;

class Sms
{
    public function __construct(
        protected array $config,
        protected Logger $logger
    ) {}

    public function send(string $toNumber, string $message): bool
    {
        // send an sms
        // log sms send
        $this->logger->log($toNumber . ': ' . $message);

        return true;
    }
}
