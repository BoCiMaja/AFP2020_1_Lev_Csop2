<?php
$operation = $data['operation'];
$users = $data['users'];
?>
        <article>	
	    <div class="container">
                    <form method="POST" action="/AFP2020_1_Lev_Csop2/mvc/public/reader/choose/<?=$operation?>">
                        <table>					
                            <tr>
                                <th></th><th class="readerid">Olvasójegy szám</th><th class="name">Név</th><th class="address">Lakcím</th><th class="birthdate">Születési dátum</th>
                            </tr>
                            <?php foreach($users as $user) :?>
                            <tr>
                                <td><input type="radio" name="azonosito" value="<?=$user->Olvasojegy_azonosito?>" checked="true"></td>
                                <td class="readerid"><?=$user->Olvasojegy_azonosito?></td>
                                <td class="name"><?=$user->Csaladi_nev?> <?=$user->Utonev?></td>
                                <td class="address"><?=$user->Lakcim_varos?> <?=$user->Lakcim_utca?> <?=$user->Lakcim_hazszam?></td>
                                <td class="birthdate"><?=$user->Szuletesi_datum?></td>
                            </tr>   
                            <?php endforeach;?>
                        </table>
                        <input type="submit" name="choosebyname" value="Olvasó kiválasztása" tabindex="4">
                    </form>
            </div>
        </article>
    </body>
</html>

