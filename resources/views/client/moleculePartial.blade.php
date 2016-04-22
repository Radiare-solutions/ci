<?php

echo "<div class='row'>";
foreach ($result as $key => $value) {
    echo "<div class = 'col-md-12'><div class = 'col-md-11'>
        <h6 class = 'text-semibold'>" . $groups["clientName"] . ' - ' . $groups["groupName"] . '</h6>
        <b>' . $key . '</b> - ' . $value . '<br></div><div class = "col-md-1">' .
    '<button type = "button" class = "btn btn-link" ';
    $str = explode(":", strip_tags(trim($value)));
    echo 'onclick="delete_molecule_entry(\''.$bgid.'\',\''.$str[2].'\')">' .
    '<i class = "icon-trash" ></i></button></div></div>';
}
echo '</div>';
