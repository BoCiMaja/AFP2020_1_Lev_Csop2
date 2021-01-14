<?php
    $reader = $data['reader'];
    $books = $data['books'];    
?>
        <article>			
            <div class="container"> 
                <div class="column">                    
                    <label for="azonosito">Olvasójegy azonosító:</label>												
                    <input type="number" id="azonosito" name="azonosito" tabindex="1" value="<?=$reader->Olvasojegy_azonosito?>"><br/>
                    <label for="tagsag">Tagság érvényes:</label>												
                    <input type="text" id="tagsag" name="tagsag" disabled value="<?=$reader->Tagsag_ervenyesseg?>"><br/>                    			
                </div>
                <div class="column">                    
                    <label for="olvasonev">Olvasó neve:</label>
                    <input type="text" id="olvasonev" name="olvasonev" tabindex="3" value="<?=$reader->Csaladi_nev?> <?=$reader->Utonev?>"><br/>
                    <label for="hatarido">Kölcsönzési határidő:</label>												
                    <input type="text" id="hatarido" name="hatarido" disabled value="lejárat plusz 1 hónap"><br/>                    		
                </div>                    
            </div>            
            <form method="POST" action="<?=BASEURL?>/book/toprolong/<?=$reader->Olvasojegy_azonosito?>">
                <div class="container">                    
                    <table>
                    <tr>
                        <th></th><th class="book">Jelenleg kikölcsönzött könyvek</th>
                                <th class="bookid">Azonosító</th>
                                <th class="days">Lejárat</th>
                    </tr>                    
                    <?php foreach ($books as $book) :?>
                    <tr>
                        <td><input type="checkbox" id="konyv1" name="<?=$book->Azonosito?>" value="" checked></td>
                        <td class="book"><?=$book->Szerzok?> : <?=$book->Cim?></td>
                        <td class="bookid"><?=$book->Azonosito?></td>
                        <td class="days"><?=$book->Hatarido?></td>
                    </tr>
                    <?php endforeach; ?>
                    </table>
                    <input type="submit" class="halfwidth" name="hosszabbitas" value="Kölcsönzési határidő hosszabbítása">					
                </div>
            </form>			            
        </article>
    </body>
</html>

