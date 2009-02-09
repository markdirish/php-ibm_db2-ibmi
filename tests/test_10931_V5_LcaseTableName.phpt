--TEST--
IBM-DB2: PECL bug 10931 -- no result for db2_columns with lowercase table name
--SKIPIF--
<?php
  require_once('skipif.inc');
?>
--FILE--
<?php

require_once('connection.inc');

$conn = db2_connect($database, $user, $password);

if ($conn) {
		 $sql = "DROP TABLE \"DB2\".\"test_10931\"";
		 @db2_exec($conn, $sql);

		 $sql = "create table \"DB2\".\"test_10931\" ( \"id\" INTEGER not null generated BY DEFAULT AS identity (NOCACHE, INCREMENT BY 1), \"title\" VARCHAR(50), \"created\" TIMESTAMP DEFAULT CURRENT TIMESTAMP,  constraint P_USERS_U1 primary key (\"id\"))";
		 db2_exec($conn, $sql);

		 $stmt = db2_columns ($conn ,null , 'DB2' , 'test_10931' , '%' );
		 if ( $stmt ) 
		 {
		 		 while ($rowC = db2_fetch_assoc($stmt)) 
		 		 {
		 		 		 var_dump( $rowC );
		 		 }
		 }
}
else {
		 echo "Connection failed.\n";
}

?>
--EXPECTF--
array(16) {
  ["TABLE_CAT"]=>
  string(%d) "%s"
  ["TABLE_SCHEM"]=>
  string(3) "DB2"
  ["TABLE_NAME"]=>
  string(10) "test_10931"
  ["COLUMN_NAME"]=>
  string(2) "id"
  ["DATA_TYPE"]=>
  int(4)
  ["TYPE_NAME"]=>
  string(8) "INTEGER "
  ["LENGTH_PRECISION"]=>
  int(9)
  ["BUFFER_LENGTH"]=>
  int(4)
  ["NUM_SCALE"]=>
  int(0)
  ["NUM_PREC_RADIX"]=>
  int(10)
  ["NULLABLE"]=>
  int(0)
  ["REMARKS"]=>
  NULL
  ["COLUMN_DEF"]=>
  NULL
  ["DATETIME_CODE"]=>
  NULL
  ["CHAR_OCTET_LENGTH"]=>
  NULL
  ["ORDINAL_POSITION"]=>
  int(1)
}
array(16) {
  ["TABLE_CAT"]=>
  string(%d) "%s"
  ["TABLE_SCHEM"]=>
  string(3) "DB2"
  ["TABLE_NAME"]=>
  string(10) "test_10931"
  ["COLUMN_NAME"]=>
  string(5) "title"
  ["DATA_TYPE"]=>
  int(12)
  ["TYPE_NAME"]=>
  string(8) "VARCHAR "
  ["LENGTH_PRECISION"]=>
  NULL
  ["BUFFER_LENGTH"]=>
  int(52)
  ["NUM_SCALE"]=>
  NULL
  ["NUM_PREC_RADIX"]=>
  NULL
  ["NULLABLE"]=>
  int(1)
  ["REMARKS"]=>
  NULL
  ["COLUMN_DEF"]=>
  NULL
  ["DATETIME_CODE"]=>
  NULL
  ["CHAR_OCTET_LENGTH"]=>
  int(50)
  ["ORDINAL_POSITION"]=>
  int(2)
}
array(16) {
  ["TABLE_CAT"]=>
  string(%d) "%s"
  ["TABLE_SCHEM"]=>
  string(3) "DB2"
  ["TABLE_NAME"]=>
  string(10) "test_10931"
  ["COLUMN_NAME"]=>
  string(7) "created"
  ["DATA_TYPE"]=>
  int(9)
  ["TYPE_NAME"]=>
  string(8) "TIMESTMP"
  ["LENGTH_PRECISION"]=>
  NULL
  ["BUFFER_LENGTH"]=>
  int(10)
  ["NUM_SCALE"]=>
  NULL
  ["NUM_PREC_RADIX"]=>
  NULL
  ["NULLABLE"]=>
  int(1)
  ["REMARKS"]=>
  NULL
  ["COLUMN_DEF"]=>
  string(17) "CURRENT_TIMESTAMP"
  ["DATETIME_CODE"]=>
  int(93)
  ["CHAR_OCTET_LENGTH"]=>
  NULL
  ["ORDINAL_POSITION"]=>
  int(3)
}
