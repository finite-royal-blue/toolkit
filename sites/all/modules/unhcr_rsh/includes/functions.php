<?php

function db_select_main(){
	$query = db_select('tblluagencies', 't', array('target' => 'my_other_db'))
    ->fields('t', array('id'))
    //->condition('status', 1) //Published.
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAssoc();
	foreach ($query as $key => $value) {
		echo $value;
	}
}
function resolve_agency_name_from_id($agencyid){
	$query = db_select('tblluagencies', 'ta', array('target' => 'my_other_db'))
    ->fields('ta', array('id', 'agency_name', 'acronym'))
    ->condition('id', $agencyid) //Published.
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAssoc('id', PDO::FETCH_ASSOC);
	return $query;
	
}

function resolve_district_name_from_id($district){
	$query = db_select('tblludistrict', 'ta', array('target' => 'my_other_db'))
    ->fields('ta', array('id', 'district_id'))
    ->condition('id', $district) //Published.
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAssoc('id', PDO::FETCH_ASSOC);
	return $query;
	
}
function extend_row($swims_location){
	
}
function process_import_data(){
	
}/*
 * using the second db connection select relevant records
 */
function process_import_taxonomy(){
	$query = db_select('tblluagencies', 't', array('target' => 'my_other_db'))
    ->fields('t', array('id', 'agency_name', 'acronym'))
    //->condition('status', 1) //Published.
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('id', PDO::FETCH_ASSOC);
	return $query;
	
}

function process_import_users(){
	$query = db_select('tblusers', 't', array('target' => 'my_other_db'))
    ->fields('t', array('id', 'username', 'firstname', 'surname', 'jobtitle', 'dutystation', 'email'))
    //->condition('status', 1) //Published.
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('id', PDO::FETCH_ASSOC);
	return $query;
	
}

function extend_user($swimsuid){
	$query = db_select('tblusers', 't', array('target' => 'my_other_db'))
    ->fields('t', array('userid', 'firstname', 'surname'))
    ->condition('userid', $swimsuid) //Published.
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAssoc();
	return $query;
}
function process_import_node(){
	$query = db_select('tbllocation', 'ind', array('target' => 'my_other_db'))
    ->fields('ind')
  	//->condition('source_typeid', '6') //Berkard.
    ->range(0,20)
	//->range(1585,755)
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('locationid', PDO::FETCH_ASSOC);
	return $query;
}

