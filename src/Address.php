<?php
/**
 * Created by PhpStorm.
 * User: xiehuanjin
 * Date: 2018/1/30
 * Time: 20:08
 */

namespace lingyin\ethereum\address;


class Address
{
    /**
     * @param $address
     * @return bool
     */
    function validate($address)
    {
        if (!preg_match('/^(0x)?[0-9a-f]{40}$/i', $address)) {
            // Check if it has the basic requirements of an address
            return false;
        } elseif (!preg_match('/^(0x)?[0-9a-f]{40}$/', $address) || preg_match('/^(0x)?[0-9A-F]{40}$/', $address)) {
            // If it's all small caps or all all caps, return true
            return true;
        } else {
            // Otherwise check each case
            return $this->isChecksumAddress($address);
        }
    }

    /**
     * @param $address
     * @return bool
     */
    function isChecksumAddress($address)
    {
        $address = str_replace('0x', '', $address);
        $addressHash = hash('sha3', strtolower($address));
        $addressArray = str_split($address);
        $addressHashArray = str_split($addressHash);

        for ($i = 0; $i < 40; $i++) {
            // The nth letter should be uppercase if the nth digit of casemap is 1
            if ((intval($addressHashArray[$i], 16) > 7 && strtoupper($addressArray[$i]) !== $addressArray[$i]) ||
                (intval($addressHashArray[$i], 16) <= 7 && strtolower($addressArray[$i]) !== $addressArray[$i])) {
                return false;
            }
        }
        return true;
    }
}