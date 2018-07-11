$(document).ready(function () {
    $('.socialSharePrivacy').each(function(){
        var language = $(this).data("language");
        if(language == ""){
            language = "de";
        }
        $(this).socialSharePrivacy({
            'services' : {
                'facebook' : {
                    'dummy_img' : '/bundles/chameleonsystemchameleonshoptheme/snippets/widgets/socialSharePrivacy/images/dummy_facebook.png',
                    'sharer'            : {
                        'status'        : 'off',
                        'dummy_img'     : '/bundles/chameleonsystemchameleonshoptheme/snippets/widgets/socialSharePrivacy/images/dummy_facebook_share_de.png',
                        'img'           : '/bundles/chameleonsystemchameleonshoptheme/snippets/widgets/socialSharePrivacy/images/dummy_facebook_share_active_de.png'
                    }
                },
                'twitter' : {
                    'dummy_img' : '/bundles/chameleonsystemchameleonshoptheme/snippets/widgets/socialSharePrivacy/images/dummy_twitter.png'
                },
                'gplus' : {
                    'dummy_img' : '/bundles/chameleonsystemchameleonshoptheme/snippets/widgets/socialSharePrivacy/images/dummy_gplus.png'
                }
            },
            "css_path"  : "/bundles/chameleonsystemchameleonshoptheme/snippets/widgets/socialSharePrivacy/css/socialshareprivacy.css",
            "lang_path" : "/bundles/chameleonsystemchameleonshoptheme/snippets/widgets/socialSharePrivacy/js/lang/",
            "language"  : language
        });
    });
});
