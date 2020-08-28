<?php
?>
<!-- <canvas id="noisebg" class="noise"></canvas> -->
<div class="dir">WEB</div>

<figure></figure>
<aside>
    <section class=" skills pfblock pfblock-gray">
            <div class="row">

                <div class="col-sm-6 col-sm-offset-3">

                    <div class="pfblock-header wow fadeInUp">
                        <h2 class="pfblock-title">This is what I do</h2>
                        <div class="pfblock-line"></div>

                    </div>

                </div>

            </div>

            <div class="row">


                <div class="col-sm-4">

                    <div class="iconbox wow slideInLeft">
                        <div class="iconbox-icon">
                            <span class="icon-puzzle"></span>
                        </div>
                        <div class="iconbox-text">
                            <h3 class="iconbox-title">Front-end</h3>

                        </div>
                    </div>

                </div>

                <div class="col-sm-4">

                    <div class="iconbox wow slideInRight">
                        <div class="iconbox-icon">
                            <span class="icon-puzzle"></span>
                        </div>
                        <div class="iconbox-text">
                            <h3 class="iconbox-title">Back-end</h3>

                        </div>
                    </div>

                </div>

                <div class="col-sm-4">

                    <div class="iconbox wow slideInRight">
                        <div class="iconbox-icon">
                            <span class="icon-question"></span>
                        </div>
                        <div class="iconbox-text">
                            <h3 class="iconbox-title">Consultation</h3>

                        </div>
                    </div>

                </div>

            </div><!-- .row -->
    </section>

    <section class="pfblock pfblock-gray" id="skills">


        <?

            if ($skills): ?>
        <div class="row skills">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="pfblock-header wow fadeInUp">
                            <h2 class="pfblock-title">My Skills</h2>
                            <div class="pfblock-line"></div>
                        </div>
                    </div>
                </div><!-- .row -->
                <? foreach ($skills as $skill): ?>
                    <div class="col-xs-6 col-md-<?= (integer)(12 / $count) ?> col-md-offset-  text-center" style="margin-left: <?= 12 % $count ?>%">
						<span data-percent="55" class="chart easyPieChart" style="width: 140px; height: 140px; line-height: 140px;">
                            <span class="percent"><?= $skill['skill_percent']; ?></span>
                        </span>
                        <h5 class="text-center"><?= $skill['skill_name'] ?></h5>
                    </div>
                <? endforeach; ?>
                <? endif; ?>
                <? if (!$skills): ?>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="pfblock-header wow fadeInUp">
                                <h2 class="pfblock-title">Sorry Skills is Empty</h2>
                                <div class="pfblock-line"></div>
                            </div>
                        </div>
                    </div>
                <? endif; ?>
            </div>
        </div>
    </section>

</aside>