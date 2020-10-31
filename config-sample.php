<?php

/**
 * @author  Etienne Schmitt <etienne@schmitt-etienne.fr>
 * @license GPL 2.0 or any later
 */

namespace Syrgoma\Ski\Config;

$databaseConfig = [

    /**
     * Driver used when connecting to the database :
     *
     * @example mysql, sqlite, pgsql
     */
    "driver"   =>
        "DEFINE YOUR DATABASE DRIVER HERE",


    /**
     * Host used for connecting to the database.
     * Accepted value is IPv4/IPv6 or dns name
     *
     * @example 127.0.0.1, ::1, localhost
     */
    "host"     =>
        "DEFINE YOUR DATABASE HOST HERE",


    /**
     * Port used for the database
     *
     * @example 3306, 3307, 4040
     */
    "port"     =>
        "DEFINE YOUR DATABASE PORT HERE",


    /**
     * Database used when the connection worked
     *
     * @example db_name, example_db_prod, do_not_flush_me_prod
     */
    "database" =>
        "DEFINE YOUR DATABASE NAME HERE",


    /**
     * Charset used for the database
     *
     * @example utf8mb4, utf8, latin2
     */
    "charset"  =>
        "DEFINE YOUR DATABASE CHARSET HERE",


    /**
     * User of the database
     *
     * @example bob, alice, charly
     */
    "user"     =>
        "DEFINE YOUR DATABASE USER HERE",


    /**
     * Password of the database.
     *
     * Please, be sure to but a strong and correct password here:
     * https://haveibeenpwned.com/
     * https://www.security.org/how-secure-is-my-password/
     *
     * @example bigBadPassword, NotAGoodPassword, StillNotGoodPassword
     */
    "password" =>
        "DEFINE YOUR DATABASE PASSWORD HERE",
];
