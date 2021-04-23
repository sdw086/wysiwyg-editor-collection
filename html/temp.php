<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>

<ul class="nav nav-tabs">
    <?php foreach ($EDITOR_NAME as $editor) { ?>
    <li role="presentation" class="active"><a href="#"><?=$editor?></a></li>
    <?php } ?>
</ul>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.css">
<link rel="stylesheet" href="https://uicdn.toast.com/editor/2.0.0/toastui-editor.min.css">
<div class="tui-doc-description">
    <h3>Toast UI Editor 2.0.0 Test</h3>
    <h2>설치와 기본기능 사용</h2>
</div>

<div id="editor" style="box-sizing: border-box; height: 500px;"></div>
<br>
<button onclick="ToView();">↓↓↓ 불러서 넣기 ↓↓↓</button>
<br>

<div id="viewer"></div>

<script src="https://uicdn.toast.com/editor/2.0.0/toastui-editor-all.min.js"></script>

<script>
    /* eslint-disable no-unused-vars */
    const content = [].join('\n');

    const editor = new toastui.Editor({
        el: document.querySelector('#editor'),
        previewStyle: 'vertical',
        initialEditType: "wysiwyg",
        height: '500px',
        initialValue: content
    });

    const viewer = toastui.Editor.factory({
        el: document.querySelector('#viewer'),
        viewer: true,
        height: '500px',
        initialValue: content
    });

    function ToView() {
        viewer.setMarkdown(editor.getMarkdown());
    };
</script>

<ul class="nav nav-tabs">
  <li role="presentation"><a href="#">Home</a></li>
  <li role="presentation" class="active"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
</ul>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/down.php';
?>