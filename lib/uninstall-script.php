<?php
$sql = "DROP TABLE " . captcha_bank_settings();
$wpdb->query($sql);

$sql = "DROP TABLE " . captcha_bank_licensing();
$wpdb->query($sql);

$sql = "DROP TABLE " . captcha_bank_log();
$wpdb->query($sql);

$sql = "DROP TABLE " . captcha_bank_block_single_ip();
$wpdb->query($sql);

$sql = "DROP TABLE " . captcha_bank_block_range_ip();
$wpdb->query($sql);

$sql = "DROP TABLE " . captcha_bank_plugin_settings();
$wpdb->query($sql);

delete_option("captcha-bank-version-number");
delete_option("captcha-bank-activation");
delete_option("captcha-bank-updation-check-url");
?>
