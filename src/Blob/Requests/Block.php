<?php

declare(strict_types=1);

namespace AzureOss\Storage\Blob\Requests;

/**
 * @internal
 */
final class Block
{
    public function __construct(
        public string $id,
        public BlockType $type,
    ) {}
}
