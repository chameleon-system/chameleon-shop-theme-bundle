<?php

/*
 * This file is part of the Chameleon System (https://www.chameleonsystem.com).
 *
 * (c) ESONO AG (https://www.esono.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ChameleonSystem\ChameleonShopThemeBundle\Bridge\Chameleon\Mapper;

use IMapperCacheTriggerRestricted;
use IMapperRequirementsRestricted;
use IMapperVisitorRestricted;

class SchemaOrgProductMapper extends \AbstractViewMapper
{
    /**
     * {@inheritdoc}
     */
    public function GetRequirements(IMapperRequirementsRestricted $oRequirements)
    {
        $oRequirements->NeedsSourceObject('sTopic', 'string', '', true);
        $oRequirements->NeedsSourceObject('sHeadline', 'string');
        $oRequirements->NeedsSourceObject('sImageId', 'string');
        $oRequirements->NeedsSourceObject('sDescription', 'string');
        $oRequirements->NeedsSourceObject('oObject', 'TdbShopArticle');
        $oRequirements->NeedsSourceObject('sCurrencyName', 'string');
        $oRequirements->NeedsSourceObject('sPrice', 'string');
        $oRequirements->NeedsSourceObject('bIsBuyable', 'bool');
    }

    /**
     * {@inheritdoc}
     */
    public function Accept(IMapperVisitorRestricted $oVisitor, $bCachingEnabled, IMapperCacheTriggerRestricted $oCacheTriggerManager)
    {
        $topic = $oVisitor->GetSourceObject('sTopic');
        $headline = $oVisitor->GetSourceObject('sHeadline');
        $imageId = $oVisitor->GetSourceObject('sImageId');
        $description = $oVisitor->GetSourceObject('sDescription');
        /**
         * @var \TdbShopArticle $product
         */
        $product = $oVisitor->GetSourceObject('oObject');
        $currency = $oVisitor->GetSourceObject('sCurrencyName');
        $price = $oVisitor->GetSourceObject('sPrice');
        $isBuyable = $oVisitor->GetSourceObject('bIsBuyable');

        $productData = [
            '@context' => 'http://schema.org',
            '@type' => 'Product',
            'name' => null === $topic ? $headline : "$topic - $headline",
            'image' => \TPkgSnippetRendererFilter::getThumbnail($imageId, 760),
            'description' => strip_tags($description),
        ];

        if (\property_exists(\TdbShopArticle::class, 'fieldMpnr') && '' !== $product->fieldMpnr) {
            $productData['mpn'] = $product->fieldMpnr;
        }
        if ('' !== $topic) {
            $productData['brand'] = [
                '@type' => 'Thing',
                'name' => $topic,
            ];
        }

        $productData['offers'] = [
            '@type' => 'Offer',
            'priceCurrency' => $currency,
            'price' => str_replace(',', '.', str_replace('.', '', $price)),
            'itemCondition' => 'http://schema.org/NewCondition',
            'availability' => true === $isBuyable ? 'http://schema.org/InStock' : 'http://schema.org/OutofStock',
        ];

        $oVisitor->SetMappedValue('schemaOrgProduct', $productData);
    }
}
