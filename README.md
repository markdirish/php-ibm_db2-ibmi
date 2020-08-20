# IBM_DB2

Interface for PHP to Db2 for i. This is a fork of the `ibm_db2` nterface for PHP to Db2 for z/OS and LUW.

This code is only to be compiled and run on IBM i and offers no guaranteed compatibility with other platforms.

## Prerequisites

You will need PHP installed, as well as some key development tools:
```
yum install make-gnu gcc
```
To get started with IBM i RPMs, see http://ibm.biz/ibmi-rpms

## How to run sample program

### connect.php:-

```
<?php
$database = 'dsn name';
$user = 'user';
$password = 'password';
$conn = db2_connect($database, $user, $password);

if ($conn) {
    echo "Connection succeeded.";
    db2_close($conn);
}
else {
    echo "Connection failed: " . db2_conn_errormsg();
}
?>

```
To run the sample:- php connect.php

## Contributing:
```
See CONTRIBUTING.md

The developer sign-off should include the reference to the DCO in defect remarks(example below):
DCO 1.1 Signed-off-by: Random J Developer <random@developer.org>
```
