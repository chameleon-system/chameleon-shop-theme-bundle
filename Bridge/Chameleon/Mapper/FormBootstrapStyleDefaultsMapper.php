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

use AbstractViewMapper;
use IMapperCacheTriggerRestricted;
use IMapperRequirementsRestricted;
use IMapperVisitorRestricted;

class FormBootstrapStyleDefaultsMapper extends AbstractViewMapper
{
    /**
     * {@inheritdoc}
     */
    public function GetRequirements(IMapperRequirementsRestricted $oRequirements): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function Accept(IMapperVisitorRestricted $oVisitor, $bCachingEnabled, IMapperCacheTriggerRestricted $oCacheTriggerManager): void
    {
        $oVisitor->SetMappedValue('formDefaultLabelClass', 'col-xs-12 col-sm-4 col-md-3 col-lg-2');
        $oVisitor->SetMappedValue('formDefaultInputClass', 'col-xs-12 col-sm-7 col-md-6 col-lg-5');
        $oVisitor->SetMappedValue('formDefaultSubmitClass', 'col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9 col-lg-offset-2 col-lg-10');
        $oVisitor->SetMappedValue('formDefaultHelpClass', 'col-xs-12 col-sm-offset-4 col-sm-7 col-md-offset-3 col-md-6 col-lg-offset-2 col-lg-5');
    }
}
