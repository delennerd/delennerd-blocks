<?php
/**
 * Update Checker
 * 
 * @package delennerd-blocks
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$delennedBlocksUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/delennerd/delennerd-blocks',
	DLM_BLOCKS_PATH . '/delennerd-blocks.php',
	'delennerd-blocks'
);

$delennedBlocksUpdateChecker->setBranch('master');
$delennedBlocksUpdateChecker->getVcsApi()->enableReleaseAssets();