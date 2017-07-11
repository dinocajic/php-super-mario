<?php
session_start();
/**
 * @author: Dino Cajic
 * @email: dinocajic@gmail.com
 *
 * Copyright (c) 2017 Dino Cajic
 * This website, and the content on it, was created for educational purposes only.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 * Handles all of the incoming page requests
 */
class SuperMario {

    /**
     * SuperMario constructor.
     * Calls the correct controller
     */
    public function __construct() {
        // Load main page if no page has been specified
        if (!isset($_GET["page"])) {
            require_once("controller/IndexController.php");
            $index = new IndexController();
            $index->main();
            return;
        }

        // Check if page is legitimate
        require_once("configuration/config.php");
        $config = new Config();
        $pages  = $config->getPages();
        $page   = strip_tags($_GET["page"]);

        if (!in_array($page, $pages)) {
            header('Location: index.php');
            return;
        }

        // If page has been specified and is legitimate, then call the appropriate controller
        $controller = ucfirst(strtolower($page)) . "Controller";

        require_once("controller/" . $controller . ".php");
        $cont_obj = new $controller();
        $cont_obj->main();
    }
}

/** Start Super Mario */
$super_mario = new SuperMario();