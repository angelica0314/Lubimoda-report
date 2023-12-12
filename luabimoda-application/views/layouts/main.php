<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

$this->registerCss("

    /* Estilo inicial para ocultar el menú desplegable */
    .dropdown-menu {
        display: none;
    }

    /* Estilo para mostrar el menú desplegable cuando el mouse pasa sobre la opción de menú */
    .dropdown:hover .dropdown-menu {
        display: block;
        
    }

    body {
        margin: 0;
        padding: 0;
    }
    
    /* Ajuste para llevar LogOut al final del menú */
    .navbar-nav {
        width: 100%;
        text-align: right; /* Alinea las opciones a la derecha */
    }
    
    .navbar-nav > li {
        float: none; /* Asegura que las opciones se muestren en línea */
        display: inline-block;
    }
    
");
AppAsset::register($this);
$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
echo Html::csrfMetaTags();
echo Html::cssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    if (Yii::$app->controller->id !== 'site' || Yii::$app->controller->action->id !== 'login') {
    NavBar::begin([
        'brandLabel' => 'LUABIMODA',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-secondary fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Ventas', 
            'items' => [
                ['label' => 'Consulta de ventas', 'url' => ['/venta/index']],
                ['label' => 'Listado de clientes', 'url' => ['/cliente/index']],
                ['label' => 'Lista de productos', 'url' => ['/producto/index']],
                ]
            ],
            ['label' => 'Pedidos', 
            'items' => [
                ['label' => 'Consulta de pedidos', 'url' => ['/pedido/index']],
                ['label' => 'Listado de proveedores', 'url' => ['/proveedor/index']],
                ['label' => 'Lista de materiales', 'url' => ['/material/index']],
                ]
            ],
            ['label' => 'Administración', 
            'items' => [
                ['label' => 'Listado de empleados', 'url' => ['/empleado/index']],
                ]
            ],
           /*['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],*/
            
           
            ['label' => 'Reportes', 
            'items' => [
                ['label' => 'Clientes fieles', 'url' => '#'],
                ['label' => 'Empleado del mes', 'url' => '#'],
                ]
            ],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Salir(' . Yii::$app->user->identity->username . ')',
                        ['class' => ' nav-link btn btn-link logout ']
                    )
                    . Html::endForm()
                    . '</li>'         
                    
        ]
    ]);
    NavBar::end();
    }
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
    <?php if (Yii::$app->controller->id !== 'site' || Yii::$app->controller->action->id !== 'login') {?>
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?php } ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; Servicio Nacional de Aprendizaje - Luabimoda : Angelica Lizarazo <?= date('Y') ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
