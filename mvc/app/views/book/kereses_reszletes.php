
        <article>
            <form method="POST" action="<?=BASEURL?>/book/detailedsearch">
                <div class="container"> 
                    <div class="column">
                            <label for="szerzok">Szerző(k):</label>
                            <input type="text" id="szerzok" name="szerzok" tabindex="1"><br/>
                            <label for="kiado">Kiadó:</label>
                            <input type="text" id="kiado" name="kiado" tabindex="3"><br/>
                            <label for="ISBN">ISBN száma:</label>
                            <input type="text" id="ISBN" name="ISBN" tabindex="5"><br/>
                            <label for="cutter">Cutter:</label>
                            <input type="text" id="cutter" name="cutter" tabindex="7"><br/>
                            <label for="targyszavak">Tárgyszavak:</label>
                            <input type="text" id="targyszavak" name="targyszavak" tabindex="9"><br/>												
                    </div>
                    <div class="column">	
                            <label for="cim">Cím:</label>
                            <input type="text" id="cim" name="cim" tabindex="2"><br/>
                            <label for="kiadasi_ev">Kiadási év:</label>
                            <input type="number" id="kiadasi_ev" name="kiadasi_ev" tabindex="4"><br/>
                            <label for="oldalak_szama">Oldalak száma:</label>
                            <input type="number" id="oldalak_szama" name="oldalak_szama" tabindex="6"><br/>												
                            <label for="ETO_jelzet">ETO jelzet:</label>
                            <input type="text" id="ETO_jelzet" name="ETO_jelzet" tabindex="8"><br/>
                            <label for="azonosito">Azonosító:</label>
                            <input type="number" id="azonosito" name="azonosito" tabindex="10"><br/>
                    </div>
                    <input type="submit" name="submit" value="Könyv keresése katalógusban" tabindex="11">
                </div>
            </form>			
        </article>
    </body>
</html>

