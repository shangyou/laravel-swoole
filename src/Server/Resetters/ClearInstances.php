<?php

namespace SwooleTW\Http\Server\Resetters;

use SwooleTW\Http\Server\Sandbox;
use Illuminate\Contracts\Container\Container;
use SwooleTW\Http\Server\Resetters\ResetterContract;

class ClearInstances implements ResetterContract
{
    /**
     * "handle" function for resetting app.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     * @param \SwooleTW\Http\Server\Sandbox $sandbox
     */
    public function handle(Container $app, Sandbox $sandbox)
    {
        $instances = $sandbox->getConfig()->get('swoole_http.instances', []);

        foreach ($instances as $instance) {
            $app->forgetInstance($instance);
        }

        return $app;
    }
}
