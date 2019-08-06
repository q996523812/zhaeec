<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

// Encore\Admin\Form::forget(['map', 'editor']);
Encore\Admin\Form::forget(['map']);


// Admin::js('/js/app.js');
Admin::js('/js/distpicker.data.js?a='.rand(1000,9999));
Admin::js('/js/distpicker.js?a='.rand(1000,9999));
Admin::js('/js/selects.data.js?a='.rand(1000,9999));
Admin::js('/js/selects.js?a='.rand(1000,9999));
Admin::css('/css/admin_project.css?a='.rand(1000,9999));
Admin::js('/js/checkbox.data.js?a='.rand(1000,9999));
Admin::js('/js/checkbox.js?a='.rand(1000,9999));
// Admin::js('/resources/js/admin_project.js');