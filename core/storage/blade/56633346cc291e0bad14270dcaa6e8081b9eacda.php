<!-- Miscellaneous settings -->
<div class="tab-page" id="tabPage7">
    <h2 class="tab"><?php echo e(ManagerTheme::getLexicon('settings_misc')); ?></h2>
    <script type="text/javascript">tpSettings.addTabPage(document.getElementById('tabPage7'));</script>
    <div class="container container-body">

        <?php echo $__env->make('manager::form.row', [
            'label' => ManagerTheme::getLexicon('filemanager_path_title'),
            'small' => '[(filemanager_path)]',
            'for' => 'filemanager_path',
            'element' => ManagerTheme::getLexicon('default') . '
                <span id="default_filemanager_path">[(base_path)]</span><br>
                <div class="input-group">' .
                    ManagerTheme::view('form.inputElement', [
                        'name' => 'filemanager_path',
                        'value' => $settings['filemanager_path'],
                        'attributes' => 'onChange="documentDirty=true;" maxlength="255"'
                    ]) .
                    '<div class="input-group-btn">' .
                        ManagerTheme::view('form.inputElement', [
                            'type' => 'button',
                            'name' => 'reset_filemanager_path',
                            'value' => ManagerTheme::getLexicon('reset'),
                            'attributes' => 'onclick="reset_path(\'filemanager_path\');"'
                        ]) .
                    '</div>
                </div>',
            'comment' => ManagerTheme::getLexicon('filemanager_path_message')
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="split my-1"></div>

        <?php echo $__env->make('manager::form.input', [
            'name' => 'upload_files',
            'label' => ManagerTheme::getLexicon('uploadable_files_title'),
            'small' => '[(upload_files)]',
            'value' => $settings['upload_files'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => ManagerTheme::getLexicon('uploadable_files_message')
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="split my-1"></div>

        <?php echo $__env->make('manager::form.input', [
            'name' => 'upload_images',
            'label' => ManagerTheme::getLexicon('uploadable_images_title'),
            'small' => '[(upload_images)]',
            'value' => $settings['upload_images'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => ManagerTheme::getLexicon('uploadable_images_message')
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="split my-1"></div>

        <?php echo $__env->make('manager::form.input', [
            'name' => 'upload_media',
            'label' => ManagerTheme::getLexicon('uploadable_media_title'),
            'small' => '[(upload_media)]',
            'value' => $settings['upload_media'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => ManagerTheme::getLexicon('uploadable_media_message')
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="split my-1"></div>

        <?php echo $__env->make('manager::form.input', [
            'name' => 'upload_maxsize',
            'label' => ManagerTheme::getLexicon('upload_maxsize_title'),
            'small' => '[(upload_maxsize)]',
            'value' => $settings['upload_maxsize'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => ManagerTheme::getLexicon('upload_maxsize_message')
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="split my-1"></div>

        <?php echo $__env->make('manager::form.input', [
            'name' => 'new_file_permissions',
            'label' => ManagerTheme::getLexicon('new_file_permissions_title'),
            'small' => '[(new_file_permissions)]',
            'value' => $settings['new_file_permissions'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="4"',
            'comment' => ManagerTheme::getLexicon('new_file_permissions_message')
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="split my-1"></div>

        <?php echo $__env->make('manager::form.input', [
            'name' => 'new_folder_permissions',
            'label' => ManagerTheme::getLexicon('new_folder_permissions_title'),
            'small' => '[(new_folder_permissions)]',
            'value' => $settings['new_folder_permissions'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="4"',
            'comment' => ManagerTheme::getLexicon('new_folder_permissions_message')
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="split my-1"></div>

        <?php echo get_by_key($tabEvents, 'OnFileManagerSettingsRender'); ?>

    </div>
</div>

<?php /**PATH /var/www/html/manager//views//page/system_settings/file_manager.blade.php ENDPATH**/ ?>