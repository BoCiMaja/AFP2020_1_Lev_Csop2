<?php
    $book = $data['book'];    
    $freeList = $data['freelist'];    
    $borrowedList = $data['borrowedlist'];
?>
        <article>
            <form method="POST" action="konyvfelvetel_sikeres.html">
                <div class="container"> 
                    <div class="column">
                            <label for="szerzo">Szerző(k):</label>
                            <input type="text" id="szerzo" name="szerzo" tabindex="1" value="<?=$book->Szerzok?>" disabled><br/>
                            <label for="kiado">Kiadó:</label>
                            <input type="text" id="kiado" name="kiado" tabindex="3" value="<?=$book->Kiado?>" disabled><br/>
                            <label for="isbn_szam">ISBN száma:</label>
                            <input type="text" id="isbn_szam" name="isbn_szam" tabindex="5" value="<?=$book->ISBN?>" disabled><br/>
                            <label for="cutter">Cutter:</label>
                            <input type="text" id="cutter" name="cutter" tabindex="7" value="<?=$book->Cutter?>" disabled><br/>
                            <label for="targy_szavak">Tárgyszavak:</label>
                            <input type="text" id="targy_szavak" name="targy_szavak" tabindex="9" value="<?=$book->Targyszavak?>" disabled><br/>												
                    </div>
                    <div class="column">	
                            <label for="cim">Cím:</label>
                            <input type="text" id="cim" name="cim" tabindex="2" value="<?=$book->Cim?>" disabled><br/>
                            <label for="kiadasi_ev">Kiadási év:</label>
                            <input type="number" id="kiadasi_ev" name="kiadasi_ev" tabindex="4" value="<?=$book->Kiadasi_ev?>" disabled><br/>
                            <label for="oldal_szam">Oldalak száma:</label>
                            <input type="number" id="oldal_szam" name="oldal_szam" tabindex="6" value="<?=$book->Oldalak_szama?>" disabled><br/>												
                            <label for="eto">ETO jelzet:</label>
                            <input type="text" id="eto" name="eto" tabindex="8" value="<?=$book->ETO_jelzet?>" disabled><br/>						
                    </div>                    
                </div>
                <div class="container"> 
                    <table>
                        <tr>
                            <th class="bookid">Példány azonosító</th><th class="available">Kölcsönzési információ</th>
                        </tr>
                        <?php if ($freeList != null) {
                            foreach ($freeList as $item) :?>
                        <tr>						
                            <td class="bookid"><?=$item->Azonosito?></a></td>
                            <td class="available">kölcsönözhető</td>
                        </tr>					
                        <?php endforeach; } ?>
                        <?php if ($borrowedList != null) {
                            foreach ($borrowedList as $item) :?>
                        <tr>
                            <td class="bookid"><?=$item->Azonosito?></td>
                            <td class="available">kiadva: <?=$item->Hatarido?>-ig</td>							
                        </tr>
                        <?php endforeach; } ?>
                    </table>				
                </div>
            </form>			
        </article>
    </body>
</html>

