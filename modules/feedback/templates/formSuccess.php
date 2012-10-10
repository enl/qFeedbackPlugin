<h1 class="heading">Обратная связь</h1>
<form action="<?php echo url_for('@feedback_submit'); ?>" method="post" class="b-form">
    <fieldset class="main">
        <?php echo $form; ?>
    </fieldset>
    <fieldset class="submit">
        <input type="submit" value="Отправить" />
    </fieldset>
</form>