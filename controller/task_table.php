<div class="column flex" value=todo>
	<h1>Todo</h1>
    <?php
        foreach ($boards[$board]->todo as $task => $_) {
            echo '<div class="portlet card" style="background-color:powderblue;">';
            echo "<div class=\"portlet-header\"><h4 class=\"text-center\">{$task}</h4><button type=\"button\" class=\"stretched-link btn task-modal\" data-bs-toggle=\"modal\" data-bs-target=\"#taskModal\" value=\"{$task}\"></button></div>"; 
            echo '</div>';
        }
    ?>
</div>
 
<div class="column flex" value=progress>
	<h1>In progress</h1>
    <?php 
        foreach ($boards[$board]->progress as $task => $_) {
            echo '<div class="portlet card" style="background-color:powderblue;">';
            echo "<div class=\"portlet-header\"><h4 class=\"text-center\">{$task}</h4><button type=\"button\" class=\"stretched-link btn task-modal\" data-bs-toggle=\"modal\" data-bs-target=\"#taskModal\" value=\"{$task}\"></button></div>"; 
            echo '</div>';
        }
    ?>
</div>

<div class="column flex" value=test>
	<h1>Test</h1>
    <?php 
        foreach ($boards[$board]->test as $task => $_) {
            echo '<div class="portlet card" style="background-color:powderblue;">';
            echo "<div class=\"portlet-header\"><h4 class=\"text-center\">{$task}</h4><button type=\"button\" class=\"stretched-link btn task-modal\" data-bs-toggle=\"modal\" data-bs-target=\"#taskModal\" value=\"{$task}\"></button></div>"; 
            echo '</div>';
        }
    ?>
</div>

<div class="column flex" value=done>
	<h1>Done</h1>
    <?php 
        foreach ($boards[$board]->done as $task => $_) {
            echo '<div class="portlet card" style="background-color:powderblue;">';
            echo "<div class=\"portlet-header\"><h4 class=\"text-center\">{$task}</h4><button type=\"button\" class=\"stretched-link btn task-modal\" data-bs-toggle=\"modal\" data-bs-target=\"#taskModal\" value=\"{$task}\"></button></div>"; 
            echo '</div>';
        }
    ?>
</div>
