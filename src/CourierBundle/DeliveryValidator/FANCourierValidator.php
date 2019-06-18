<?php

namespace CourierBundle\DeliveryValidator;

use CommonBundle\Entity\Product\Product;
use CourierBundle\DeliveryValidator\Exception\DeliveryNotSupported;
use DeliveryBundle\Entity\Delivery;

class FANCourierValidator
{
    const MAX_WEIGHT = 40000;
    const MAX_PRODUCT_LENGTH = 2000;
    const MAX_DELIVERY_VOLUME = 1000000000;

    public function supportsDelivery(Delivery $delivery)
    {
        $maxLength = 0;
        $maxWidth = 0;
        $maxHeight = 0;

        foreach ($delivery->products as $product) {
            if ($product->type !== Product::DRY) {
                throw new DeliveryNotSupported();
            }

            if ($product->weight > self::MAX_WEIGHT) {
                throw new DeliveryNotSupported();
            }

            $dimensions = [$product->length, $product->width, $product->height];
            rsort($dimensions);
            list($length, $width, $height) = $dimensions;
            if ($length > self::MAX_PRODUCT_LENGTH) {
                throw new DeliveryNotSupported();
            }

            $maxLength = max($maxLength, $length);
            $maxWidth = max($maxWidth, $width);
            $maxHeight += $height;
        }

        $totalVolume = $maxLength*$maxWidth*$maxHeight;
        if ($totalVolume > self::MAX_DELIVERY_VOLUME) {
            throw new DeliveryNotSupported();
        }
    }
}
