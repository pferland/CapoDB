CREATE TABLE CapoDB.RecipesIndex
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  category VARCHAR(255) NOT NULL,
  created_on VARCHAR(24) NOT NULL,
  created_by VARCHAR(255) DEFAULT 'AnonCoward',
  hash VARCHAR(64) NOT NULL
);

CREATE UNIQUE INDEX RecipesIndex_id_uindex ON CapoDB.RecipesIndex (id);
CREATE UNIQUE INDEX RecipesIndex_hash_uindex ON CapoDB.RecipesIndex (hash);


CREATE TABLE CapoDB.RecipesData
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  description TINYTEXT NOT NULL,
  ingredients TINYTEXT NOT NULL,
  steps LONGTEXT NOT NULL,
  hash VARCHAR(255) NOT NULL
);
CREATE UNIQUE INDEX RecipesData_id_uindex ON CapoDB.RecipesData (id);
CREATE UNIQUE INDEX RecipesData_hash_uindex ON CapoDB.RecipesData (hash);


CREATE TABLE CapoDB.RecipesPictures
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  hash VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  filename VARCHAR(255) NOT NULL
);
CREATE UNIQUE INDEX RecipesPictures_id_uindex ON CapoDB.RecipesPictures (id);
CREATE UNIQUE INDEX RecipesPictures_hash_uindex ON CapoDB.RecipesPictures (hash);
CREATE UNIQUE INDEX RecipesPictures_filename_uindex ON CapoDB.RecipesPictures (filename);


CREATE TABLE CapoDB.RecipesCategories
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255)
);
CREATE UNIQUE INDEX RecipesCategories_id_uindex ON CapoDB.RecipesCategories (id);
CREATE UNIQUE INDEX RecipesCategories_name_uindex ON CapoDB.RecipesCategories (name);