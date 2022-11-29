<?php

namespace WatchColor\Config\Model\Config\Source;

class SelectOptions implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = $this->toArray();
        $result = [];

        foreach($options as $value => $label){
            $result[] = [
                'value' => $value, 
                'label' => $label
            ];
        }

        return $result;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            0 => __('Select the Options'),
            1 => __('Black'),
            2 => __('White'),
            3 => __('Gray'),
            4 => __('green'),
            5 => __('skin')
        ];
    }
}