--TEST--
Decimal128: [decq627] fold-down full sequence (Clamped)
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('18000000136400000010632D5EC76B050000000000FE5F00');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "1E+6131"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

$canonicalJson = '{"d" : {"$numberDecimal" : "1.00000000000000000000E+6131"}}';

// Canonical extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($canonicalJson))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

// Canonical extJSON to Canonical BSON
echo bin2hex(fromJSON($canonicalJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
18000000136400000010632d5ec76b050000000000fe5f00
{"d":{"$numberDecimal":"1.00000000000000000000E+6131"}}
{"d":{"$numberDecimal":"1.00000000000000000000E+6131"}}
{"d":{"$numberDecimal":"1.00000000000000000000E+6131"}}
18000000136400000010632d5ec76b050000000000fe5f00
18000000136400000010632d5ec76b050000000000fe5f00
===DONE===