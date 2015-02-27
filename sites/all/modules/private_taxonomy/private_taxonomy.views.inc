<?php

/**
 * @file
 * Integration of Private Taxonomy with Views.
 */

/**
 * Implements hook_views_data().
 */
function private_taxonomy_views_data() {
  $data['user_term'] = array(
    'table' => array(
      'group' => t('Taxonomy term'),
      'join' => array(
        'taxonomy_term_data' => array(
          'left_field' => 'tid',
          'field' => 'tid',
        ),
      ),
    ),
  );
  $data['user_term']['uid'] = array(
    'title' => t('Current user'),
    'help' => t('Filter the terms for the current user.'),
  );
  $data['user_term']['uid']['filter'] = array(
    'handler' => 'views_handler_filter_user_current',
  );

  return $data;
}
