<!-- INCLUDE BLOCK : header -->
<div role="main">
    <!-- START BLOCK : blogPost -->
    <a href="index.php?link=blog&mode=detail&blogid={blogid}"><div class='blog-rest'>
        <h2>{titel}</h2>
        <p style='font-size: 12px'>({date})({schrijver})</p>
        {text}
    </div>
    </a>
    <!-- END BLOCK : blogPost -->

    <!-- START BLOCK : blogDetail -->
    <ul class="admin_nav">
        <li><a href="index.php?link=blog">terug naar overzicht</a></li>
    </ul>
    <div class='blog-rest'>
        <h2>{titel}</h2>
        <p style='font-size: 12px'>({date})({schrijver})</p>
        {text}
    </div>
    <div class="divComments">
        <h2>Comments</h2>
        <form class="input-gray" action="" method="POST">
            <div class="addReaguursel">
            <textarea name="comment-text" class="text-input-comment" placeholder=" Geef een reactie"></textarea>
            <input type="submit" name="submit" class="submit">
            </div>
        </form>
    <!-- START BLOCK : comments -->
        <div class="divReactie">
        <p><span id="reaguurdert">{comm_schrijver}</span> | <span id="reaguursel_datum">{comm_date}</span></p>
        <p>{comm_text}</p>
        </div>
    <!-- END BLOCK : comments -->
    </div>
    <!-- END BLOCK : blogDetail -->
</div>
<!-- INCLUDE BLOCK : footer -->