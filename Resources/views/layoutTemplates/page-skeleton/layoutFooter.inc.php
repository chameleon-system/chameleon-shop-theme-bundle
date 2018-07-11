                </div>
            </div>
        </div>
        <div id="footercontainer">
            <div class="container"><i class="i i-white-nose-transparent-down">&nbsp;</i>

<?php
    if (!empty($sFooterFile)) {
        include __DIR__.'/../'.$sFooterFile;
    }
?>
            </div>
        </div>
        <!--#CMSFOOTERCODE#-->
        <?php
            $modules->GetModule('viewTracker');
        ?>
    </body>
</html>