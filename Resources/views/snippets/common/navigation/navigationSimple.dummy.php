<?php

for ($i = 65; $i <= 90; ++$i) {
    $sLetter = chr($i);
    $aTreeItem = array('bIsActive' => false,
                       'bIsExpanded' => false,
                       'sLink' => '#test',
                       'sTitle' => $sLetter, );
    $aTree[] = $aTreeItem;
}
    $aTree[0]['bIsActive'] = true;

return array('aTree' => $aTree);
