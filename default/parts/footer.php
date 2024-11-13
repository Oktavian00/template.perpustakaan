<?php
# @Author: Waris Agung Widodo <user>
# @Date:   2018-01-23T11:26:05+07:00
# @Email:  ido.alit@gmail.com
# @Filename: footer.php
# @Last modified by:   user
# @Last modified time: 2018-01-23T11:26:47+07:00
?>


<footer class="py-4 bg-grey-darkest text-grey-lighter">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-3">
              <?php
              if(isset($sysconf['logo_image']) && $sysconf['logo_image'] != '' && file_exists('images/default/'.$sysconf['logo_image'])){
                echo '<img class="h-16 mb-2" src="images/default/'.v($sysconf['logo_image']).'">';
                }
              elseif (file_exists(__DIR__ . '/../assets/images/logo.png')) {
                echo '<img class="h-12 w-12 mb-2" src="' . assets(v('images/logo.png')) . '">';
              } else {
                ?>
                
              <?php } ?>
                <div class="mb-4"><h5>Rsup Ratatotok Buyat</h5></div>
                <ul class="list-reset">
                    <li><a class="text-light" href="index.php?p=libinfo"><?= __('Information'); ?></a></li>
                    <li><a class="text-light" href="index.php?p=services"><?= __('Services'); ?></a></li>
                    <li><a class="text-light" href="index.php?p=librarian"><?= __('Librarian'); ?></a></li>
                    <li><a class="text-light" href="index.php?p=member"><?= __('Member Area'); ?></a></li>
                </ul>
            </div>
            <div class="col-md-5 pt-8 md:pt-0">
                <h4 class="mb-4"><?= __('About Us'); ?></h4>
                <p>
                    <?= $sysconf['template']['classic_footer_about_us']; ?>
                </p>
            </div>
            <div class="col-md-4 pt-8 md:pt-0">
                <h4 class="mb-4"><?= __('Search'); ?></h4>
                <div class="mb-2"><?= __('start it by typing one or more keywords for title, author or subject'); ?></div>
                <form action="index.php">
                    <input type="hidden" ref="csrf_token" value="<?= $_SESSION['csrf_token']??'' ?>">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']??'' ?>">
                    <div class="input-group mb-3">
                        <input name="keywords" type="text" class="form-control"
                               placeholder="<?= __('Enter keywords'); ?>"
                               aria-label="Enter keywords"
                               aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" value="search" name="search"
                                    id="button-addon2"><?= __('Find Collection'); ?>
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
                <a target="_blank" title="Support Us" class="btn btn-outline-success mb-2"
                   href="https://slims.web.id/web/pages/support-us/"><i
                            class="fas fa-heart mr-2"></i><?= __('Keep SLiMS Alive'); ?></a>
                <a target="_blank" title="Contribute" class="btn btn-outline-light mb-2"
                   href="https://github.com/slims/"><i
                            class="fab fa-github mr-2"></i><?= __('Want to Contribute?'); ?></a>
            </div>
        </div>
        <hr>
        <div class="flex font-thin text-sm">
            <p class="flex-1">&copy; <?php echo date('Y'); ?> &mdash; Rumah Sakit Ratatotok Buyat</p>
            <div class="flex-1 text-right text-grey"><?= __('Powered by '); ?><code>SLiMS</code></div>
        </div>
    </div>
</footer>

<?php if ($sysconf['chat_system']['enabled'] && $sysconf['chat_system']['opac']) : ?>
    <div id="show-pchat2" style="position: fixed; bottom: 16px; right: 16px" class="shadow rounded">
        <button title="Chat" class="btn btn-primary"><i class="fas fa-comments mr-2"></i><?= __('Chat'); ?></button>
    </div>
<?php endif; ?>

<?php
// Chat Engine
include LIB . "contents/chat.php"; ?>

<!-- // Load modal -->
<?php include "_modal_topic.php"; ?>
<?php include "_modal_advanced.php"; ?>
<?php include "_modal_social_media.php"; ?>

<!-- // Load highlight -->
<script src="<?= JWB; ?>highlight.js"></script>
<?php if(isset($engine) && $searchableInJsArray = $this->generateKeywords($engine->searchable_fields)) : ?>
<script>
  $('.card-body > *').highlight(<?= $searchableInJsArray ?>);
</script>
<?php endif; ?>

<!-- // load our vue app.js -->
<script src="<?php echo assets(v('js/app.js')); ?>"></script>
<script src="<?php echo assets(v('js/app_jquery.js')); ?>"></script>
<?php include __DIR__ . "/../assets/js/vegas.js.php"; ?>
<?php if ($sysconf['chat_system']['enabled'] && $sysconf['chat_system']['opac']) : ?>
    <script>
        $('#show-pchat').click(() => {
            $('.s-chat').hide()
            $('#show-pchat2').show()
        })
        $('#show-pchat2').click(() => {
            $('.s-chat').show(300, () => {
                $('#show-pchat2').hide()
            })
        })
    </script>
<?php endif; ?>
</body>
</html>
