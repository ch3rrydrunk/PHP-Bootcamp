<?php
    function ft_is_sort($tab)
    {
        $check = $tab;
        sort($check);
        if ($check === $tab)
            return (1);
        else
            return(0);
    }
    $tab = array(1, 2, 3, 4, 5);
?>