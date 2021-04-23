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
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
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