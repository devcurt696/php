<?php
define("PATH_TO_FILES", "../textfiles");
if(isset($_POST['saveFile'])) {
    saveFile();
} elseif(isset($_GET['filename'])) {
    displayEditForm();
} elseif(isset($_POST["createFile"])) {
    createFile();
} else {
    displayFileList();
}
function displayFileList($message="") {
    displayPageHeader();
    if(!file_exists(PATH_TO_FILES)) die("Directory not found");
    if(!($dir = dir(PATH_TO_FILES))) die ("Cannot open directory");
?>
    <?php if ($message) echo '<p class="error">'.$message.'</p>' ?>
    <h2>Choose a file to edit:</h2>
    <table cellspacing="0" style="width: 40em; border: 1px solid #666;">
        <tr>
            <th>Filename</th>
            <th>Size(bytes)</th>
            <th>Last Modified</th>
        </tr>
<?php 
while($filename = $dir->read()) {
    $filePath = PATH_TO_FILES . "/$filename";
    if ($filename != "." && $filename != ".." && !is_dir($filePath) && strrchr($filename, ".") == ".txt") {
        echo '<tr><td><a href="texteditor.php?filename=' . urlencode($filename) . '">'. $filename . '</a></td>';
        echo '<td>'. filesize($filePath).'</td>';
        echo '<td>' . date("M j, Y H:i:s", filemtime($filePath)).'</td></tr>';
    }

}
$dir->close();
?>
    </table>
    <h2>...or create a new file:</h2>
    <form action="texteditor.php" method="post">
        <div style="width: 20em">
            <label for="filename">Filename</label>
            <div style="float: right; width: 7%; margin-top: 0.7em;"> .txt</div>
            <input type="text" name="filename" id="filename" style="width: 50;" value=""/>
            <div style="clear: both;">
                <input type="submit" name="createFile" value="Create File"/>
            </div>
        </div>
    </form>
  </body>
</html>
<?php 
}
function displayEditForm($filename="") {
    if (!$filename) $filename = basename($_GET["filename"]);
    if (!$filename) die("Invalid filename");
    $filePath = PATH_TO_FILES . "/$filename";
    if (!file_exists($filePath)) die("File not found");
    displayPageHeader();
?>
    <h2>Editing <?php echo $filename ?></h2>
    <form action="texteditor.php" method="post">
        <div style="width: 40em">
        <input type="hidden" name="filename" value="<?php echo $filename ?>">
        <textarea name="fileContents" id="fileContents" rows="20" cols="80" style="width: 100%;"><?php echo htmlspecialchars(file_get_contents($filePath)) ?></textarea>
        <div style="clear:both;">
            <input type="submit" name="saveFile" value="Save File"/>
            <input type="submit" name="cancel" value="Cancel" style="margin-right: 20px;" />
        </div>
        </div>
    </form>
</body>
</html>
<?php
}
function saveFile() {
    $filename = basename($_POST["filename"]);
    $filePath = PATH_TO_FILES . "/$filename";
    if(file_exists($filePath)) {
        if(file_put_contents($filePath, $_POST["fileContents"]) === false) die("Couldn't save file");
        displayFileList();
    } else {
        die("File not found");
    }
}
function createFile() {
    $filename = basename($_POST["filename"]);
    $filename = preg_replace("/[^A-Za-z0-9_\- ]/", "", $filename);
    if (!$filename) {
        displayFileList("Invalid filename - try again!");
        return;
    }
    $filename .= ".txt";
    $filePath = PATH_TO_FILES . "/$filename";
    if (file_exists($filePath)) {
        displayFileList("The file $filename already exists!");
    } else {
        if(file_put_contents($filePath, "") === false) die("Couldn't create file");
        chmod($filePath, 0666);
        displayEditForm("$filename");
    }
}
function displayPageHeader() {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Text Editor</title>
    <link rel="stylesheet" href="common.css"/>
    <style>
        .error {
            background: #d33; 
            color: white;
            padding: 0.2em;
        }
        th {
            text-align: left;
            background-color: #999;
        }
        th. td {
            padding: 0.4em;
        }
    </style>
</head>
<body>
    
<?php
}
?>