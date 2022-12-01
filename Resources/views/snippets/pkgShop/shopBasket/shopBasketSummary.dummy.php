<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$aData = array(
    'dSumProducts' => 199.99,
    'dSumDiscounts' => -10,
    'aDiscountList' => array(
        array(
            'sName' => 'discount 1',
            'dValue' => -6.00,
        ),
        array(
            'sName' => 'discount 2',
            'dValue' => -4.00,
        ),
    ),
    'dSumDiscountVouchers' => -4,
    'aDiscountVoucherList' => array(
        array(
            'sCode' => 'dv001',
            'sName' => 'discount voucher 1',
            'dValue' => -2.50,
            'sRemoveFromBasketLink' => '#',
        ),
        array(
            'sCode' => 'dv002',
            'sName' => 'discount voucher 2',
            'dValue' => -1.50,
            'sRemoveFromBasketLink' => '#',
        ),
    ),
    'dSumProductsAfterDiscountsAndDiscountVouchers' => 185.99,

    'dSumShipping' => 3.75,
    'dSumPaymentSurcharge' => 5,

    'dSumVat' => 37,
    'aVatList' => array(
        array(
            'sName' => '19%',
            'iPercent' => 19,
            'dValue' => 37,
        ),
    ),
    'dSumVatWithoutShipping' => 35.34,

    'dSumTotalBasket' => 194, 74,

    'dSumSponsoredVouchers' => -10,
    'aSponsoredVoucherList' => array(
        array(
            'sCode' => 'sv001',
            'sName' => 'sponsored voucher 1',
            'dValue' => -2.50,
            'sRemoveFromBasketLink' => '#',
        ),
        array(
            'sCode' => 'sv002',
            'sName' => 'sponsored voucher 2',
            'dValue' => -1.50,
            'sRemoveFromBasketLink' => '#',
        ),
        array(
            'sCode' => 'sv003',
            'sName' => 'sponsored voucher 3',
            'dValue' => -6,
            'sRemoveFromBasketLink' => '#',
        ),
    ),
    'dBasketTotalWithoutSponsoredVouchers' => 194.74,
    'dSumGrandTotal' => 184.74,

    'iNumberOfUniqueProducts' => 1,
    'iNumberOfProducts' => 1,
    'sCurrency' => '€',
);

// map d and i
if (!function_exists('addFormattedValues__')) {
    function addFormattedValues__($aData)
    {
        foreach (array_keys($aData) as $sField) {
            if (is_array($aData[$sField])) {
                addFormattedValues__($aData[$sField]);
            } elseif ('d' == substr($sField, 0, 1)) {
                $aData['s'.substr($sField, 1)] = TCMSLocal::GetActive()->FormatNumber($aData[$sField], 2);
            } elseif ('i' == substr($sField, 0, 1)) {
                // keep als many decimals as the number has
                $iNumberOfDigits = 0;
                $sTmvVal = (string) $aData[$sField];
                if (false !== stripos($sTmvVal, '.')) {
                    $sTmvVal = substr($sTmvVal, stripos($sTmvVal, '.') + 1);
                    while (0 == substr($sTmvVal, -1) && strlen($sTmvVal) > 0) {
                        $sTmvVal = substr($sTmvVal, 0, -1);
                    }

                    $iNumberOfDigits = strlen($sTmvVal);
                }
                $aData['s'.substr($sField, 1)] = TCMSLocal::GetActive()->FormatNumber($aData[$sField], $iNumberOfDigits);
            }
        }
    }
}
addFormattedValues__($aData);

$oDummy->addDummyDataArray($aData);

return $oDummy;
