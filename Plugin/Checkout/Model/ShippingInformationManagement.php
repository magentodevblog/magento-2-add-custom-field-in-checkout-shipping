<?php
namespace Dev\Testing\Plugin\Checkout\Model;


class ShippingInformationManagement
{
    protected $quoteRepository;

    protected $dataHelper;

    public function __construct(
        \Magento\Quote\Model\QuoteRepository $quoteRepository
    )
    {
        $this->quoteRepository = $quoteRepository;
    }

    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    )
    {
		if(!$extensionAttributes = $addressInformation->getExtensionAttributes())
        {
            return;
        }
		
        $quote = $this->quoteRepository->getActive($cartId);
        $quote->setCustomNotes($extensionAttributes->getCustomNotes());
    }
}
