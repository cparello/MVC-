<?php
session_start();
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 3/12/2019
 * Time: 11:21 PM
 */


/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Short description for file
 * Example  <code> flash('register_success', 'You are registered!', $class = 'alert alert-danger'); </code>
 * display in view  <?php echo flash('register_success');
 * Long description for file (if any)...
 *
 * session helper class
 *
 * PHP version 7.3
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @param string $name
 * @param string $message
 * @param string $class
 */

function flash($name = '', $message = '', $class = 'alert alert-success')
{
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$class])) {
                unset($_SESSION[$class]);

            }
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;

        } else if (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name], $_SESSION[$class]);
        }
    }
}

/**
 *
 */
function isLoggedIn(): bool
{
    return isset($_SESSION['user_id']) ? true : false;
}

