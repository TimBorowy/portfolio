<!-- INCLUDE BLOCK : header -->
<div role="main">
    <ul class="admin_nav">
        <li><a href="index.php?link=admin-blog">overzicht</a></li>
        <li>|</li>
        <li><a href="index.php?link=admin-blog&mode=add">toevoegen</a></li>
        <li>|</li>
        <li><a href="index.php?link=admin-blog&mode=search">Zoeken</a></li>
    </ul>

    <!-- START BLOCK : blogLijst -->
    <h2>Blog Lijst</h2>
    <table class="table_gebruikers">
        <tr>
            <th>Blogid</th>
            <th>Datum</th>
            <th>Schrijver</th>
            <th colspan="3">Titel</th>
        </tr>
        <!-- START BLOCK : blogRow -->
        <tr>
            <td>{blogId}</td>
            <td>{datum}</td>
            <td>{schrijver}</td>
            <td>{titel}</td>
            <td><a class="edit" href="index.php?link=admin-blog&mode=edit&blogid={blogId}">Edit</a></td>
            <td><a class="delete" href="index.php?link=admin-blog&mode=delete&blogid={blogId}">Delete</a></td>
        </tr>
        <!-- END BLOCK : blogRow -->
    </table>
    <!-- END BLOCK : blogLijst -->

    <!-- START BLOCK : blogToevoegen -->
    <h2>Blog plaatsen</h2>
    <form class="input-gray" action="" method="POST">
        <fieldset>
            <div><input type="text" name="titel" class="title-input" placeholder=" Titel"></div>
            <div><textarea name="text" class="text-input" placeholder=" Tekst, er mogen html elementen worden gebruikt"></textarea></div>
            <input type="submit" name="submit" class="submit">
        </fieldset>
    </form>
    <!-- END BLOCK : blogToevoegen -->

    <!-- START BLOCK : blogEdit -->
    <h2>Blog aanpassen</h2>
    <form class="input-gray" action="" method="POST">
        <fieldset>
            <div><input type="text" name="titel" class="title-input" value="{titel}"placeholder=" Titel"></div>
            <div><textarea name="text" class="text-input" placeholder=" Tekst, er mogen html elementen worden gebruikt">{text}</textarea></div>
            <input type="submit" name="submit" class="submit">
        </fieldset>
    </form>
    <!-- END BLOCK : blogEdit -->
</div>
<!-- INCLUDE BLOCK : footer -->