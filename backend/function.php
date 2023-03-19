<?php
require_once("connectDB.php");
// if acces token is invalid or not gotten then go back to login.php file
function Invalid_seasson($email)
{
    if (!isset($_SESSION['t'])) {
        header('location:login.php');
    }
    $admin = array(
        'daniels.vidopskis@sk.lvt.lv1',
        'mareks.frismanis@sk.lvt.lv1'
    );
    if (in_array($_SESSION['email'], $admin)) {
        header("location:../tasker/task.php");
    }
}

function MicrosoftInfo()
{

    $env = parse_ini_file('.env');
    session_start();

    $tenant = $env['tenant'];
    $client_id = $env['client_id'];
    $client_secret = $env['client_secret'];
    $callback = $env['callback'];

    if (array_key_exists('access_token', $_POST)) {
        //save access_token to SESSION t variable
        $_SESSION['t'] = $_POST['access_token'];
        $t = $_SESSION['t'];
        $ch = curl_init();
        //get users json data from /me/ endpoint
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $t,
            'Conent-type: application/json'
        )
        );
        curl_setopt($ch, CURLOPT_URL, "https://graph.microsoft.com/v1.0/me/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $rez = json_decode(curl_exec($ch), 1);
        if (array_key_exists('error', $rez)) {
            //if we have a error dump everything that error gives us  
            var_dump($rez['error']);
            die();
        } else { // get users data from json with $rez variable name
            $_SESSION['username'] = $rez["givenName"];
            $_SESSION['surname'] = $rez["surname"];
            $_SESSION['email'] = $rez['mail'];
            $_SESSION['id'] = $rez["id"];
            $_SESSION['job'] = $rez["jobTitle"];
            $_SESSION['fullname'] = $rez["displayName"];
        }
        curl_close($ch);
        header('Location: ' . $callback);
    }
    session_abort();

}

function block_domain()
{
    //Block subdomain 
    $parts = explode('@', $_SESSION['email']);
    $domain = array_pop($parts);
    $blocked_domains = array('sk'); // to block sub domain add sk in here
    if (!$_SESSION['username'] == 'Daniels' && in_array(explode('.', $domain)[0], $blocked_domains)) {
        header("location:blocked.php");
        exit();
    }
}
function NameSurname($email)
{
    $email = str_replace('@sk', '', $email);
    $email = str_replace('@lvt', '', $email);
    $parts = explode('.', $email);
    return [
        'name' => ucfirst($parts[0]),
        'surname' => ucfirst($parts[1])
    ];
}

?>