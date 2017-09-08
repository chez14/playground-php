<?php
require("secret64.php");

echo "Coba enkripsi: \n";
echo Secret64::encode("kambing") . "\n\n";

echo "Coba dekripsi: \n";
echo Secret64::decode(Secret64::encode("kambing")) . "\n\n";