<?php
function numbering() {
    $i = 0;
    while ($i < 10) {
        echo $i;
        $i += 1;
    }
}
function get_member2() {
    return 'ang';
}
function get_member1() {
    return 'doodoong';
}
function get_argument($arg='empty') {
    return $arg;
}

print get_argument(1);
print get_argument('who is dooodoong?');
print get_argument();
echo get_member2();
echo '.';
echo get_member1();
numbering();
?>