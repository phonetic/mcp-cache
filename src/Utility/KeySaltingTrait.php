<?php
/**
 * @copyright ©2014 Quicken Loans Inc. All rights reserved. Trade Secret,
 *    Confidential and Proprietary. Any dissemination outside of Quicken Loans
 *    is strictly prohibited.
 */

namespace MCP\Cache\Utility;

/**
 * If using this trait, an optional class constant "PREFIX" can be used to
 * prefix all cache keys.
 *
 * @internal
 */
trait KeySaltingTrait
{
    /**
     * Salt the cache key if a salt is provided.
     *
     * @param string $key
     * @param string|null $suffix
     * @return string
     */
    private function salted($key, $suffix = null)
    {
        $delimiter = ':';
        if (defined('static::DELIMITER')) {
            $delimiter = static::DELIMITER;
        }

        if (defined('static::PREFIX')) {
            $key = sprintf('%s%s%s', static::PREFIX, $delimiter, $key);
        }

        if ($suffix) {
            return sprintf('%s%s%s', $key, $delimiter, $suffix);
        }

        return $key;
    }
}
