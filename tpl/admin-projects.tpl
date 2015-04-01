<!-- INCLUDE BLOCK : header -->
<div role="main">
    <ul class="admin_nav">
        <li><a href="index.php?link=admin-projects">overzicht</a></li>
        <li>|</li>
        <li><a href="index.php?link=admin-projects&mode=add">toevoegen</a></li>
        <li>|</li>
        <li><a href="index.php?link=admin-projects&mode=search">Zoeken</a></li>
    </ul>

    <!-- START BLOCK : projectenLijst -->
    <h2>projecten Lijst</h2>
    <table class="table_gebruikers">
        <tr>
            <th>projectid</th>
            <th>Datum</th>
            <th>Schrijver</th>
            <th colspan="3">Titel</th>
        </tr>
        <!-- START BLOCK : projectenRow -->
        <tr>
            <td>{projectId}</td>
            <td>{datum}</td>
            <td>{schrijver}</td>
            <td>{titel}</td>
            <td><a class="edit" href="index.php?link=admin-projects&mode=edit&projectid={projectId}">Edit</a></td>
            <td><a class="delete" href="index.php?link=admin-projects&mode=delete&projectid={projectId}">Delete</a></td>
        </tr>
        <!-- END BLOCK : projectenRow -->
    </table>
    <!-- END BLOCK : projectenLijst -->

    <!-- START BLOCK : projectToevoegen -->
    <h2>projecten plaatsen</h2>
    <form class="input-gray" action="" method="POST">
        <fieldset>
            <div><input type="text" name="titel" class="title-input" placeholder=" Titel"></div>
            <div><textarea name="text" class="text-input" placeholder=" Tekst, er mogen html elementen worden gebruikt"></textarea></div>
            <input type="submit" name="submit" class="submit">
        </fieldset>
    </form>
    <!-- END BLOCK : projectToevoegen -->

    <!-- START BLOCK : projectEdit -->
    <h2>projecten aanpassen</h2>
    <form class="input-gray" action="" method="POST">
        <fieldset>
            <div><input type="text" name="titel" class="title-input" value="{titel}"placeholder=" Titel"></div>
            <div><textarea name="text" class="text-input" placeholder=" Tekst, er mogen html elementen worden gebruikt">{text}</textarea></div>
            <input type="submit" name="submit" class="submit">
        </fieldset>
    </form>
    <!-- END BLOCK : projectEdit -->
</div>
<!-- INCLUDE BLOCK : footer -->