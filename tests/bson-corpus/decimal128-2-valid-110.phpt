--TEST--
Decimal128: [decq712] Selected DPD codes
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('180000001364003C00000000000000000000000000403000');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "60"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
180000001364003c00000000000000000000000000403000
{"d":{"$numberDecimal":"60"}}
{"d":{"$numberDecimal":"60"}}
180000001364003c00000000000000000000000000403000
===DONE===