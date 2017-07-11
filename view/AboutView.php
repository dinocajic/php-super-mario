<?php

/**
 * Class AboutView
 * Displays the about page
 */
class AboutView {

    /**
     * Displays all of the necessary content on the about page
     */
    public function main() {
        ?>
        <div id="wrapper">
            <h1>That's right, read our About page</h1>
            <p>
                If you're not familiar with Super Mario, get out of here right now. Un-register yourself because we hate you.
                This website was made for fans of Super Mario. How do you know you're a fan? If you can't say yes to all of
                the items listed below, you need to leave immediately.
            </p>
            <ul>
                <li>Are you wearing a Super Mario shirt right now?</li>
                <li>Do you constantly hum: da-da da da-da da thum?</li>
                <li>Is your son's middle name Mario?</li>
                <li>Is your car rigged to throw out banana peels?</li>
                <li>Do you live in a castle?</li>
                <li>Do you have a brother named Luigi?</li>
                <li>Is your favorite quote, "What doesn't kill you makes your smaller?"</li>
                <li>Do you say "It's-a-me, Mario" every time you enter a building?</li>
            </ul>

            <p>
                <img src="img/super-mario-team.png" width="100%" alt="Super Mario Team" />
            </p>

            <h2>Facts about Super Mario</h2>

            <p>
                Super Mario Bros. was supposed to be Nintendo's grand farewell to the NES.
                Wait, what? Wasn't Super Mario Bros. the first major NES game? Well, it was in North America.
                Nintendo's Japanese 8-bit system, the Famicom, came out nearly two-and-a-half years before the American
                NES and by the time SMB came along, Nintendo was already planning to replace it with the Famicom Disk System,
                an upgraded Famicom that read games off rewritable floppy disks. America never got the Disk System, as
                Nintendo of America opted to stick with cartridges (most of the later, more advanced NES games like Zelda,
                Metroid and Castlevania were Famicom Disk System games in Japan).
            </p>

            <p>
                Jackie Chan indirectly influenced the game. Shigeru Miyamoto has mentioned numerous times that the game
                Kung-Fu was a major source of inspiration for Super Mario Bros. Arcade developer Irem created the
                original game, but Nintendo itself developed the NES port of Kung-Fu, a project Miyamoto and his team
                were deeply involved in. Kung-Fu’s smooth scrolling and bright colorful backgrounds set it apart from
                most games at the time, and got Miyamoto thinking about creating his own scrolling action game with
                colorful graphics.
            </p>

            <p>
                Super Mario Bros. didn't star Mario initially. In 1985 Mario was a popular character, but he wasn't
                Nintendo's be-all, end-all yet. All Miyamoto and his team knew early on was that they wanted to make a
                big, scrolling action game, so initially they used a filler character...a blank square 16 pixels wide by
                32 pixels high. Yup, Super Mario Bros. originally starred a featureless box.
            </p>

            <p>
                Mario was originally going to ride a rocket and carry guns. Turns out our genteel moustachioed hero was
                originally going to be a bit more of a badass. It took a while for Nintendo to nail down chasm jumping
                and turtle crushing as the core tenants of Super Mario Bros. - initially the game was more of a straight-up
                action game, with Mario wielding a beam gun and a rifle. Also, the game was to be split evenly between
                on-foot stages and shooter stages in which Mario rides a rocket or cloud.
            </p>

            <p>
                There was a version of Super Mario Bros. released on a non-Nintendo system. Mario has moonlighted on
                non-Nintendo systems a couple times in obscure educational games, but there's no way a Mario platformer
                ever appeared on a non-Nintendo system, right? Well, actually, there was a rather strange semi-sequel
                to SMB released for NEC and Sharp computers in Japan. The game, developed by Hudson Soft, was called
                Super Mario Bros. Special and retained the look of the NES SMB and some of the level layouts, but was
                mostly a completely original game. Unfortunately Super Mario Bros. Special had weird physics and lacked
                the smooth scrolling of Nintendo's original game, so it’s really more of an oddity than a lost gem.
            </p>
        </div>
        <?php
    }
}