<?php

require_once 'removeassigntoclient.civix.php';

use CRM_Removeassigntoclient_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function removeassigntoclient_civicrm_config(&$config): void {
  _removeassigntoclient_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function removeassigntoclient_civicrm_install(): void {
  _removeassigntoclient_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function removeassigntoclient_civicrm_enable(): void {
  _removeassigntoclient_civix_civicrm_enable();
}


/**
 * 
 * Implements hook_civicrm_links().
 * 
 * Removes the ActionLinks for all Cases. [Case Tab]
 * 
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_links/
 */
function removeassigntoclient_civicrm_links($op, $objectName, $objectId, &$links, &$mask, &$values) {
  // Only modify links for activity listings
  if ($objectName == 'Case') {
    // Now, to remove the Edit button/link
    foreach ($links as $key => $link) {
      // Check for the Edit link by title or any other identifiable attribute
      if (isset($link['title']) && $link['title'] == ts('Assign to Another Client')) {
          unset($links[$key]);
      }
    }
  }
}