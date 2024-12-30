<?php
    $oExtranet = TdbDataExtranet::GetInstance();
    $oActivePage = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_core.active_page_service')->getActivePage();

    // login

    $oViewRenderer = new ViewRenderer();
    $oLoginText = TdbPkgCmsTextBlock::GetInstanceFromSystemName('shop_basket_step_user_login');
    if (is_null($oLoginText)) {
        $sTitle = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.existing_customer_headline');
        $sText = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.existing_customer_help');
    } else {
        $sTitle = $oLoginText->fieldName;
        $sText = $oLoginText->GetTextField('content');
    }
    $oViewRenderer->AddMapper(new TPkgExtranetMapper_Login());

    $oViewRenderer->AddSourceObject('sSpotName', $oExtranet->fieldExtranetSpotName);
    $oViewRenderer->AddSourceObject('sMessageConsumer', $this->aTemplateData['sSpotName'].'_in_login');
    $oViewRenderer->AddSourceObject('sLoginSuccessURL', $oStep->GetNextStep()->GetStepURL());
    $oViewRenderer->AddSourceObject('sTitle', $sTitle);
    $oViewRenderer->AddSourceObject('sText', $sText);
    $oViewRenderer->AddSourceObject('sRegisterLinkTitle', '');
    $oViewRenderer->AddSourceObject('sForgetPasswordLinkTitle', \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.forgot_password'));

    $spot1 = $oViewRenderer->Render('/common/userInput/form/formLoginLabelOnTop.html.twig');

    // REGISTER

    $oViewRenderer2 = new ViewRenderer();
    $oRegisterText = TdbPkgCmsTextBlock::GetInstanceFromSystemName('shop_basket_step_user_register');
    if (is_null($oRegisterText)) {
        $sTitle = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.new_customer_headline');
        $sText = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.new_customer_help');
    } else {
        $sTitle = $oRegisterText->fieldName;
        $sText = $oRegisterText->GetTextField('content');
    }
    $oViewRenderer2->AddSourceObject('sTitle', $sTitle);
    $oViewRenderer2->AddSourceObject('sText', $sText);

    $oFormRenderer = new ViewRenderer();
    $oFormRenderer->AddSourceObject('sName', 'register');
    $oFormRenderer->AddSourceObject('sSpotName', $this->aTemplateData['sSpotName']);
    $oFormRenderer->AddSourceObject('sFunction', 'ExecuteStep');
    $oFormRenderer->AddSourceObject('aValues', array(
        array(
            'sName' => 'umode',
            'sValue' => 'register',
        ),
    ));
    $oFormRenderer->AddSourceObject('sSubmitTitle', \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.action_register'));
    $sForm = $oFormRenderer->Render('/common/userInput/form/simpleFormWrapper.html.twig');

    $oViewRenderer2->AddSourceObject('aSecondLink', array('html' => $sForm));

    $spot2 = $oViewRenderer2->Render('/common/textBlock/textBlockSmallHeadline.html.twig');

    // GUEST

    $oViewRenderer3 = new ViewRenderer();
    $oRegisterGuestText = TdbPkgCmsTextBlock::GetInstanceFromSystemName('shop_basket_step_user_register_guest');
    if (is_null($oRegisterGuestText)) {
        $sTitle = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.guest_headline');
        $sText = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.guest_help');
    } else {
        $sTitle = $oRegisterGuestText->fieldName;
        $sText = $oRegisterGuestText->GetTextField('content');
    }
    $oViewRenderer3->AddSourceObject('sTitle', $sTitle);
    $oViewRenderer3->AddSourceObject('sText', $sText);

    $oFormRenderer2 = new ViewRenderer();
    $oFormRenderer2->AddSourceObject('sName', 'guest');
    $oFormRenderer2->AddSourceObject('sSpotName', $this->aTemplateData['sSpotName']);
    $oFormRenderer2->AddSourceObject('sFunction', 'ExecuteStep');
    $oFormRenderer2->AddSourceObject('aValues', array(
        array(
            'sName' => 'umode',
            'sValue' => 'guest',
        ),
    ));
    $oFormRenderer2->AddSourceObject('sSubmitTitle', \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.action_continue_as_guest'));
    $sForm2 = $oFormRenderer2->Render('/common/userInput/form/simpleFormWrapper.html.twig');

    $oViewRenderer3->AddSourceObject('aSecondLink', array('html' => $sForm2));
    $spot3 = $oViewRenderer3->Render('/common/textBlock/textBlockSmallHeadline.html.twig');

    // TELEPHONE ORDER
    $oViewRenderer4 = new ViewRenderer();
    $oTelephoneText = TdbPkgCmsTextBlock::GetInstanceFromSystemName('shop_basket_step_user_telephone');
    if (is_null($oTelephoneText)) {
        $sTitle = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.telefon_order_headline');
        $sText = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order_login.telefon_order_help');
    } else {
        $sTitle = $oTelephoneText->fieldName;
        $sText = $oTelephoneText->GetTextField('content');
    }
    $oViewRenderer4->AddSourceObject('sName', 'phone');
    $oViewRenderer4->AddMapper(new TPkgShopBasketMapper_TelephoneOrderForm());
    $oViewRenderer4->AddSourceObject('sSpotName', $this->aTemplateData['sSpotName']);
    $oViewRenderer4->AddSourceObject('sTitle', $sTitle);
    $oViewRenderer4->AddSourceObject('sText', $sText);
    $spot4 = $oViewRenderer4->Render('/common/userInput/form/formTelphoneOrder.html.twig');

    $oViewRenderer5 = new ViewRenderer();

    $oViewRenderer = new ViewRenderer();
    $oViewRenderer->AddSourceObject('spot1', $spot1);
    $oViewRenderer->AddSourceObject('spot2', $spot2);
    $oViewRenderer->AddSourceObject('spot3', $spot3);
    $oViewRenderer->AddSourceObject('spot4', $spot4);

    echo $oViewRenderer->Render('/pkgShop/OrderSteps/loginOptionsRow.html.twig');
