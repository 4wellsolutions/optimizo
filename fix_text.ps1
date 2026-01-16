$p = 'd:\workspace\optimizo\resources\lang\en\tools\text.php'
$c = Get-Content $p
$n = $c[0..262] + $c[1260..($c.Count - 1)]
$n | Set-Content $p -Encoding UTF8
