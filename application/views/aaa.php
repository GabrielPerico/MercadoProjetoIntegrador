<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? ' <div class="alert alert-danger" role="alert">' . $mensagem . '</div>' : '');
?>
<div class="container my-5 pt-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded-0 shadow-lg">
                <div class="card-header bg-nav text-center text-white">
                    <h3 class="mb-0">Adicionar Imagens</h3>
                </div>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
                <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
                <link rel="stylesheet" href="<?= base_url('plugins/blueimp/css/jquery.fileupload.css') ?>">
                <link rel="stylesheet" href="<?= base_url('plugins/blueimp/css/jquery.fileupload-ui.css') ?>">
                <h1 id="qunit-header">jQuery File Upload Plugin Test</h1>
                <h2 id="qunit-banner"></h2>
                <div id="qunit-testrunner-toolbar"></div>
                <h2 id="qunit-userAgent"></h2>
                <ol id="qunit-tests"></ol>
                <div id="qunit-fixture">
                    <!-- The file upload form used as target for the file upload widget -->
                    <form id="fileupload" action="<?= base_url('fileupload/index') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row fileupload-buttonbar">
                            <div class="col-lg-7">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Add files...</span>
                                    <input type="file" name="files[]" multiple>
                                </span>
                                <button type="submit" class="btn btn-primary start">
                                    <i class="glyphicon glyphicon-upload"></i>
                                    <span>Start upload</span>
                                </button>
                                <button type="reset" class="btn btn-warning cancel">
                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                    <span>Cancel upload</span>
                                </button>
                                <button type="button" class="btn btn-danger delete">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    <span>Delete</span>
                                </button>
                                <input type="checkbox" class="toggle">
                                <!-- The global file processing state -->
                                <span class="fileupload-process"></span>
                            </div>
                            <!-- The global progress state -->
                            <div class="col-lg-5 fileupload-progress fade">
                                <!-- The global progress bar -->
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                </div>
                                <!-- The extended global progress state -->
                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>
                        <!-- The table listing the files available for upload/download -->
                        <table role="presentation" class="table table-striped">
                            <tbody class="files"></tbody>
                        </table>
                    </form>
                </div>
                <!-- The template to display files available for upload -->
                <!-- The blueimp Gallery widget -->
                <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                    <div class="slides"></div>
                    <h3 class="title"></h3>
                    <a class="prev">‹</a>
                    <a class="next">›</a>
                    <a class="close">×</a>
                    <a class="play-pause"></a>
                    <ol class="indicator"></ol>
                </div>
                <!-- The template to display files available for upload -->
                <script id="template-upload" type="text/x-tmpl">
                    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            {% if (window.innerWidth > 480 || !o.options.loadImageFileTypes.test(file.type)) { %}
                <p class="name">{%=file.name%}</p>
            {% } %}
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
                <!-- The template to display files available for download -->
                <script id="template-download" type="text/x-tmpl">
                    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            {% if (window.innerWidth > 480 || !file.thumbnailUrl) { %}
                <p class="name">
                    {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                        <span>{%=file.name%}</span>
                    {% } %}
                </p>
            {% } %}
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
                <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
                <script src="<?= base_url('plugins/blueimp/js/vendor/jquery.ui.widget.js') ?>"></script>
                <!-- The Templates plugin is included to render the upload/download listings -->
                <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
                <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
                <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
                <!-- The Canvas to Blob plugin is included for image resizing functionality -->
                <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
                <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
                <!-- blueimp Gallery script -->
                <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
                <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
                <script src="<?= base_url('plugins/blueimp/js/jquery.iframe-transport.js') ?>"></script>
                <!-- The basic File Upload plugin -->
                <script src="<?= base_url('plugins/blueimp/js/jquery.fileupload.js') ?>"></script>
                <!-- The File Upload processing plugin -->
                <script src="<?= base_url('plugins/blueimp/js/jquery.fileupload-process.js') ?>"></script>
                <!-- The File Upload image preview & resize plugin -->
                <script src="<?= base_url('plugins/blueimp/js/jquery.fileupload-image.js') ?>"></script>
                <!-- The File Upload audio preview plugin -->
                <script src="<?= base_url('plugins/blueimp/js/jquery.fileupload-audio.js') ?>"></script>
                <!-- The File Upload video preview plugin -->
                <script src="<?= base_url('plugins/blueimp/js/jquery.fileupload-video.js') ?>"></script>
                <!-- The File Upload validation plugin -->
                <script src="<?= base_url('plugins/blueimp/js/jquery.fileupload-validate.js') ?>"></script>
                <!-- The File Upload user interface plugin -->
                <script src="<?= base_url('plugins/blueimp/js/jquery.fileupload-ui.js') ?>"></script>
                <!-- The main application script -->
                <script src="<?= base_url('plugins/blueimp/js/main.js') ?>"></script>

                </html>
            </div>
        </div>
    </div>
</div>