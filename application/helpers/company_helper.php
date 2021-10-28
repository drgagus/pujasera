<?php
function company_profile(){

	$ci = get_instance();
	$company = $ci->db->get('company')->row_array();
	return $company ;
}

?>