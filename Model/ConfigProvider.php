<?php

declare(strict_types=1);

namespace Funarbe\PagamentoNaEntrega\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

/**
 * ConfigProvider
 */
abstract class ConfigProvider implements ConfigProviderInterface
{
    public const CODE = 'funarbe_pagamento_na_entrega';
}
