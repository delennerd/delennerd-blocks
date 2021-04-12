<?php
/**
 * Update Checker
 * 
 * @package delennerd-blocks
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// require_once DLM_BLOCKS_PATH . '/plugin-update-checker/plugin-update-checker.php';

$dlmUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/delennerd/delennerd-blocks',
	DLM_BLOCKS_PATH . '/delennerd-blocks.php',
	'delennerd-blocks'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('stable-branch-name');