<?php
$operation = $data['operation'];
?>
        <article>			
            <div class="container"> 
                    <div class="column">
                    <form method="POST" action="/AFP2020_1_Lev_Csop2/mvc/public/reader/choose/<?=$operation?>">
                            <label for="azonosito">Olvasójegy azonosító:</label>												
                            <input type="number" id="azonosito" name="azonosito" tabindex="3"><br/>
                            <input type="submit" name="findbyid" value="Azonosítás" tabindex="2">
                    </form>
                    </div>
                    <div class="column">
                    <form method="POST" action="/AFP2020_1_Lev_Csop2/mvc/public/reader/choose/<?=$operation?>">
                            <label for="olvasonev">Olvasó neve:</label>
                            <input type="text" id="olvasonev" name="olvasonev" tabindex="3"><br/>
                            <input type="submit" name="findbyname" value="Keresés nyilvántartásban" tabindex="4">
                    </form>			
                    </div>                    
            </div>            
        </article>
    </body>
</html>

