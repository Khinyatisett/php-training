<?php

for ($i = 1; $i <= 6; $i++)	
{
for($k = 6; $k > $i; $k-- )
{
	echo "&nbsp &nbsp";
}
for($j = 1; $j <= $i; $j++ )
{
echo "* ";
}
for($j = $i-1; $j >= 1; $j-- )
{
echo" *";
}
echo "</br>";
}

for ($i = 5; $i >=1; $i--)	
{
for($k = 5; $k >= $i; $k-- )
{
	echo "&nbsp &nbsp";
}
for($j = 1; $j <= $i; $j++ )
{
echo "* ";
}
for($j = $i-1; $j >= 1; $j-- )
{
echo" *";
}
echo "</br>";
}

?>