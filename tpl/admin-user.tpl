<!-- INCLUDE BLOCK : header -->
<div role="main">
    <ul class="admin_nav">
        <li><a href="index.php?link=admin-user">overzicht</a></li>
        <li>|</li>
        <li><a href="index.php?link=admin-user&mode=add">toevoegen</a></li>
    </ul>

    <!-- START BLOCK : userLijst -->
    <h2>Gebruiker Lijst</h2>
    <table class="table_gebruikers">
        <tr>
            <th>Userid</th>
            <th>Username</th>
            <th colspan="3">Role</th>
        </tr>
        <!-- START BLOCK : userRow -->
        <tr>
            <td>{userId}</td>
            <td>{userName}</td>
            <td>{userRole}</td>
            <td><a class="edit"href="index.php?link=admin-user&mode=edit&userid={userId}">Edit</a></td>
            <td><a class="delete" href="index.php?link=admin-user&mode=delete&userid={userId}">Delete</a></td>
        </tr>
        <!-- END BLOCK : userRow -->
    </table>
    <!-- END BLOCK : userLijst -->

    <!-- START BLOCK : userToevoegen -->
    <fieldset>
        <form class="input-gray" action="" method="POST">
            <div><h2>gebruiker toevoegen</h2>
            </div>
            <div><input class="normal-input" type="text" name="voornaam" placeholder=" Voornaam:" required>
            </div>
            <div><input class="normal-input" type="text" name="achternaam" placeholder=" Achternaam:" required>
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
            <div><input class="normal-input" type="date" id="date" name="geboortedatum" required>
            </div>
            <div><label for="radio-Man">Man</label> <input type="radio" name="geslacht" id="radio-Man" value="Man" required>
                <label for="radio-Vrouw">Vrouw</label> <input type="radio" name="geslacht" id="radio-Vrouw" value="Vrouw" required>
            </div>
            <div><label for="roleSelect">Role: </label>
                <select id="roleSelect" name="role">
                    <option value="0">gebruiker</option>
                    <option value="1">comment admin</option>
                    <option value="2">blog admin</option>
                    <option value="3">user admin</option>
                    <option value="4">admin</option>
                </select>
            </div>
            <div><input class="submit" name="submit" type="submit">
            </div>
        </form>
    </fieldset>
    <!-- END BLOCK : userToevoegen -->

    <!-- START BLOCK : userEdit -->
    <fieldset>
        <form class="input-gray" action="" method="POST">
            <div><h2>gebruiker aanpassen</h2>
            </div>
            <div><input class="normal-input" type="text" name="voornaam" value="{voornaam}" placeholder=" Voornaam:" required>
            </div>
            <div><input class="normal-input" type="text" name="achternaam" value="{achternaam}" placeholder=" Achternaam:" required>
            </div>
            <div><input class="normal-input" type="text" name="username" value="{username}" placeholder=" Username:">
            </div>
            <div><input class="normal-input" type="email" name="email" value="{email}" placeholder=" Email:" required>
            </div>
            <div><label for="date">Geboorte datum</label>
            </div>
            <div><input class="normal-input" type="date" id="date" name="geboortedatum" value="{geboorte_dat}" required>
            </div>
            <div><label for="radio-Man">Man</label> <input type="radio" name="geslacht" id="radio-Man" value="Man" {checkedMan} required>
                <label for="radio-Vrouw">Vrouw</label> <input type="radio" name="geslacht" id="radio-Vrouw" value="Vrouw" {checkedVrouw} required>
            </div>
            <div><label for="roleSelect">Role: </label><select id="roleSelect" name="role">
                    <option value="0" {selected0}>gebruiker</option>
                    <option value="1" {selected1}>comment admin</option>
                    <option value="2" {selected2}>blog admin</option>
                    <option value="3" {selected3}>user admin</option>
                    <option value="4" {selected4}>admin</option>
                </select>
            </div>
            <div><input class="submit" name="submit" type="submit">
            </div>
        </form>
    </fieldset>
    <!-- END BLOCK : userEdit -->
</div>
<!-- INCLUDE BLOCK : footer -->