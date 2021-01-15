        
        <nav>         
            <ul class="topnav">
                <li><a href="<?=BASEURL?>/home/index">Kezdőlap</a></li>                
		<li class="dropdown"><a href="#">Katalógus</a>
                    <ul class="subnav">
                        <li><a href="<?=BASEURL?>/book/simplesearch">Egyszerű keresés</a></li>
                        <li><a href="<?=BASEURL?>/book/detailedsearch">Részletes keresés</a></li>
                    </ul>
                </li>
		<li><a href="<?=BASEURL?>/book/listmybooks">Könyveim</a></li>
                <li class="dropdown" id="user"><a href="#">Belépve: <?php echo $_SESSION['username']?></a>
                    <ul class="subnav">
                        <li><a href="<?=BASEURL?>/user/userdata">Személyes adatok</a></li>
			<li><a href="<?=BASEURL?>/user/changepwd">Jelszó csere</a></li>
                        <li><a href="<?=BASEURL?>/user/logout">Kijelentkezés</a>                        
                    </ul>
                </li>
            </ul>        
        </nav>