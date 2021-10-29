<?php

namespace Funarbe\PagamentoNaEntrega\Observer;

use Magento\Framework\Event\Observer;
use Magento\Payment\Observer\AbstractDataAssignObserver;
use Magento\Quote\Api\Data\PaymentInterface;
use Psr\Log\LoggerInterface;

/**
 * Class SavePoNumberToOrderObserver
 */
class SaveCodInfo extends AbstractDataAssignObserver
{
    public const TROCO = 'troco';
    public const METODO = 'metodo';

    /**
     * @var array
     */
    protected array $additionalInformationList = [
        self::TROCO,
        self::METODO
    ];

    protected $logger;

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

//        $data = $this->readDataArgument($observer);
//        $additionalData = $data->getData(PaymentInterface::KEY_ADDITIONAL_DATA);
//        if (!is_array($additionalData)) {
//            return;
//        }
//
//        $this->logger->info("COD Form Log additionalData", $additionalData);
//
//        $paymentInfo = $this->readPaymentModelArgument($observer);
//
//        foreach ($this->additionalInformationList as $additionalInformationKey) {
//            if (isset($additionalData[$additionalInformationKey])) {
//                $paymentInfo->setData(
//                    $additionalInformationKey,
//                    $additionalData[$additionalInformationKey]
//                );
//            }
//        }
    }
}