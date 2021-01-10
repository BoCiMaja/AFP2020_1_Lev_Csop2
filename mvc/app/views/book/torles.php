<?php
if (isset($data[0])){
        $book = $data[0];
        $azonosito=$book->Azonosito;
        $isbn=$book->ISBN;
        $szerzok=$book->Szerzok;
        $cim=$book->Cim;
        $kiado=$book->Kiado;
        $kiadasi_ev=$book->Kiadasi_ev;
        $cutter=$book->Cutter;
        $eto_jelzet=$book->ETO_jelzet;
        $oldalak_szama=$book->Oldalak_szama;
        $targyszavak=$book->Targyszavak;     
    }
    else {
        $azonosito='';
        $isbn='';
        $szerzok='';
        $cim='';
        $kiado='';
        $kiadasi_ev='';
        $cutter='';
        $eto_jelzet='';
        $oldalak_szama='';
        $targyszavak='';        
    }
?>
        <article>
            <form method="POST" action="">
                <div class="container"> 
                    <div class="column">
                            <label for="azonosito">Azonosító:</label>
                            <input type="number" id="azonosito" name="azonosito" tabindex="1" value="<?=$azonosito?>"><br/>
                            <label for="szerzok">Szerző(k):</label>
                            <input type="text" id="szerzok" name="szerzok" tabindex="3" value="<?=$szerzok?>"><br/>
                            <label for="kiado">Kiadó:</label>
                            <input type="text" id="kiado" name="kiado" tabindex="5" value="<?=$kiado?>"><br/>
                            <label for="cutter">Cutter:</label>
                            <input type="text" id="cutter" name="cutter" tabindex="7" value="<?=$cutter?>"><br/>
                            <label for="targyszavak">Tárgyszavak:</label>
                            <input type="text" id="targyszavak" name="targyszavak" tabindex="9" value="<?=$targyszavak?>"><br/>												
                            <input type="submit" name="getdata" value="Adatok lekérése" tabindex="11">
                    </div>
                    <div class="column">	
                            <label for="ISBN">ISBN száma:</label>
                            <input type="number" id="ISBN" name="ISBN" tabindex="2" value="<?=$isbn?>"><br/>
                            <label for="cim">Cím:</label>
                            <input type="text" id="cim" name="cim" tabindex="4" value="<?=$cim?>"><br/>
                            <label for="kiadasi_ev">Kiadási év:</label>
                            <input type="number" id="kiadasi_ev" name="kiadasi_ev" tabindex="6" value="<?=$kiadasi_ev?>"><br/>
                            <label for="oldalak_szama">Oldalak száma:</label>
                            <input type="number" id="oldalak_szama" name="oldalak_szama" tabindex="8" value="<?=$oldalak_szama?>"><br/>												
                            <label for="ETO_jelzet">ETO jelzet:</label>
                            <input type="text" id="ETO_jelzet" name="ETO_jelzet" tabindex="10" value="<?=$eto_jelzet?>"><br/>						
                            <input type="submit" name="delete" value="Könyvpéldány törlése a katalógusból" tabindex="12">
                    </div>                    
                </div>
            </form>			
        </article>
    </body>
</html>

