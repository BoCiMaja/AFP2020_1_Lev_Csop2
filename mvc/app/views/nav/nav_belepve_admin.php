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
		<li class="dropdown"><a href="#">Könyvtáros</a>
                    <ul class="subnav">
                        <li><a href="<?=BASEURL?>/librarian/register">Regisztráció</a></li>
			<li><a href="<?=BASEURL?>/librarian/choose/update">Adatok módosítása</a></li>
                        <li><a href="<?=BASEURL?>/librarian/choose/delete">Törlés</a></li>						
                    </ul>
                </li>
		<li class="dropdown"><a href="#">Katalógus</a>
                    <ul class="subnav">
			<li><a href="<?=BASEURL?>/book/simplesearch">Egyszerű keresés</a></li>
                        <li><a href="<?=BASEURL?>/book/detailedsearch">Részletes keresés</a></li>
                        <li><a href="<?=BASEURL?>/book/register">Új könyv felvétele</a></li>
                        <li><a href="<?=BASEURL?>/book/delete">Könyv leselejtezése</a></li>                        
			                  <li><a href="<?=BASEURL?>/book/toinventory">Leltározás</a></li>			
                    </ul>
                </li>
		<li class="dropdown"><a href="#">Kölcsönzés</a>
                    <ul class="subnav">
                        <li><a href="<?=BASEURL?>/book/choose/toborrow">Könyv kiadása</a></li>
                        <li><a href="<?=BASEURL?>/book/choose/toreturn">Könyv visszavétele</a></li>						                        
                        <li><a href="<?=BASEURL?>/book/choose/toprolong">Hosszabbítás</a></li>	                        
                        <li><a href="<?=BASEURL?>/book/expired">Lejárt határidős könyvek</a></li>	                        			
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