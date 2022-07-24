<?php

function get_pdo()
{
    // Import the environment variables stored in .env
    require_once(__DIR__ . '/lib/vendor/autoload.php');
    (new Symfony\Component\Dotenv\Dotenv())->load(__DIR__ . '/../.env');
    
    $db = new PDO(sprintf(
        'pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s',
        $_ENV["DB_HOST"],
        $_ENV["DB_PORT"],
        $_ENV["DB_NAME"],
        $_ENV["DB_USERNAME"],
        $_ENV["DB_PASSWORD"],
    ));

    $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    return $db;
}

$db = get_pdo();
$res = $db->query("select 'world' as Hello")->fetch();
?>
<pre><code>
    <?php print_r($res) ?>
</code></pre>