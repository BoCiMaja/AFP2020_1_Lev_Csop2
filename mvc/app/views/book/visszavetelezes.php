<?php 
    $reader = $data['reader'];
    if (isset($data['book']))
    {
        $azonosito = $data['book']->Azonosito;
        $szerzok = $data['book']->Szerzok;
        $kiado = $data['book']->Kiado;
        $cutter = $data['book']->Cutter;
        $targyszavak = $data['book']->Targyszavak;
        $isbn = $data['book']->ISBN;
        $cim = $data['book']->Cim;
        $kiadasi_ev = $data['book']->Kiadasi_ev;
        $oldalak_szama = $data['book']->Oldalak_szama;
        $eto_jelzet = $data['book']->ETO_jelzet;
    }
    else
    {
        $azonosito = '';
        $szerzok = '';
        $kiado = '';
        $cutter = '';
        $targyszavak = '';
        $isbn = '';
        $cim = '';
        $kiadasi_ev = '';
        $oldalak_szama ='';
        $eto_jelzet = '';
    }
    if (isset($data['delay']))
        $kesedelem = $data['delay'];
    else 
        $kesedelem = 0;

?>
        <article>			
            <div class="container"> 
                <div class="column">                    
                    <label for="azonosito">Olvasójegy azonosító:</label>												
                    <input type="number" id="azonosito" name="azonosito" tabindex="1" value="<?=$reader->Olvasojegy_azonosito?>"><br/>                                        			
                </div>
                <div class="column">                    
                    <label for="olvasonev">Olvasó neve:</label>
                    <input type="text" id="olvasonev" name="olvasonev" tabindex="3" value="<?=$reader->Csaladi_nev?> <?=$reader->Utonev?>"><br/>
                </div>                    
            </div>     
            <form method="POST" action="<?=BASEURL?>/book/toreturn/<?=$reader->Olvasojegy_azonosito?>/<?php if(isset($data['book'])) echo $azonosito; else echo 0;?>/<?=$kesedelem?>">
                <div class="container"> 
                    <div class="column">
                            <label for="azonosito">Azonosító:</label>
                            <input type="number" id="azonosito" name="azonosito" tabindex="1" value="<?=$azonosito?>" <?php if(isset($data['book'])):?>disabled<?php endif;?>><br/>
                            <label for="szerzok">Szerző(k):</label>
                            <input type="text" id="szerzok" name="szerzok" tabindex="3" value="<?=$szerzok?>" disabled><br/>
                            <label for="kiado">Kiadó:</label>
                            <input type="text" id="kiado" name="kiado" tabindex="5" value="<?=$kiado?>" disabled><br/>
                            <label for="cutter">Cutter:</label>
                            <input type="text" id="cutter" name="cutter" tabindex="7" value="<?=$cutter?>" disabled><br/>
                            <label for="targyszavak">Tárgyszavak:</label>
                            <input type="text" id="targyszavak" name="targyszavak" tabindex="9" value="<?=$targyszavak?>" disabled><br/>												
                            <input type="submit" name="adatlekeres" value="Adatok lekérése" tabindex="11">
                    </div>
                    <div class="column">	
                            <label for="ISBN">ISBN száma:</label>
                            <input type="number" id="isbn_szam" name="ISBN" tabindex="2" value="<?=$isbn?>" disabled><br/>
                            <label for="cim">Cím:</label>
                            <input type="text" id="cim" name="cim" tabindex="4" value="<?=$cim?>" disabled><br/>
                            <label for="kiadasi_ev">Kiadási év:</label>
                            <input type="number" id="kiadasi_ev" name="kiadasi_ev" tabindex="6" value="<?=$kiadasi_ev?>" disabled><br/>
                            <label for="oldalak_szama">Oldalak száma:</label>
                            <input type="number" id="oldalak_szama" name="oldalak_szama" tabindex="8" value="<?=$oldalak_szama?>" disabled><br/>												
                            <label for="ETO_jelzet">ETO jelzet:</label>
                            <input type="text" id="ETO_jelzet" name="ETO_jelzet" tabindex="10" value="<?=$eto_jelzet?>" disabled><br/>						
                            <input type="submit" name="visszavetel" value="Könyv visszavételezése" tabindex="12">
                    </div>     					
                </div>
            </form>
            <form method="POST" action="<?=BASEURL?>/book/toreturn/<?=$reader->Olvasojegy_azonosito?>/0/<?=$kesedelem?>">
                <div class="container">
                    <div class="column">
                        <label for="kesedelem">Késedelmes napok száma összesen:</label>
                        <input type="number" name="kesedelem" value="<?=$kesedelem?>">
                    </div>
                    <div class="column">
                        <input type="submit" name="befejezes" value="Visszavétel vége" tabindex="13">
                    </div>
                </div>
            </form>                            		
        </article>
    </body>
</html>

