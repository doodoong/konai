<?php
function get_members() {
    return array('doodoong', 'kbgksj', 'nysnth');
}
$grades = array ('doodoong' => 10, 'kbgksj' => 9, 'nysnth' => 8);
//var_dump($grades);
foreach ($grades as $key => $value) {
    echo "key : {$key} value : {$value}<br />";
}
//var_dump(get_members());
//echo '<br />';
$member = get_members();
//echo $member[0].'<br />';
//echo $member[1].'<br />';

//echo $member[2].'<br />';
//array_push($member, 'f');
$member = array_merge($member, array ('g', 'h'));
//var_dump($member);
//echo '<br />';
for ($i=0; $i < count ($member); $i++) {
//    echo ucfirst($member[$i]).'<br />';
}
?>
