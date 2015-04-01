<!-- INCLUDE BLOCK : header -->
<div role="main">
    <fieldset>
        <form class="input-gray" action="index.php?link=10" method="POST">
            <div><h2>Aanmelden</h2>
            </div>
            <div><input class="normal-input" type="text" name="v_naam" placeholder=" Voornaam:" required>
            </div>
            <div><input class="normal-input" type="text" name="a_naam" placeholder=" Achternaam:" required>
            </div>
            <div><input class="normal-input" type="text" name="username" placeholder=" Username:">
            </div>
            <div><input class="normal-input" type="email" name="email" placeholder=" Email:" required>
            </div>
            <div><input class="normal-input" type="password" name="wachtwoord" placeholder=" Wachtwoord:" required>
            </div>
            <div><input class="normal-input" type="password" name="wachtwoord_2" placeholder=" Wachtwoord opnieuw:" required>
            </div>
            <div><label for="date">Geboorte datum</label>
            </div>
            <div><input class="normal-input" type="date" id="date" name="geboorte_dat" required>
            </div>
            <div><label for="radio-Man">Man</label> <input type="radio" name="geslacht" id="radio-Man" value="Man" required>
                <label for="radio-Vrouw">Vrouw</label> <input type="radio" name="geslacht" id="radio-Vrouw" value="Vrouw" required>
            </div>
            <div><input class="submit" type="submit">
            </div>
        </form>
    </fieldset>
</div>
<!-- INCLUDE BLOCK : footer -->