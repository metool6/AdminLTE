<?php
/* Pi-hole: A black hole for Internet advertisements
*  (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*  Network-wide ad blocking via your own hardware.
*
*  This file is copyright under the latest version of the EUPL.
*  Please see LICENSE file for your rights under this license. */ ?>

        </section>
        <!-- /.content -->
    </div>
    <!-- Modal for custom disable time -->
    <div class="modal fade" id="customDisableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Custom disable timeout</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <input id="customTimeout" class="form-control" type="number" value="60">
                            <div class="input-group-btn" data-toggle="buttons">
                                <label class="btn btn-default">
                                    <input id="selSec" type="radio"> Secs
                                </label>
                                <label id="btnMins" class="btn btn-default active">
                                    <input id="selMin" type="radio"> Mins
                                </label>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="pihole-disable-custom" class="btn btn-primary" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div> <!-- /.content-wrapper -->

<?php
    // Flushes the system write buffers of PHP. This attempts to push everything we have so far all the way to the client's browser.
    flush();
    // Run update checker
    //  - determines local branch each time,
    //  - determines local and remote version every 30 minutes
    require "scripts/pi-hole/php/update_checker.php";

    $coreVersionStr = $core_current . (isset($core_commit) ? " (" . $core_branch . ", " . $core_commit . ")" : "");
    $webVersionStr = $web_current . (isset($web_commit) ? " (" . $web_branch . ", " . $web_commit . ")" : "");
    $ftlVersionStr = $FTL_current . (isset($FTL_commit) ? " (" . $FTL_branch . ", " . $FTL_commit . ")" : "");

    $githubBaseUrl = "https://github.com/pi-hole";
    $coreUrl = $githubBaseUrl . "/pi-hole";
    $webUrl = $githubBaseUrl . "/AdminLTE";
    $ftlUrl = $githubBaseUrl . "/FTL";

    $coreReleasesUrl = $coreUrl . "/releases";
    $webReleasesUrl = $webUrl . "/releases";
    $ftlReleasesUrl = $ftlUrl . "/releases";
?>
    <footer class="main-footer">
        <div class="row row-centered text-center">
            <div class="col-xs-12 col-sm-6">
                <strong><a href="https://pi-hole.net/donate/" rel="noopener" target="_blank"><i class="fa fa-heart text-red"></i> Halt-Ads</a></strong> www.haltads.com                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
            </div>
        </div>  

        <div class="row row-centered text-center version-info">
            <div class="col-xs-12 col-sm-8 col-md-6">
                <?php if (isset($core_commit) || isset($web_commit) || isset($FTL_commit)) { ?>
                <ul class="list-unstyled">
                    <li><strong>Pi-hole</strong> <?php echo $coreVersionStr; ?></li>
                    <li><strong>Web Interface</strong> <?php echo $webVersionStr; ?></li>
                    <li><strong>FTL</strong> <?php echo $ftlVersionStr; ?></li>
                </ul>
                <?php } else { ?>
                <ul class="list-inline">
                    <li>
                        <strong>Pi-hole</strong>
                        <a href="<?php echo $coreReleasesUrl . "/" . $core_current; ?>" rel="noopener" target="_blank"><?php echo $core_current; ?></a>
                        <?php if ($core_update) { ?> &middot; <a class="lookatme" href="<?php echo $coreReleasesUrl . "/latest"; ?>" rel="noopener" target="_blank">Update available!</a><?php } ?>
                    </li>
                    <li>
                        <strong>Web Interface</strong>
                        <a href="<?php echo $webReleasesUrl . "/" . $web_current; ?>" rel="noopener" target="_blank"><?php echo $web_current; ?></a>
                        <?php if ($web_update) { ?> &middot; <a class="lookatme" href="<?php echo $webReleasesUrl . "/latest"; ?>" rel="noopener" target="_blank">Update available!</a><?php } ?>
                    </li>
                    <li>
                        <strong>FTL</strong>
                        <a href="<?php echo $ftlReleasesUrl . "/" . $FTL_current; ?>" rel="noopener" target="_blank"><?php echo $FTL_current; ?></a>
                        <?php if ($FTL_update) { ?> &middot; <a class="lookatme" href="<?php echo $ftlReleasesUrl . "/latest"; ?>" rel="noopener" target="_blank">Update available!</a><?php } ?>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </footer>

</div>
<!-- ./wrapper -->
<script src="scripts/pi-hole/js/footer.js?v=<?=$cacheVer?>"></script>
</body>
</html>