function extend_node_functions($snode){
	$locationid = $snode['locationid'];
	
	$query = db_select('tblfunction_use', 'ind', array('target' => 'my_other_db'))
    ->fields('ind')
    ->condition('locationid', $locationid) //Berkard.
    
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('locationid', PDO::FETCH_ASSOC);
	return $query;
}
function extend_node_generator($snode){
	$locationid = $snode['locationid'];
	$query = db_select('tblgenerator', 'ind', array('target' => 'my_other_db'))
    ->fields('ind')
    ->condition('locationid', $locationid) //Berkard.
    
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('generatorid', PDO::FETCH_ASSOC);
	return $query;
}
function extend_node_waterchar($snode){
	$locationid = $snode['locationid'];
	
	$query = db_select('tblwatercharacteristic', 'ind', array('target' => 'my_other_db'))
    ->fields('ind')
    ->condition('locationid', $locationid) //Berkard.
    
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('locationid', PDO::FETCH_ASSOC);
	return $query;
}
function extend_node_waterchar_s($snodeid){
	//$locationid = $snode['locationid'];

	$query = db_select('tblwatercharacteristic', 'ind', array('target' => 'my_other_db'))
	->fields('ind', array('ecoli', 'locationid'))
	->condition('locationid', $snodeid) //Berkard.

	// ->condition('created', array($start_time, $end_time), 'BETWEEN')
	// ->orderBy('created', 'DESC') //Most recent first.
	->execute()
	->fetchAllAssoc('locationid', PDO::FETCH_ASSOC);
	return $query;
}
function extend_node_supplydist($snode){
	$locationid = $snode['locationid'];
	
	$query = db_select('tblsupplydistribution', 'ind', array('target' => 'my_other_db'))
    ->fields('ind')
    ->condition('locationid', $locationid) //Berkard.
    
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('locationid', PDO::FETCH_ASSOC);
	return $query;
}
function extend_node_srcmgmt($snode){
	$locationid = $snode['locationid'];
	
	$query = db_select('tblsourcemanagement', 'ind', array('target' => 'my_other_db'))
    ->fields('ind')
    ->condition('locationid', $locationid) //Berkard.
    
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('locationid', PDO::FETCH_ASSOC);
	return $query;
}
function extend_last_intervention($locid){
	//$locationid = $node['locationid'];
	//echo $locid;
	$query = db_select('tbllastintervention', 'ind', array('target' => 'my_other_db'))
    ->fields('ind')
  	->condition('locationid', $locid)
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('id', PDO::FETCH_ASSOC);
	//return $query;
	return $query;
}
function extend_intervention($locid){
	/*$locationid = $snode['locationid'];*/
	
	$query = db_select('tblintervention', 'ind', array('target' => 'my_other_db'))
    ->fields('ind')
    ->condition('interventionid', $locid) //Berkard.
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   ->orderBy('id', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('locationid', PDO::FETCH_ASSOC);
	return $query;
}
function extend_node_physical_param($snode, $srctype){
	$locationid = $snode['locationid'];
	if($srctype == 1){
		$tab = 'tbldrilledwell';
	} elseif ($srctype == 2) {
		$tab = 'tbldugwells';
	} elseif ($srctype == 3) {
		$tab = 'tbldam';
	} elseif ($srctype == 4) {
		$tab = 'tblberkad';
	} elseif ($srctype == 5) {
		$tab = 'tblspring';
	} elseif ($srctype == 6) {
		$tab = 'tblother';
	} else {
		//default do nothing
	}
	
	
	
	$query = db_select($tab, 'ind', array('target' => 'my_other_db'))
    ->fields('ind')
    //->condition('source_typeid', 1) //Berkard.
    //->range(0,4)
   ->condition('locationid', $locationid)
   ->orderBy('id', 'ASC') //Most recent first.
    ->execute()
	->fetchAllAssoc('id', PDO::FETCH_ASSOC);
	//foreach ($query as $key => $value) {
		return $query;
	//}
	//return $query;
}
function extend_node_n_physical_param($snode, $srctype){
	//$locationid = $snode['locationid'];
	if($srctype == 'borehole'){
		$tab = 'tbldrilledwell';
	} elseif ($srctype == 'dug_well') {
		$tab = 'tbldugwells';
	} elseif ($srctype == 'dam') {
		$tab = 'tbldam';
	} elseif ($srctype == 'berkad') {
		$tab = 'tblberkad';
	} elseif ($srctype == 'spring') {
		$tab = 'tblspring';
	} elseif ($srctype == 'other') {
		$tab = 'tblother';
	} else {
		//default do nothing
	}



	$query = db_select($tab, 'ind', array('target' => 'my_other_db'))
	->fields('ind')
	//->condition('damwidth', '100') //Berkard.
	//->range(0,4)
	->condition('locationid', $snode)
	->orderBy('id', 'ASC') //Most recent first.
	->execute()
	->fetchAllAssoc('id', PDO::FETCH_ASSOC);
	//foreach ($query as $key => $value) {
	return $query;
	//}
	//return $query;
}
/*function extend_node($snode){
	$inodes = process_import_node();
	foreach ($inodes as $key => $value) {
		$srctype = (int)$value['source_typeid'];
		$nodelocation = extend_node_location($value);
		$nodefunction = extend_node_functions($value);
		$generator = extend_node_generator($value);
		$waterchar = extend_node_waterchar($value);
		$supply = extend_node_supplydist($value);
		$srcmgmt = extend_node_srcmgmt($value);
		
		$physicalparam = extend_node_physical_param($value, $srctype);
		$nodedetails = array('other'=>'other');
		$nodedetails['function_use'] = $nodefunction;
		$nodedetails['location'] = $value;
		$nodedetails['physical_param'] = $physicalparam;
		$nodedetails['generator'] = $generator;
		$nodedetails['waterchar'] = $waterchar;
		$nodedetails['supply'] = $supply;
		$nodedetails['srcmgmt'] = $srcmgmt;

	}
	
}
*/
function get_inserted_nodes(){
	$query = db_select('swims_import_t_ref', 'ind', array('target' => 'default'))
	->fields('ind', array('nid', 'type', 'loc_id'))
	//->condition('type', 'dug_well')
	->range(10, 2)
	->execute()
	->fetchAllAssoc('loc_id', PDO::FETCH_ASSOC);
	return $query;
}
function extend_source_type($locid){
	$query = db_select('tbllocation', 'ind', array('target' => 'my_other_db'))
    ->fields('ind', array('id', 'locationid', 'source_typeid'))
    //->condition('status', 1) //Published.
    ->range(0,8)
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('locationid', PDO::FETCH_ASSOC);
	return $query;
}

function node_is_imported($oldlocationid){
	$query = db_select('swims_import_t_ref', 'ind', array('target' => 'default'))
	->fields('ind', array('loc_id', 'nid', 'type'))
	->condition('loc_id', $oldlocationid) //Published.
	//->range(0,8)
	// ->condition('created', array($start_time, $end_time), 'BETWEEN')
	// ->orderBy('created', 'DESC') //Most recent first.
	->execute()
	->fetchAssoc();
	return $query;
}
function get_term_parent($tid){
	$query = db_select('taxonomy_term_hierarchy', 'ind', array('target' => 'default'))
    ->fields('ind', array('tid', 'parent'))
    ->condition('tid', $tid) //Published.
    //->range(0,8)
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAssoc('locationid', PDO::FETCH_ASSOC);
	return $query['parent'];
}
function extend_node_data_mgmt($node){
	$locationid = $node['locationid'];
	$query = db_select('tbldatamanagement', 'ind', array('target' => 'my_other_db'))
    ->fields('ind')
    ->condition('locationid', $locationid) //Berkard.
    
   // ->condition('created', array($start_time, $end_time), 'BETWEEN')
   // ->orderBy('created', 'DESC') //Most recent first.
    ->execute()
	->fetchAllAssoc('locationid', PDO::FETCH_ASSOC);
	return $query;
}

function swimsimport_alt_node_save($node) {
  $transaction = db_transaction('node_save', $option = array('target' => 'my_other_db'));

  try {
    // Load the stored entity, if any.
    if (!empty($node->nid) && !isset($node->original)) {
      $node->original = entity_load_unchanged('node', $node->nid);
    }

    field_attach_presave('node', $node);
    global $user;

    // Determine if we will be inserting a new node.
    if (!isset($node->is_new)) {
      $node->is_new = empty($node->nid);
    }

    // Set the timestamp fields.
    if (empty($node->created)) {
      $node->created = REQUEST_TIME;
    }
    // The changed timestamp is always updated for bookkeeping purposes,
    // for example: revisions, searching, etc.
    $node->changed = REQUEST_TIME;

    $node->timestamp = REQUEST_TIME;
    $update_node = TRUE;

    // Let modules modify the node before it is saved to the database.
    module_invoke_all('node_presave', $node);
    module_invoke_all('entity_presave', $node, 'node');

    if ($node->is_new || !empty($node->revision)) {
      // When inserting either a new node or a new node revision, $node->log
      // must be set because {node_revision}.log is a text column and therefore
      // cannot have a default value. However, it might not be set at this
      // point (for example, if the user submitting a node form does not have
      // permission to create revisions), so we ensure that it is at least an
      // empty string in that case.
      // @todo: Make the {node_revision}.log column nullable so that we can
      // remove this check.
      if (!isset($node->log)) {
        $node->log = '';
      }
    }
    elseif (!isset($node->log) || $node->log === '') {
      // If we are updating an existing node without adding a new revision, we
      // need to make sure $node->log is unset whenever it is empty. As long as
      // $node->log is unset, drupal_write_record() will not attempt to update
      // the existing database column when re-saving the revision; therefore,
      // this code allows us to avoid clobbering an existing log entry with an
      // empty one.
      unset($node->log);
    }

    // When saving a new node revision, unset any existing $node->vid so as to
    // ensure that a new revision will actually be created, then store the old
    // revision ID in a separate property for use by node hook implementations.
    if (!$node->is_new && !empty($node->revision) && $node->vid) {
      $node->old_vid = $node->vid;
      unset($node->vid);
    }

    // Save the node and node revision.
    if ($node->is_new) {
      // For new nodes, save new records for both the node itself and the node
      // revision.
      drupal_write_record('node', $node);
      _node_save_revision($node, $user->uid);
      $op = 'insert';
    }
    else {
      // For existing nodes, update the node record which matches the value of
      // $node->nid.
      drupal_write_record('node', $node, 'nid');
      // Then, if a new node revision was requested, save a new record for
      // that; otherwise, update the node revision record which matches the
      // value of $node->vid.
      if (!empty($node->revision)) {
        _node_save_revision($node, $user->uid);
      }
      else {
        _node_save_revision($node, $user->uid, 'vid');
        $update_node = FALSE;
      }
      $op = 'update';
    }
    if ($update_node) {
      db_update('node')->fields(array('vid' => $node->vid))->condition('nid', $node->nid)->execute();
    }

    // Call the node specific callback (if any). This can be
    // node_invoke($node, 'insert') or
    // node_invoke($node, 'update').
    node_invoke($node, $op);

    // Save fields.
    $function = "field_attach_$op";
    $function('node', $node);

    module_invoke_all('node_' . $op, $node);
    module_invoke_all('entity_' . $op, $node, 'node');

    // Update the node access table for this node.
    node_access_acquire_grants($node);

    // Clear internal properties.
    unset($node->is_new);
    unset($node->original);
    // Clear the static loading cache.
    entity_get_controller('node')->resetCache(array($node->nid));

    // Ignore slave server temporarily to give time for the
    // saved node to be propagated to the slave.
    db_ignore_slave();
  }
  catch (Exception $e) {
    $transaction->rollback();
    watchdog_exception('node', $e);
    throw $e;
  }
}