<?php
namespace WatchColor\Config\Observer;
use Magento\Framework\Event\ObserverInterface;
class ProductSaveAfter implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $value = \Magento\Framework\App\ObjectManager::getInstance()->get(\Magento\Framework\App\Config\ScopeConfigInterface::class)
            ->getValue('job/general/select_options', \Magento\Store\Model\ScopeInterface::SCOPE_STORE,);
        $instance = \Magento\Framework\App\ObjectManager::getInstance();
        $productId = (int)$observer->getProduct()
            ->getId();
        $event = $observer->getEvent();
        $product = $event->getProduct();
        $watch_color = $product->getCustomAttribute('watch_color');

        if ($value == "1")
        {
            $config_color = "black";
        }
        else if ($value == "2")
        {
            $config_color = "white";
        }
        else if ($value == "3")
        {
            $config_color = "gray";
        }
        else
        {
            $config_color = "Not any color select in Configuration";
        }
        if ($watch_color == "")
        {
            $action = $instance->create('Magento\Catalog\Model\Product\Action');
            $event = $observer->getEvent();
            $product = $event->getProduct();
            $action->updateAttributes([$productId], array('watch_color' => $config_color) , 0);
        }
    }
}

