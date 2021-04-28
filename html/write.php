<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>
<div class="page-header">
    <h2>wysiwyg editor write</h2>
</div>
<div class="container-fluid">
    <div class="margin-10px-top"></div>
    <ul class="nav nav-tabs" id="ckeditor">
        <?php foreach ($EDITOR_NAME as $k => $editor) { 
            $active = ($k == 0) ? "active" : "";
        ?>
        <li role="presentation" class="<?=$active?>"><a href="#<?=$editor?>"><?=$editor?></a></li>
        <?php } ?>
    </ul>
    <!-- editor layout-->
    <div class="tui-doc-description" >
        <h3>ckeditor5 Test</h3>
        <ul>
            <li>language : 62</li>
        </ul>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <!-- 언어 설정부 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/translations/ko.js"></script>
    <!-- //언어 설정부 -->
    <div id="ck_editor"></div>
    <script>
    ClassicEditor
        .create( document.querySelector( '#ck_editor' ) , {
            language:'ko'
        })
        .then( editor => {
            editoro = editor;
            editor.plugins.get("FileRepository").createUploadAdapter = function (loader) {
                return new CustomUploadAdapter(loader, "/images/board/press", function (result) {
                    var fileSeq = isEmpty(result[0]) ? "noimage" : result[0];
                    var imageUrl = window.location.protocol + "//" + window.location.host + "/image/" + fileSeq;
                    return {"default" : imageUrl};
                });
            };
        } )
        .catch( error => {
                console.error( error );
        } );

    var CustomUploadAdapter = function (loader, path, fn_resolve) {
        this.constructor = function ( loader ) {
            this.loader = loader;
            this.path = path;
            this.fn_resolve = fn_resolve;
        };
        this.upload = function () {
            return new Promise(function (resolve, reject) {
                this.xhr = ajax_file_upload({
                    loader: loader,
                    resolve: resolve,
                    reject: reject,
                    files: [loader.file],
                    path: path,
                    fn_progress: function (e) {
                        e.lengthComputable && (loader.uploadTotal = e.total, loader.uploaded = e.loaded);
                    },
                    fn_success: function (e) {
                        resolve(fn_resolve && fn_resolve(e));
                    },
                    fn_error: function (e) {
                        reject("upload fail =>" + `${loader.file.name}.`);
                    },
                    fn_abort: reject
                });
            });
        };
        this.abort = function () {
            return this.xhr.abort && this.xhr.abort();
        }
    };

    function ajax_file_upload(p) {		

if (!p.files || !p.loader || !p.path) return new XMLHttpRequest;		

var formData = new FormData();

for (var idx in p.files) {

    formData.append("uploadfile", p.files[idx]);

}

formData.append("path", p.path);		

return $.ajax({

    url: '/upload',

    processData: false,

    contentType: false,

    data: formData,

    type: 'POST',

    onprogress: function (e) {

        p.fn_progress && p.fn_progress(e);

    },

    success: function(e){

        p.fn_success && p.fn_success(e);

    },

    error: function (e) {

        p.fn_error && p.fn_error;

    },

    abort: function (e) {

        p.fn_abort && p.fn_abort(e);

    }

});

}
    </script>

    <div class="margin-10px-top"></div>
    <!-- //editor layout-->

    <ul class="nav nav-tabs" id="toast">
        <?php foreach ($EDITOR_NAME as $k => $editor) { 
            $active = ($k == 1) ? "active" : "";
        ?>
        <li role="presentation" class="<?=$active?>"><a href="#<?=$editor?>"><?=$editor?></a></li>
        <?php } ?>
    </ul>

    <!-- editor layout -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.css">
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/2.0.0/toastui-editor.min.css">
    <div class="tui-doc-description" >
        <h3>Toast UI Editor 2.0.0 Test</h3>
        <ul>
            <li>language : 20</li>
        </ul>
    </div>

    <div id="editor" style="box-sizing: border-box; height: 500px;"></div>

    <script src="https://uicdn.toast.com/editor/2.0.0/toastui-editor-all.min.js"></script>
    <!-- 언어 설정부 -->
    <script src="https://uicdn.toast.com/editor/latest/i18n/ko-kr.js"></script>
    <!-- //언어 설정부 -->

    <script>
        /* eslint-disable no-unused-vars */
        const content = [].join('\n');
        const editor = new toastui.Editor({
            el: document.querySelector('#editor'),
            initialEditType: "wysiwyg",
            height: '500px',
            initialValue: content,
            language : 'ko'
        });
    </script>

    <div class="margin-10px-top"></div>
    <!-- //editor layout -->

    <ul class="nav nav-tabs" id="froala">
        <?php foreach ($EDITOR_NAME as $k => $editor) { 
            $active = ($k == 2) ? "active" : "";
        ?>
        <li role="presentation" class="<?=$active?>"><a href="#<?=$editor?>"><?=$editor?></a></li>
        <?php } ?>
    </ul>

    <!-- editor layout -->
    <div class="tui-doc-description">
        <h3>Froala Test</h3>
        <ul>
            <li>language : 39</li>
        </ul>
    </div>

    <link href='https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/js/froala_editor.pkgd.min.js'></script>
    <!-- 언어 설정부-->
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.6/js/languages/ko.min.js'></script>
    <!-- //언어 설정부-->

    <div id="froala-editor"></div>
    <script>
        new FroalaEditor('#froala-editor',{
            height : 500,
            language: 'ko'
        });
    </script>
    <div class="margin-10px-top"></div>
    <!-- //editor layout -->
    
    <!-- fix button-->
    <button type="button" class="btn btn-default" id="fixedbtn">
        <span class="glyphicon glyphicon-floppy-save btn-lg" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-default" id="fixedbtn_back">
        <span class="glyphicon glyphicon-arrow-left btn-lg" aria-hidden="true"></span>
    </button>
</div>
<script>
    $(function() {
        // back
        $(document).on("click", "#fixedbtn_back", function() {
            location.replace('/');
        });
        // save
        $(document).on("click", "#fixedbtn", function() {
            // 에디터 내용 save

        });
    });
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/down.php';
?>