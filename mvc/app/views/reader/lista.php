<?php
$operation = $data['operation'];
$readers = $data['readers'];
?>
        <article>	
	    <div class="container">
                    <form method="POST" action="/AFP2020_1_Lev_Csop2/mvc/public/reader/choose/<?=$operation?>">
                        <table>					
                            <tr>
                                <th></th><th class="readerid">Olvasójegy szám</th><th class="name">Név</th><th class="address">Lakcím</th><th class="birthdate">Születési dátum</th>
                            </tr>
                            <?php foreach($readers as $reader) :?>
                            <tr>
                                <td><input type="radio" name="azonosito" value="<?=$reader->Olvasojegy_azonosito?>" checked="true"></td>
                                <td class="readerid"><?=$reader->Olvasojegy_azonosito?></td>
                                <td class="name"><?=$reader->Csaladi_nev?> <?=$reader->Utonev?></td>
                                <td class="address"><?=$reader->Lakcim_varos?> <?=$reader->Lakcim_utca?> <?=$reader->Lakcim_hazszam?></td>
                                <td class="birthdate"><?=$reader->Szuletesi_datum?></td>
                            </tr>   
                            <?php endforeach;?>
                        </table>
                        <input type="submit" name="choosebyname" value="Olvasó kiválasztása" tabindex="4">
                    </form>
            </div>
        </article>
    </body>
</html>

