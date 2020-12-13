<?php 
$operation = $data['operation'];
$librarian = $data['librarian'];
?>
        <article>
            <form method="POST" action="<?=BASEURL?>/librarian/process/<?=$operation?>">
                <div class="container">                    
                    <div class="column">
                            <label for="csaladinev">Családi név:</label>
                            <input type="text" id="csaladinev" name="csaladi_nev" tabindex="3" value="<?=$librarian->Csaladi_nev?>" <?php if($operation!='update'):?>disabled<?php endif;?>><br/>						
                            <label for="szul_csaladinev">Születési családi név:</label>
                            <input type="text" id="szul_csaladinev" name="szuletesi_csaladi_nev" tabindex="5" value="<?=$librarian->Szuletesi_csaladi_nev?>" disabled><br/>												
                            <label for="szul_hely">Születési hely:</label>
                            <input type="text" id="szul_hely" name="szul_hely" tabindex="7" value="<?=$librarian->Szuletesi_hely?>" disabled><br/>						
                            <label for="anya_csaladinev">Anyja születési családi neve:</label>
                            <input type="text" id="anya_csaladinev" name="anyja_szuletesi_csaladi_neve" tabindex="9" value="<?=$librarian->Anyja_szuletesi_csaladi_neve?>" disabled><br/>		
                            <label for="irszam">Lakcím, irányítószám:</label>
                            <input type="number" id="irszam" name="lakcim_iranyitoszam" tabindex="11" value="<?=$librarian->Lakcim_iranyitoszam?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>						
                            <label for="utca">Lakcím, utca:</label>
                            <input type="text" id="utca" name="lakcim_utca" tabindex="13" value="<?=$librarian->Lakcim_utca?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>
                            <label for="telefon">Telefonszám:</label>
                            <input type="number" id="telefon" name="telefonszam" tabindex="15" value="<?=$librarian->Telefonszam?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>
                            <input type="checkbox" id="admin" name="admin" tabindex="17" <?=$librarian->Adminisztrator=='1'?'checked':''?> <?=$operation == 'delete'?'disabled':''?>>
                            <label for="admin">Adminisztárori jogosultság</label>
                    </div>
                    <div class="column">
                            <label for="utonev">Utónév:</label>
                            <input type="text" id="utonev" name="utonev" tabindex="2" value="<?=$librarian->Utonev?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>						
                            <label for="szul_utonev">Születési utónév:</label>
                            <input type="text" id="szul_utonev" name="szuletesi_utonev" tabindex="4"  value="<?=$librarian->Szuletesi_utonev?>" disabled><br/>						
                            <label for="szul_datum">Születési dátum:</label>
                            <input type="text" id="szul_datum" name="szuletesi_datum" tabindex="6" value="<?=$librarian->Szuletesi_datum?>" disabled><br/>
                            <label for="anya_utonev">Anyja születési utóneve:</label>
                            <input type="text" id="anya_utonev" name="anyja_szuletesi_utoneve" tabindex="8" value="<?=$librarian->Anyja_szuletesi_utoneve?>" disabled><br/>					
                            <label for="varos">Lakcím, város:</label>
                            <input type="text" id="varos" name="lakcim_varos" tabindex="10" value="<?=$librarian->Lakcim_varos?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>
                            <label for="hazszam">Lakcím, házszám:</label>
                            <input type="text" id="hazszam" name="lakcim_hazszam" tabindex="12" value="<?=$librarian->Lakcim_hazszam?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>								
                            <label for="email">E-mail cím:</label>
                            <input type="email" id="email" name="email" tabindex="14" value="<?=$librarian->Email?>" <?php if ($operation!='update'):?>disabled<?php endif;?>><br/>											
                    </div>
                    <input type="hidden" name="felhasznaloi_nev" value="<?=$librarian->Felhasznaloi_nev?>">
                    <?php if($operation == 'update') :?>
                        <input type="submit" name="update" value="Adatok módosítása" tabindex="18">
                    <?php elseif ($operation == 'delete') :?>
                        <input type="submit" name="delete" value="Törlés a nyilvántartásból" tabindex="18">
                    <?php endif; ?>
                </div>				
            </form>			
        </article>
    </body>
</html>

