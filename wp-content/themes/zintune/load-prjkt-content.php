<?php /*  get all custom fields, loop through them and load the field object because this should dynamically happen OOP style so if more content is added later and it's greater then 5, this code won't have to be rewritten
*/

//Container Array for each the artsns contents
$vocalist_contents = array();
$producer_contents = array();
$songwriter_contents = array();
//Container for each artsns contents descriptions
$vocalist_contents_description = array();
$producer_contents_description = array();
$songwriter_contents_description = array();


$fields = get_fields();
if( $fields )
{
    //Will iterate through all teh fields and split the information
    foreach( $fields as $field_name => $value )
    {       
        echo $field_name, "\n";
        //If it's a vocalist match pushes the content to its array
        if (preg_match("/^vocalist_content_\d$/", $field_name) == 1)
        {
            array_push($vocalist_contents, $field_name);}
        //If it's a vocalist description match pushes the content to its array
        elseif (preg_match("/^vocalist_content_description_\d$/", $field_name) == 1)
        {
  array_push($vocalist_contents_description, $field_name);}


        //If it's a producer match pushes the content to its array
        elseif (preg_match("/^producer_content_\d$/", $field_name) == 1)
        {
            array_push($producer_contents, $field_name);}
        //If it's a producer description match pushes the content to its array
        elseif (preg_match("/^producer_content_description_\d$/", $field_name) == 1)
        {
  array_push($producer_contents_description, $field_name);}    


        //If it's a songwriter match pushes the content to its array    
        elseif (preg_match("/^songwriter_content_\d$/", $field_name) == 1)
        {
            array_push($songwriter_contents, $field_name);}
                //If it's a producer description match pushes the content to its array
        elseif (preg_match("/^songwriter_content_description_\d$/", $field_name) == 1)
        {
  array_push($songwriter_contents_description, $field_name);}   

    //Sort all contents properly
    sort($vocalist_contents);
    sort($vocalist_contents_description);
    sort($producer_contents);
    sort($producer_contents_description);
    sort($songwriter_contents);
    sort($songwriter_contents_description);

    }
}
$current_field_selected_content = array();  $current_field_selected_content_descriptions = array(); 

$current_field_selected_content = $vocalist_contents;

echo count($vocalist_contents);


/*foreach ($vocalist_contents_description as $key => $val) {
    echo $key.  " = " . $val . "\n";
}*/?>