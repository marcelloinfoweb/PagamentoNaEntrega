<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Funarbe\PagamentoNaEntrega\Block\Adminhtml\Info;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Phrase;
use Magento\Sales\Model\Order;

class Pagamentonaentrega extends \Magento\Backend\Block\Template
{
    private \Magento\Framework\Pricing\Helper\Data $priceHelper;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Pricing\Helper\Data $priceHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Pricing\Helper\Data $priceHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->priceHelper = $priceHelper;
    }

    /**
     * @return string|void
     */
    public function PagamentoNaEntrega()
    {
        $objectManager = ObjectManager::getInstance();
        $order = $objectManager->create(Order::class)
            ->load($this->getRequest()->getParam('order_id'));

        $additionalInformation = $order->getPayment()->getAdditionalInformation();

        if ($additionalInformation['metodo'] === 'cartao') {
            return "Cartão de Crédito";
        }

        if ($additionalInformation['metodo'] === 'dinheiro') {
            $troco = $this->priceHelper->currency($additionalInformation['troco'], true, false);

            return "Dinheiro, troco para $troco";
        }
    }
}
