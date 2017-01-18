<?php
/*
index.php
Copyright (C) 2013 Phil Ferland

This program is free software; you can redistribute it and/or modify it under the terms
of the GNU General Public License as published by the Free Software Foundation; either
version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.

ou should have received a copy of the GNU General Public License along with this program;
if not, write to the

   Free Software Foundation, Inc.,
   59 Temple Place, Suite 330,
   Boston, MA 02111-1307 USA
*/

require "lib/config.php"; #www config
require "lib/CapoDBFront.inc.php"; #CapoDB Front end class

$CapoDB = new CapoDBFront($WWWconfig);

$CapoDB->GetRecipe($_GET['hash']);
$CapoDB->GetRecipePictures($_GET['hash']);

if($CapoDB->debug)
{
    var_dump($CapoDB->Recipe);
    var_dump($CapoDB->RecipePictures);
}else
{
    $CapoDB->smarty->assign("Recipe", $CapoDB->Recipe);
    $CapoDB->smarty->assign("RecipePictures", $CapoDB->RecipePictures);
    $CapoDB->smarty->display("recipe.tpl");
}