<?php

declare(strict_types=1);

namespace Yiisoft\Middleware\Dispatcher;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

interface MiddlewareStackInterface extends RequestHandlerInterface
{
    /**
     * Builds middleware stack from array of middleware instances and the fallback request handler.
     * It's possible not to pass any middlewares i. e. set `$middlewares` to `[]`,
     * than only the fallback handler will be used.
     *
     * @param MiddlewareInterface[] $middlewares Middlewares being composed to stack. Can be empty.
     * @param RequestHandlerInterface $fallbackHandler Fallback request handler.
     *
     * @return self
     */
    public function build(array $middlewares, RequestHandlerInterface $fallbackHandler): self;

    /**
     * Clears the middleware stack including fallback request handler.
     */
    public function reset(): void;

    /**
     * Checks if there are any middlewares or fallback request handler bound.
     *
     * @return bool
     */
    public function isEmpty(): bool;
}
