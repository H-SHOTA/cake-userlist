
<html>
	<head>
    <?= $this->Html->css('style.css') ?>
	</head>
    <body>
        <h1><?= $title ?></h1>
        <?= $this->fetch('content') ?>
    </body>
</html>