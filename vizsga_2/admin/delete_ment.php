<?php
require_once('./func.php');
if(isset($_GET['id']) && !isset($_GET['action'])){
?>    
<form>
    Valóban törölni szeretné az id(<?php print((int)$_GET['id']); ?>) sort?
    <a href="delete.php?action=YES&id=<?php print((int)$_GET['id']); ?>">Igen</a>
    <a href="delete.php?action=NO">Nem</a>
</form>  
<?php    
}else if(isset($_GET['action'])){
    if($_GET['action'] === 'NO'){
        header('Location: erdeklodok.php');
    }
    if($_GET['action'] === 'YES' && isset($_GET['id'])){
        delete((int)$_GET['id'], 'erdeklodo');
        header('Location: erdeklodok.php');
    }
}
?>