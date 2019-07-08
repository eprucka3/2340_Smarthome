<?php
header('Content-type: application/json');

try {
            // Try Connect to the DB with new MySqli object - Params {hostname, userid, password, dbname}
            $mysqli = new mysqli("localhost", "root", "", "mydb");


            $query = "SELECT * FROM devices";
            $result = mysqli_query($mysqli, $query);

            $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
            echo json_encode($json );

        } catch (mysqli_sql_exception $e) { // Failed to connect? Lets see the exception details..
            echo "MySQLi Error Code: " . $e->getCode() . "<br />";
            echo "Exception Msg: " . $e->getMessage();
            exit(); // exit and close connection.
        }

        $mysqli->close(); // finally, close the connection?>
