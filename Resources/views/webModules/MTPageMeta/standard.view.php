<title><?=TGlobal::OutHTML($data['sTitle']); ?></title>
<?php
if ($sCanonical) {
    ?><link rel="canonical" href="<?=$sCanonical; ?>" /><?php
}
foreach ($data['aMetaData'] as $metaType => $metaData) {
    if (!is_array($metaData)) {
        if (!empty($metaData)) {
            echo '<meta '.TGlobal::OutHTML($metaType).'="'.TGlobal::OutHTML($metaData)."\" />\n";
        }
    } else {
        foreach ($metaData as $key => $content) {
            if ('http-equiv' != $metaType) {
                $content = TGlobal::OutHTML($content);
            }
            if (!empty($content)) {
                echo '<meta '.TGlobal::OutHTML($metaType).'="'.TGlobal::OutHTML($key).'" content="'.$content."\" />\n";
            }
        }
    }
}

foreach ($data['language-alternatives'] as $iso => $url) {
    echo sprintf('<link rel="alternate" href="%s" hreflang="%s"/>', $url, $iso);
}

if (!empty($data['sCustomHeaderData'])) {
    echo $data['sCustomHeaderData'];
}
?>
