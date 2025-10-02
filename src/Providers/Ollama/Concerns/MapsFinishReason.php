<?php

declare(strict_types=1);

namespace Prism\Prism\Providers\Ollama\Concerns;

use Prism\Prism\Enums\FinishReason;
use Prism\Prism\Providers\Ollama\Maps\FinishReasonMap;

trait MapsFinishReason
{
    /**
     * @param  array<string, mixed>  $data
     */
    protected function mapFinishReason(array $data): FinishReason
    {
        if ((data_get($data, 'done') === true) && data_get($data, 'done_reason') === null) {
            data_set($data, 'done_reason', 'stop');
        }
        
        return FinishReasonMap::map(data_get($data, 'done_reason', ''));
    }
}
