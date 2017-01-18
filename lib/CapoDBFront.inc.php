<?php
/*
CapoDBFront.inc.php
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
class CapoDBFront
{
    function __construct($WWWconfig = array())
    {
        if( @$WWWconfig === array() )
        {
            throw new Exception('$WWWconfig is not set!');
        }
        require "lib/SQL.php"; # The uh.. SQL class...
        require $WWWconfig['http']['smarty_path']."Smarty.class.php"; #get smarty..
        #now lets build the SQL class.
        $this->debug = $WWWconfig['debug'];
        $this->SQL = new SQL($WWWconfig['SQL']);
        $this->smarty = new smarty();
        $this->AllRecipes = array();
        $this->Recipe = array();
        $this->RecipePictures = array();
        $this->default_index_page_size = $WWWconfig['http']['default_index_page_size'];
    }

    function GetRecipes($limit = NULL)
    {
        if($limit === NULL)
        {
            $limit = $this->default_index_page_size;
        }
        $fetch = $this->SQL->conn->query("SELECT RecipesIndex.title, RecipesCategories.name as category, RecipesIndex.created_by, RecipesIndex.created_on, RecipesIndex.hash FROM RecipesCategories, RecipesIndex WHERE RecipesCategories.id = RecipesIndex.category ORDER BY RecipesIndex.id ASC LIMIT $limit");
        $this->SQL->checkError();
        $this->AllRecipes = $fetch->fetchAll(2);
    }

    function GetRecipe($hash = NULL)
    {
        $prep = $this->SQL->conn->prepare("SELECT `RecipesIndex`.`id`, `RecipesIndex`.`hash`, RecipesCategories.name as catagory_name, RecipesIndex.created_by, RecipesIndex.created_on, RecipesData.description, RecipesData.ingredients, RecipesData.steps FROM RecipesCategories, RecipesData, RecipesIndex WHERE RecipesData.hash = ? AND RecipesIndex.category = RecipesCategories.id;");
        $prep->bindParam(1, $hash, PDO::PARAM_STR);
        $prep->execute();
        $this->SQL->checkError();
        $fetch = $prep->fetch(2);
        return $fetch;
    }

    function GetRecipePictures($hash = NULL)
    {
        $prep = $this->SQL->conn->prepare("SELECT filename, description FROM RecipesPictures WHERE RecipesPictures.hash = ?;");
        $prep->bindParam(1, $hash, PDO::PARAM_STR);
        $prep->execute();
        $this->SQL->checkError();
        $this->RecipePictures = $prep->fetchAll(2);
    }
}