<?php

/** @var yii\web\View $this */
/** @var string $content */
use app\assets\PublicAsset;
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="is-preload">
<?php $this->beginBody() ?>

    <!-- Content -->
            <?= $content?>

        <!-- Sidebar -->
            <div id="sidebar">

                <!-- Logo -->
                    <h1 id="logo"><a href="index.php">KARELECTRO</a></h1>

                <!-- Nav -->
                    <nav id="nav">
                        <ul>
                            <li><?= Html::a('Руководителю', ['moder'], ['class' => 'btn btn-success']) ?></li>
                            <li><?= Html::a('Детали', ['add'], ['class' => 'btn btn-success']) ?></li>
                            <li><?= Html::a('ГСМ', ['oil'], ['class' => 'btn btn-success']) ?></li>
                            <li><?= Html::a('Счета', ['pays'], ['class' => 'btn btn-success']) ?></li>
                            <li><?= Html::a('Работы', ['works'], ['class' => 'btn btn-success']) ?></li>
                        </ul>
                    </nav>

                <!-- Search -->
                    <section class="box search">
                        <form method="post" action="#">
                            <input type="text" class="text" name="search" placeholder="Search" />
                        </form>
                    </section>

                <!-- Text -->
                    <section class="box text-style1">
                        <div class="inner">
                            <p>
                                <strong>Striped:</strong> A free and fully responsive HTML5 site
                                template designed by <a href="http://twitter.com/ajlkn">AJ</a> for <a href="http://html5up.net/">HTML5 UP</a>
                            </p>
                        </div>
                    </section>

                <!-- Recent Posts -->
                    <section class="box recent-posts">
                        <header>
                            <h2>Recent Posts</h2>
                        </header>
                        <ul>
                            <li><a href="#">Lorem ipsum dolor</a></li>
                            <li><a href="#">Feugiat nisl aliquam</a></li>
                            <li><a href="#">Sed dolore magna</a></li>
                            <li><a href="#">Malesuada commodo</a></li>
                            <li><a href="#">Ipsum metus nullam</a></li>
                        </ul>
                    </section>

                <!-- Recent Comments -->
                    <section class="box recent-comments">
                        <header>
                            <h2>Recent Comments</h2>
                        </header>
                        <ul>
                            <li>case on <a href="#">Lorem ipsum dolor</a></li>
                            <li>molly on <a href="#">Sed dolore magna</a></li>
                            <li>case on <a href="#">Sed dolore magna</a></li>
                        </ul>
                    </section>

                <!-- Calendar -->
                    <section class="box calendar">
                        <div class="inner">
                            <table>
                                <caption>July 2014</caption>
                                <thead>
                                    <tr>
                                        <th scope="col" title="Monday">M</th>
                                        <th scope="col" title="Tuesday">T</th>
                                        <th scope="col" title="Wednesday">W</th>
                                        <th scope="col" title="Thursday">T</th>
                                        <th scope="col" title="Friday">F</th>
                                        <th scope="col" title="Saturday">S</th>
                                        <th scope="col" title="Sunday">S</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="pad"><span>&nbsp;</span></td>
                                        <td><span>1</span></td>
                                        <td><span>2</span></td>
                                        <td><span>3</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>4</span></td>
                                        <td><span>5</span></td>
                                        <td><a href="#">6</a></td>
                                        <td><span>7</span></td>
                                        <td><span>8</span></td>
                                        <td><span>9</span></td>
                                        <td><a href="#">10</a></td>
                                    </tr>
                                    <tr>
                                        <td><span>11</span></td>
                                        <td><span>12</span></td>
                                        <td><span>13</span></td>
                                        <td class="today"><a href="#">14</a></td>
                                        <td><span>15</span></td>
                                        <td><span>16</span></td>
                                        <td><span>17</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>18</span></td>
                                        <td><span>19</span></td>
                                        <td><span>20</span></td>
                                        <td><span>21</span></td>
                                        <td><span>22</span></td>
                                        <td><a href="#">23</a></td>
                                        <td><span>24</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">25</a></td>
                                        <td><span>26</span></td>
                                        <td><span>27</span></td>
                                        <td><span>28</span></td>
                                        <td class="pad" colspan="3"><span>&nbsp;</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>

                <!-- Copyright -->
                    <ul id="copyright">
                        <li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>

            </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
