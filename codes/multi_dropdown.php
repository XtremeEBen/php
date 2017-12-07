<?php
function multi_dropdown( $name, array $options, array $selected=null, $size=4 )
{
        /*** begin the select ***/
        $dropdown = '<select name="'.$name.'" id="'.$name.'" size="'.$size.'" multiple>'."\n";

        /*** loop over the options ***/
        foreach( $options as $key=>$option )
        {
                /*** assign a selected value ***/
                $select = in_array( $option, $selected ) ? ' selected' : null;

                /*** add each option to the dropdown ***/
                $dropdown .= '<option value="'.$key.'"'.$select.'>'.$option.'</option>'."\n";
        }

        /*** close the select ***/
        $dropdown .= '</select>'."\n";

        /*** and return the completed dropdown ***/
        return $dropdown;
}

$name = 'multi_dropdown';
$options = array( 'dingo', 'wombat', 'kangaroo', 'steve irwin', 'wallaby', 'kookaburra' );
$selected = array( 'dingo', 'kangaroo', 'kookaburra' );

echo multi_dropdown( $name, $options, $selected );

?>