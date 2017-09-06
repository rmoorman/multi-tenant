<?php

/*
 * This file is part of the hyn/multi-tenant package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://laravel-tenancy.com
 * @see https://github.com/hyn/multi-tenant
 */

namespace Hyn\Tenancy\Tests\Traits;

use Illuminate\Foundation\Testing\TestResponse;

trait InteractsWithLaravelVersions
{
    public function assertJsonFragment($data = [], $response = null)
    {
        if (! $response && isset($this->response)) {
            $response = $this->response;
        }

        if ($response instanceof TestResponse) {
            return $response->assertJsonFragment($data);
        }

        if ($response instanceof self) {
            return $this->seeJson($data);
        }

        throw new \RuntimeException('Response object unknown: ' . get_class($response));
    }
}