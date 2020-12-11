        <article>
            <form method="POST" action="<?=BASEURL?>/user/changepwd">
                <div class="container">                    
                    <label for="password">Régi jelszó:</label>
                    <input type="password" id="password" name="old_password"><br/>
					<label for="password">Új jelszó:</label>
                    <input type="password" id="password" name="new_password1"><br/>
					<label for="password">Új jelszó:</label>
                    <input type="password" id="password" name="new_password2"><br/>
                    <input type="submit" name="submit" value="Jelszó módosítása">
                </div>
            </form>			
        </article>
    </body>
</html>

