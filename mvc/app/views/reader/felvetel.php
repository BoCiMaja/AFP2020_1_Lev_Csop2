        <article>
            <form method="POST" action="/AFP2020_1_Lev_Csop2/mvc/public/reader/register">
                <div class="container">          
                    <div class="column">
                            <label for="username">Felhasználó név:</label>
                            <input type="text" id="username" name="felhasznaloi_nev" tabindex="1"><br/>
                            <label for="csaladinev">Családi név:</label>
                            <input type="text" id="csaladinev" name="csaladi_nev" tabindex="3"><br/>						
                            <label for="szul_csaladinev">Születési családi név:</label>
                            <input type="text" id="szul_csaladinev" name="szuletesi_csaladi_nev" tabindex="5"><br/>												
                            <label for="szul_hely">Születési hely:</label>
                            <input type="text" id="szul_hely" name="szuletesi_hely" tabindex="7"><br/>						
                            <label for="anya_csaladinev">Anyja születési családi neve:</label>
                            <input type="text" id="anya_csaladinev" name="anyja_szuletesi_csaladi_neve" tabindex="9"><br/>		
                            <label for="irszam">Lakcím, irányítószám:</label>
                            <input type="number" id="irszam" name="lakcim_iranyitoszam" tabindex="11"><br/>						
                            <label for="utca">Lakcím, utca:</label>
                            <input type="text" id="utca" name="lakcim_utca" tabindex="13"><br/>
                            <label for="telefon">Telefonszám:</label>
                            <input type="number" id="telefon" name="telefonszam" tabindex="15"><br/>
                            <label for="azonosito">Olvasójegy azonosító:</label>
                            <input type="number" id="azonosito" name="olvasojegy_azonosito" tabindex="17"><br/>						
                    </div>
                    <div class="column">
                            <label for="password">Jelszó:</label>
                            <input type="text" id="password" name="jelszo" tabindex="2"><br/>
                            <label for="utonev">Utónév:</label>
                            <input type="text" id="utonev" name="utonev" tabindex="4"><br/>						
                            <label for="szul_utonev">Születési utónév:</label>
                            <input type="text" id="szul_utonev" name="szuletesi_utonev" tabindex="6"><br/>						
                            <label for="szul_datum">Születési dátum:</label>
                            <input type="text" id="szul_datum" name="szuletesi_datum" tabindex="8"><br/>
                            <label for="anya_utonev">Anyja születési utóneve:</label>
                            <input type="text" id="anya_utonev" name="anyja_szuletesi_utoneve" tabindex="10"><br/>					
                            <label for="varos">Lakcím, város:</label>
                            <input type="text" id="varos" name="lakcim_varos" tabindex="12"><br/>
                            <label for="hazszam">Lakcím, házszám:</label>
                            <input type="text" id="hazszam" name="lakcim_hazszam" tabindex="14"><br/>								
                            <label for="email">E-mail cím:</label>
                            <input type="email" id="email" name="email" tabindex="16"><br/>
                            <label for="tagsag_datum">Tagság érvényes:</label>
                            <input type="text" id="tagsag_datum" name="tagsag_ervenyesseg" tabindex="18"><br/>
                    </div>
                    <input type="submit" name="submit" value="Olvasó felvétele nyilvántartásba" tabindex="19">
                </div>
            </form>			
        </article>
    </body>
</html>

