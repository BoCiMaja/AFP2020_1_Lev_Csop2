      
        <nav>         
            <ul class="topnav">
                <li><a href="<?=BASEURL?>/home/index">Kezdőlap</a></li>               
                <li class="dropdown"><a href="#">Olvasó</a>
                    <ul class="subnav">
			<li><a href="<?=BASEURL?>/reader/register">Beiratkozás</a></li>
			<li><a href="<?=BASEURL?>/reader/choose/update">Adatok módosítása</a></li>
                        <li><a href="<?=BASEURL?>/reader/choose/prolong">Tagság rendezése</a></li>
                        <li><a href="<?=BASEURL?>/reader/choose/delete">Kiiratkozás</a></li>
			<li><a href="<?=BASEURL?>/reader/expired">Lejárt tagságok</a></li>                        
                    </ul>
                </li>
		<li class="dropdown"><a href="#">Katalógus</a>
                    <ul class="subnav">
			<li><a href="konyvkeresesesz.html">Egyszerű keresés</a></li>
                        <li><a href="konyvkereses.html">Részletes keresés</a></li>
			<li><a href="konyvfelvetel.html">Új könyv felvétele</a></li>
                        <li><a href="konyvtorles.html">Könyv leselejtezése</a></li>                        
                        <li><a href="leltarinditas.html">Teljes leltár indítása</a></li>
                        <li><a href="leltarbavetel.html">Teljes leltár folytatása</a></li>
                        <li><a href="leltarvege.html">Teljes leltár vége</a></li>
                    </ul>
                </li>
				<li class="dropdown"><a href="#">Kölcsönzés</a>
                    <ul class="subnav">
                        <li><a href="konyvkiadas.html">Könyv kiadása</a></li>
                        <li><a href="konyvvisszavet.html">Könyv visszavétele</a></li>						                        
			<li><a href="hosszabbitas.html">Hosszabbítás</a></li>
                        <li><a href="lejartkonyvek.html">Lejárt határidős könyvek</a></li>
                    </ul>
                </li>
                <li class="dropdown" id="user"><a href="#">Belépve: <?php echo $_SESSION['username']?></a>
                    <ul class="subnav">
                        <li><a href="<?=BASEURL?>/user/userdata">Személyes adatok</a></li>
			<li><a href="<?=BASEURL?>/user/changepwd">Jelszó csere</a></li>
                        <li><a href="<?=BASEURL?>/user/logout">Kijelentkezés</a>                        
                    </ul>
                </li>
            </ul>        
        </nav>