<?php

function parser_string($string)
{
return htmlspecialchars(trim(addslashes(pg_escape_string($string))));
}

function parser_int($int)
{
	if(is_numeric($int))
	{
return $int;	
	}
	else {
return "NaN";
	}
}

function echoup($txt)
{
echo nl2br(htmlspecialchars(trim($txt)).PHP_EOL);
}

?>