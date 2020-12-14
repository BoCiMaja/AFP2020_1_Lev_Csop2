<?php 
$operation = $data['operation'];
$reader = $data['reader'];
?>
        <article>
            <form method="POST" action="<?=BASEURL?>/reader/process/<?=$operation?>">
                <div class="container">                    
                    <div class="column">
                            <label for="azonosito">Olvasójegy azonosító:</label>
                            <input type="number" id="azonosito" name="olvasojegy_azonosito" tabindex="1" value="<?=$reader->Olvasojegy_azonosito?>" disabled><br/>					                            
                            <label for="csaladinev">Családi név:</label>
                            <input type="text" id="csaladinev" name="csaladi_nev" tabindex="3" value="<?=$reader->Csaladi_nev?>" <?php if($operation!='update'):?>disabled<?php endif;?>><br/>						
                            <label for="szul_csaladinev">Születési családi név:</label>
                            <input type="text" id="szul_csaladinev" name="szuletesi_csaladi_nev" tabindex="5" value="<?=$reader->Szuletesi_csaladi_nev?>" disabled><br/>												
                            <label for="szul_hely">Születési hely:</label>
                            <input type="text" id="szul_hely" name="szul_hely" tabindex="7" value="<?=$reader->Szuletesi_hely?>" disabled><br/>						
                            <label for="anya_csaladinev">Anyja születési családi neve:</label>
                            <input type="text" id="anya_csaladinev" name="anyja_szuletesi_csaladi_neve" tabindex="9" value="<?=$reader->Anyja_szuletesi_csaladi_neve?>" disabled><br/>		
                            <label for="irszam">Lakcím, irányítószám:</label>
                            <input type="number" id="irszam" name="lakcim_iranyitoszam" tabindex="11" value="<?=$reader->Lakcim_iranyitoszam?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>						
                            <label for="utca">Lakcím, közterület neve:</label>
                            <input type="text" id="utca" name="lakcim_utca" tabindex="13" value="<?=$reader->Lakcim_utca?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>
                            <label for="telefon">Telefonszám:</label>
                            <input type="number" id="telefon" name="telefonszam" tabindex="15" value="<?=$reader->Telefonszam?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>
                    </div>
                    <div class="column">
                            <label for="tagsag_datum">Tagság érvényes:</label>
                            <input type="text" id="tagsag_datum" name="tagsag_ervenyesseg" tabindex="2" value="<?=$reader->Tagsag_ervenyesseg?>" disabled><br/>					
                            <label for="utonev">Utónév:</label>
                            <input type="text" id="utonev" name="utonev" tabindex="4" value="<?=$reader->Utonev?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>						
                            <label for="szul_utonev">Születési utónév:</label>
                            <input type="text" id="szul_utonev" name="szuletesi_utonev" tabindex="6"  value="<?=$reader->Szuletesi_utonev?>" disabled><br/>						
                            <label for="szul_datum">Születési dátum:</label>
                            <input type="text" id="szul_datum" name="szuletesi_datum" tabindex="8" value="<?=$reader->Szuletesi_datum?>" disabled><br/>
                            <label for="anya_utonev">Anyja születési utóneve:</label>
                            <input type="text" id="anya_utonev" name="anyja_szuletesi_utoneve" tabindex="10" value="<?=$reader->Anyja_szuletesi_utoneve?>" disabled><br/>					
                            <label for="varos">Lakcím, város:</label>
                            <input type="text" id="varos" name="lakcim_varos" tabindex="12" value="<?=$reader->Lakcim_varos?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>
                            <label for="hazszam">Lakcím, házszám:</label>
                            <input type="text" id="hazszam" name="lakcim_hazszam" tabindex="14" value="<?=$reader->Lakcim_hazszam?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>								
                            <label for="email">E-mail cím:</label>
                            <input type="email" id="email" name="email" tabindex="16" value="<?=$reader->Email?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>											
                    </div>
                    <input type="hidden" name="olvasojegy_azonosito" value="<?=$reader->Olvasojegy_azonosito?>">
                    <input type="hidden" name="tagsag_ervenyesseg" value="<?=$reader->Tagsag_ervenyesseg?>">
                    <?php if($operation == 'update') :?>
                        <input type="submit" name="update" value="Adatok módosítása" tabindex="18">
                    <?php elseif ($operation == 'delete') :?>
                        <input type="submit" name="delete" value="Tagság megszüntetése" tabindex="18">
                    <?php elseif ($operation == 'prolong') :?>
                        <input type="submit" name="prolong" value="Tagság meghosszabbítása" tabindex="18">
                    <?php endif; ?>
                </div>				
            </form>			
        </article>
    </body>
</html>

