<?php

/**
 * Class Footer
 */
class Footer {

    /**
     * Display footer content and ending HTML document tags
     *
     * @param bool $footer
     */
    public function main($footer = false) {
        if ($footer) {
            // Footer is not necessary for main page
            // If the need arises, create footer
            // $this->displayFooter();
        }

        ?>
        </body>
        </html>
        <?php
    }
}