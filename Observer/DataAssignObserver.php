<?php

namespace Funarbe\PagamentoNaEntrega\Observer;

use Magento\Framework\Event\Observer;
use Magento\Payment\Observer\AbstractDataAssignObserver;
use Magento\Quote\Api\Data\PaymentInterface;
use Psr\Log\LoggerInterface;

/**
 * Class SavePoNumberToOrderObserver
 */
class DataAssignObserver extends AbstractDataAssignObserver
{
    public const TROCO = 'troco';
    public const METODO = 'metodo';

    /**
     * @var array
     */
    protected array $additionalInformationList = [self::TROCO, self::METODO];

    protected LoggerInterface $logger;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $data = $this->readDataArgument($observer);
        $additionalData = $data->getData(PaymentInterface::KEY_ADDITIONAL_DATA);
        if (!is_array($additionalData)) {
            return;
        }

        $paymentInfo = $this->readPaymentModelArgument($observer);

        foreach ($this->additionalInformationList as $additionalInformationKey) {
            if (isset($additionalData[$additionalInformationKey])) {
                $paymentInfo->setAdditionalInformation(
                    $additionalInformationKey,
                    $additionalData[$additionalInformationKey]);
            }
        }
    }
}
