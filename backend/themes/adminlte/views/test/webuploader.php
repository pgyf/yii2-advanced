<?php
    //$this->params['body-class'] = '';
?>
<link rel="stylesheet" type="text/css" href="/webuploader/ex_src/css/webuploader.css" />
<link rel="stylesheet" type="text/css" href="/webuploader/ex_src/css/style.css" />
https://github.com/fex-team/webuploader/issues/142
  <div id="wrapper">
        <div id="container">
            <!--头部，相册选择和格式选择-->

            <div id="uploader">
                <div class="queueList">
                    <div id="dndArea" class="placeholder">
                        <div id="filePicker"></div>
                        <p>或将照片拖到这里，单次最多可选300张</p>
                    </div>
                </div>
                <div class="statusBar" style="display:none;">
                    <div class="progress">
                        <span class="text">0%</span>
                        <span class="percentage"></span>
                    </div><div class="info"></div>
                    <div class="btns">
                        <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $this->beginBlock('block_footer') ?>
<script type="text/javascript" src="/webuploader/ex_src/js/webuploader.js"></script>
<script type="text/javascript" src="/webuploader/ex_src/js/md5.js"></script>
<script type="text/javascript" src="/webuploader/ex_src/js/jquery.cookie.js"></script>
 <script type="text/javascript" src="/webuploader/ex_src/js/upload.js"></script>
<?php $this->endBlock(); ?>