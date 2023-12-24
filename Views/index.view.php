<?php
views("partials/head.view.php");
?>
<div class="App">
    <main class="main__wrapper">
        <form class="age__form" action="/results" method="POST">
            <div>
                <label for="day" class="<?= isset($_SESSION['dayError'])?'text-danger':''?>">DAY</label>
                <input type="number" id="day" name="day" min="1" max="31"
                       value="<?=$dayDate ?? ''?>"
                       placeholder="DD" class="<?=isset($_SESSION['dayError'])?"input__error":"" ?>"/>
                <?php if(isset($_SESSION['dayError'])):?>
                    <div class="text-danger text-error" style="margin-top:10px"><?=$_SESSION['dayError']?></div>
                <?php endif; ?>
            </div>

            <div>
                <label for="month" class="<?= isset($_SESSION['dayError'])?'text-danger':''?>">MONTH</label>
                <input type="number" id="month" name="month" min="1" max="12" placeholder="MM"
                       value="<?=$monthDate ?? ''?>"
                       class="<?=isset($_SESSION['monthError'])?"input__error":"" ?>"/>
                <?php if(isset($_SESSION['monthError'])):?>
                    <div class="text-danger text-error" style="margin-top:10px"><?=$_SESSION['monthError']?></div>
                <?php endif; ?>
            </div>

            <div>
                <label for="year" class="<?= isset($_SESSION['dayError'])?'text-danger':''?>">YEAR</label>
                <input type="number" id="year" name="year" min="1955" max="2024" placeholder="YYYY"
                       value="<?=$yearDate ?? ''?>"
                       class="<?=isset($_SESSION['yearError'])?"input__error":"" ?>"/>
                <?php if(isset($_SESSION['yearError'])):?>
                    <div class="text-danger text-error" style="margin-top:10px"><?=$_SESSION['yearError']?></div>
                <?php endif; ?>
            </div>

            <!--            TODO: Make a a good button-->
            <div class="form__button_wrapper">
                <div class=""></div>
                <button type="submit"><img src="/images/icon-arrow.svg" alt=""/></button>
            </div>
        </form>
        <section class="display__result">
            <div class="text-secondary"><span class="text-primary"><?=$age['year']??"--"?></span> Years</div>
            <div class="text-secondary"><span class="text-primary"><?=$age['month']??"--"?></span> months</div>
            <div class="text-secondary"><span class="text-primary"><?=$age['day']??"--"?></span> days</div>
        </section>
    </main>
</div>

<?php
views("partials/foot.view.php");
?>