Chameleon System ChameleonShopThemeBundle
=========================================

The default theme for Chameleon based on Bootstrap 3.

Installation
------------

Step 1: Download the Bundle
~~~~~~~~~~~~~~~~~~~~~~~~~~~

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

.. code-block:: bash

    $ composer require chameleon-system/chameleon-shop-theme-bundle "~6.2"

This command requires you to have Composer installed globally, as explained
in the `installation chapter`_ of the Composer documentation.
Be sure to adjust the version information "~6.2" to the actual version you need.

Step 2: Enable the Bundle
~~~~~~~~~~~~~~~~~~~~~~~~~

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

.. code-block:: php

    <?php
    // app/AppKernel.php

    // ...

    public function registerBundles()
    {
        $bundles = [
            // ...
            new \ChameleonSystem\ChameleonShopThemeBundle\ChameleonSystemChameleonShopThemeBundle(),
        ];
    }

Then run updates in the Chameleon backend.

Step 3: Configure the Bundle
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

To use this bundle in a backend-configured theme, do the following:

- Add `@ChameleonSystemChameleonShopThemeBundle/Resources/views` to the snippet chain (after `@ChameleonSystemCoreBundle/Resources/views`).
- If upgrading from the older standard theme: Remove the old snippet chain entry pointing to themeshopstandard.
- Remove the snippet chain path to "pkgshoppaymentamazon" / "@ChameleonSystemAmazonPaymentBundle" from your themes.
  The twig templates are included in the theme now converted to Bootstrap3.
- In `/app/config/config.inc.php`, set these constants:
  - CHAMELEON_URL_GOOGLE_JQUERY = 'https://code.jquery.com/jquery-3.3.1.min.js'
  - CHAMELEON_URL_JQUERY = '/bundles/chameleonsystemchameleonshoptheme/js/jquery/jquery-3.3.1.min.js'
- On page "last seen / Zuletzt gesehen", change the module template for the product list module from "full" to "fullWide".
- On page "login", move the login module to spot "primary".
- If the project overrides `/common/navigation/config.yml`, add this line: '- /bundles/chameleonsystemchameleonshoptheme/snippets/common/navigation/navigationDesktop.js'.
- If upgrading from the older standard theme, search for paths starting with `/assets/chameleon-standard-shop-assets/`
  in the file base and replace this path prefix with `/bundles/chameleonsystemchameleonshoptheme/`.

Quick-shopping
--------------

Set the constant SHOP_DISABLE_QUICK_SHOP to true in order to deactivate quick-shopping in product teasers.

Double-Click Prevention
-----------------------

Any POST forms not marked with the CSS class 'chameleon-allow-double-click' will be prevented from being submitted more
than once using JavaScript bound to the submit event.

Note: The method does not disable the submit/reset buttons because there are known problems with IE and Firefox
(IE does not submit the form, Firefox will remember the state of the button when the user returns to the page using
the browser's back button).

.. _`installation chapter`: https://getcomposer.org/doc/00-intro.md
