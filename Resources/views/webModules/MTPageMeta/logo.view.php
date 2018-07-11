<a href="<?=TGlobal::OutHTML($oPortalHomeNode->GetLink()); ?>" title="<?=TGlobal::OutHTML($sPortalName); ?>">
    <?php
    /** @var TCMSIMage $oPortalLogo */
    $thumb = $oPortalLogo->GetThumbnail($oPortalLogo->aData['width']);
    ?>
    <img class="img-responsive" src="<?=TGlobal::OutHTML($thumb->GetFullURL()); ?>" title="<?=TGlobal::OutHTML($sPortalName); ?>" alt="<?=TGlobal::OutHTML($sPortalName); ?>" width="280" />
</a>