<?php

$oDummy = new TPkgViewRendererSnippetDummyData();
$oDummy->addDummyDataFromFile('/common/userInput/address/shipping.dummy.php');

$oDummy->addDummyData('aFieldLogin', array(
                                       'sValue' => 'somename',
                                       'sError' => 'invalid user name',
                                    ));

return $oDummy;
