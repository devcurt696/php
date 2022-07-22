<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci</title>
    <link rel="stylesheet" href="common.css"/>
    <style>
        .error {
            background: #d33;
            color: white;
            padding: 0.3em;
            margin: 0.3em 0 0 0.3em;
            font-size: 0.9em;
        }
        fieldset {
            border: none;

        }
        ol {
            list-style-type: none;
        }
        input, select, textarea {
            float: none;
            margin: 1em 0 0 0; 
            width: auto;
        }
        div.element label {
            display: inline;
            float: none;
        }
        select {
            margin-right: 0.5em;
        }
        span.required {
            display: none;
        }
    </style>
    </head>
    <body>
        <h1>How old are you (in days)?</h1>
    <?php
    require_once("C:\wamp64\bin\php\php8.1.0\pear\HTML\QuickForm.php");
    require_once("C:\wamp64\bin\php\php8.1.0\pear\HTML\QuickForm\Renderer\Tableless.php");
    $form = new HTML_QuickForm("form", "get", "dayold.php", "", array("style"=>"width:30em;"), true);
    $form->removeAttribute("name");
    $form->setRequiredNote("");
    $options = array("format" => "MdY", "minYear" => 1902, "maxYear" => date("Y"));
    $form->addElement("date", "dateOfBirth", "Your date of birth", $options);
    $form->addElement("submit", "calculateButton", "Calculate");
    $form->addGroupRule("dateOfBirth", "Please enter your date of birth", "required");
    $form->addRule("dateOfBirth", "Please enter a valid date", "callback", "checkDateOfBirth");
    if ($form->isSubmitted and $form->validate()) {
        $form->process("calculateDays");
    }
    $renderer = new HTML_QuickForm_Renderer_Tableless();
    $form->accept($renderer);
    echo $renderer->toHtml();
    function checkDateOfBirth($value) {
        return checkdate($value["M"], $value["d"], $value["Y"]);
    }
    function calculateDays($values) {
        $currentDate = mktime();
        $dateOfBirth = mktime(0,0,0,$values["dateOfBirth"]["M"], $values["dateOfBirth"]["d"], $values["dateOfBirth"]["Y"]);
        $secondsOld = $currentDate - $dateOfBirth;
        $daysOld = (int)($secondsOld/60/60/24);
        echo "<p>You were born on " . date("l, F, jS, Y", $dateOfBirth).".</p>";
        echo "<p>You are ". number_format($daysOld). "day". ($daysOld != 1 ? "s" : "") ." old!</p>";
    }
    ?>

    }
    ?>
    </body>
</html>