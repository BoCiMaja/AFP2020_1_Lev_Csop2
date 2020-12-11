<?php 
$userdata = $data['userdata'];
?>
    
        <article>
            <form method="POST" action="<?=BASEURL?>/user/update">
                <div class="container">                    
                    <div class="column">						
                            <label for="csaladinev">Családi név:</label>
                            <input type="text" id="csaladinev" name="csaladinev" tabindex="1" disabled value=<?=$userdata->Csaladi_nev?>><br/>						
                            <label for="szul_csaladinev">Születési családi név:</label>
                            <input type="text" id="szul_csaladinev" name="szul_csaladinev" tabindex="3" disabled  value=<?=$userdata->Szuletesi_csaladi_nev?>><br/>												
                            <label for="szul_hely">Születési hely:</label>
                            <input type="text" id="szul_hely" name="szul_hely" tabindex="5" disabled  value=<?=$userdata->Szuletesi_hely?>><br/>						
                            <label for="anya_csaladinev">Anyja születési családi neve:</label>
                            <input type="text" id="anya_csaladinev" name="anya_csaladinev" tabindex="7" disabled value=<?=$userdata->Anyja_szuletesi_csaladi_neve?>><br/>		
                            <label for="irszam">Lakcím, irányítószám:</label>
                            <input type="number" id="irszam" name="irszam" tabindex="9" disabled value=<?=$userdata->Lakcim_iranyitoszam?>><br/>						
                            <label for="utca">Lakcím, utca:</label>
                            <input type="text" id="utca" name="utca" tabindex="11" disabled value=<?=$userdata->Lakcim_utca?>><br/>
                            <label for="telefon">Telefonszám:</label>
                            <input type="number" id="telefon" name="telefon" tabindex="13" value=<?=$userdata->Telefonszam?>><br/>												
                    </div>
                    <div class="column">						
                            <label for="utonev">Utónév:</label>
                            <input type="text" id="utonev" name="utonev" tabindex="2" disabled value=<?=$userdata->Utonev?>><br/>						
                            <label for="szul_utonev">Születési utónév:</label>
                            <input type="text" id="szul_utonev" name="szul_utonev" tabindex="4" disabled value=<?=$userdata->Szuletesi_utonev?>><br/>						
                            <label for="szul_datum">Születési dátum:</label>
                            <input type="text" id="szul_datum" name="szul_datum" tabindex="6" disabled value=<?=$userdata->Szuletesi_datum?>><br/>
                            <label for="anya_utonev">Anyja születési utóneve:</label>
                            <input type="text" id="anya_utonev" name="anya_utonev" tabindex="8" disabled value=<?=$userdata->Anyja_szuletesi_utoneve?>><br/>					
                            <label for="varos">Lakcím, város:</label>
                            <input type="text" id="varos" name="varos" tabindex="10" disabled value=<?=$userdata->Lakcim_varos?>><br/>
                            <label for="hazszam">Lakcím, házszám:</label>
                            <input type="text" id="hazszam" name="hazszam" tabindex="12" disabled value=<?=$userdata->Lakcim_hazszam?>><br/>								
                            <label for="email">E-mail cím:</label>
                            <input type="email" id="email" name="email" tabindex="14" value=<?=$userdata->Email?>><br/>						
                    </div>
                    <input type="submit" name="submit" value="Telefonszám vagy e-mail cím módosítása" tabindex="15">
                </div>
            </form>			
        </article>
    </body>
</html>