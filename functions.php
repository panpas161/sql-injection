<?php
    function sanitize($string)
    {
        $forbidden_chars = array(
            "\"",
            ";",
            "-",
            "$",
            "%",
            "'",
            "+",
            "-",
            "*",
            "<",
            ">",
            "=",
            "?",
            "!",
            "\\",
            "/",
            ".",
            "@",
            ",",
            "#",
            ":",
            "(",
            ")",
            "`",
            "~",
            " "
        );
        $result = str_replace($forbidden_chars,'',$string);
        return $result;
    }
?>