<?php
$operation = $data['operation'];
$librarians = $data['librarian'];
?>
        <article>	
	    <div class="container">
                <form method="POST" action="<?=BASEURL?>/librarian/choose/<?=$operation?>">
                    <table>					
                        <tr>
                            <th></th><th class="readerid">Felhasználó név</th><th class="name">Név</th><th class="address">Lakcím</th><th class="birthdate">Születési dátum</th>
                        </tr>
                        <?php foreach($librarians as $librarian) :?>
                        <tr>
                            <td><input type="radio" name="azonosito" value="<?=$librarian->Felhasznaloi_nev?>" checked="checked"></td>
                            <td class="readerid"><?=$librarian->Felhasznaloi_nev?></td>
                            <td class="name"><?=$librarian->Csaladi_nev?> <?=$librarian->Utonev?></td>
                            <td class="address"><?=$librarian->Lakcim_varos?> <?=$librarian->Lakcim_utca?> <?=$librarian->Lakcim_hazszam?></td>
                            <td class="birthdate"><?=$librarian->Szuletesi_datum?></td>
                        </tr>   
                        <?php endforeach;?>
                    </table>
                    <input type="submit" name="choosebyname" value="Könyvtáros kiválasztása" tabindex="4">
                </form>
            </div>
        </article>
    </body>
</html>

