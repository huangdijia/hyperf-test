<?php

declare(strict_types=1);
/**
 * This file is part of RCS.
 *
 * @link     https://code.addcn.com
 * @document https://code.addcn.com/8591/services/rcs/blob/master/README.md
 * @contact  hdj@addcn.com
 * @license  https://code.addcn.com/8591/services/rcs/blob/master/LICENSE
 */
namespace App\Process;

use Carbon\Carbon;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Process\AbstractProcess;
use Hyperf\Process\Annotation\Process;

/**
 * @Process(name="foo_process")
 */
class FooProcess extends AbstractProcess
{
    /**
     * @var StdoutLoggerInterface
     */
    private $logger;

    public function __construct(StdoutLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function handle(): void
    {
        $i = 0;
        while (true) {
            if ($i++ >= 10) {
                break;
            }

            $this->logger->info(sprintf('FooProcess looping[%s @ %s].', $i, Carbon::now()));
            sleep(10);
        }

        $this->logger->error('FooProcess exited.');
    }
}
