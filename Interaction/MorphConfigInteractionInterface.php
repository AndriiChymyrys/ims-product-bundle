<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Interaction;

use WideMorph\Morph\Bundle\MorphConfigBundle\Domain\Services\ExternalBundleConfigInterface;

/**
 * Class MorphConfigInteractionInterface
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Interaction
 */
interface MorphConfigInteractionInterface
{
    /** @var string */
    public const EXTERNAL_BUNDLE_CONFIG_SERVICE_NAME = 'WideMorph\Morph\Bundle\MorphConfigBundle\Domain\Services\ExternalBundleConfig';

    /** @var string */
    public const DB_PREFIX_SETTING_NAME = ExternalBundleConfigInterface::DB_PREFIX_SETTING_NAME;

    /** @var string */
    public const DB_TABLE_SETTING_NAME = ExternalBundleConfigInterface::DB_TABLE_SETTING_NAME;
}
