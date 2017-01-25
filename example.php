<?php
//just replace $custom_tax with your taxonmy slug
//put this code in your theme's functions.php file

add_action('edited_$custom_tax', 'update_teamcodes_on_edits', 10, 2 );

/**
 * Fire function on custom taxonomy update only.
 *
 * @param $term_id
 * @param $taxonomy
 */

function update_something_on_edits( $term_id, $taxonomy ) {
	//get the term to make sure we are in the right place
	$tax_terms = get_terms( '$custom_tax', array('hide_empty' => false));
	//if not gtfo
	if( $tax_terms[0]->taxonomy != '$custom_tax' ) {
		return ;
	} else {
    //set up the stuff you want to happen, like create an array from the terms in this taxonomy

	 	//set up empty array
		$custom_tax_array = [];
		foreach ($tax_terms as $key => $value) {

			//loop through and create an array for the name and slug
			$abbr = strtoupper( $value->slug );
			$name = $value->name;
			$team_array[$abbr] = $name;
		}
	}
}
