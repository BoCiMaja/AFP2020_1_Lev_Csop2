<?php
$operation = $data['operation'];
?>
        <article>			
            <div class="container"> 
                    <div class="column">
                    <form method="POST" action="<?=BASEURL?>/librarian/choose/<?=$operation?>">
                            <label for="azonosito">Könyvtáros felhasználóneve:</label>												
                            <input type="text" id="azonosito" name="azonosito" tabindex="3"><br/>
                            <input type="submit" name="findbyid" value="Azonosítás" tabindex="2">
                    </form>
                    </div>
                    <div class="column">
                    <form method="POST" action="<?=BASEURL?>/librarian/choose/<?=$operation?>">
                            <label for="olvasonev">Könyvtáros neve:</label>
                            <input type="text" id="olvasonev" name="konyvtarosnev" tabindex="3"><br/>
                            <input type="submit" name="findbyname" value="Keresés nyilvántartásban" tabindex="4">
                    </form>			
                    </div>                    
            </div>            
        </article>
    </body>
</html>

