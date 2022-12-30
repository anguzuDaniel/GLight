<?php

namespace App\Controllers;


/**
 * Posts
 */
class Posts extends \Core\Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        echo "Hello form the index action in the Posts controller!";
        echo "<p>Query string parameters: </pre>" .
            htmlspecialchars(print_r($_GET, true)) . "</pre></p>";
    }

    /**
     * addNew
     *
     * @return void
     */
    public function addNew()
    {
        echo "Hello form the addNew action on the Posts Controller!";
    }
}

