<?php

declare(strict_types=1);

namespace AzureOss\Storage\Tests\Feature;

use AzureOss\Storage\Exceptions\ContainerNotFoundException;
use AzureOss\Storage\Tests\FeatureTestCase;
use PHPUnit\Framework\Attributes\Test;

class DeleteContainerTest extends FeatureTestCase
{
    #[Test]
    public function container_is_deleted(): void
    {
        $this->withContainer(__METHOD__, function (string $container) {
            $this->assertTrue($this->client->containerExists($container));

            $this->client->deleteContainer($container);

            $this->assertFalse($this->client->containerExists($container));
        });
    }

    #[Test]
    public function throws_error_when_container_doesnt_exist(): void
    {
        $this->expectException(ContainerNotFoundException::class);

        $this->client->deleteContainer('noop');
    }
}
