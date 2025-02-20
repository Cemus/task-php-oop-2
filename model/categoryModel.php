<?php

class CategoryModel extends AbstractModel{
        //ATTRIBUT
        private ?int $id;

        private ?string $name;

        public function add():void{
            $requete = "INSERT INTO category(name) VALUE(?)";
            try {
                //Préparation de la requête
                $bdd = $this->getBdd()->connexion();
                $req = $bdd->prepare($requete);
                //Associer les paramètres (?)
                $req->bindParam(1, $this->name, PDO::PARAM_STR);
                //Exécuter la requête
                $req->execute();
            } catch (Exception $e) {
                echo "Erreur" . $e->getMessage();
            }
        }
        
        public function getById(): array|null{
            // Pas besoin
            return null;}

        public function delete():void{
                        //Requête
            $requete = "DELETE FROM category WHERE name = ?";
            try {
                //Préparation de la requête
                $bdd = $this->getBdd()->connexion();
                $req = $bdd->prepare($requete);
                //Associer les paramètres (?)
                $req->bindParam(1, $this->name, PDO::PARAM_STR);
                //Exécuter la requête
                $req->execute();
            } catch (Exception $e) {
                echo "Erreur" . $e->getMessage();
            }
        }

        public function getAll():array|null{
            $requete = "SELECT id_category, name FROM category";
            try {
                //Préparation de la requête
                $bdd = $this->getBdd()->connexion();
                $req = $bdd->prepare($requete);
                //Exécuter la requête
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (Exception $e) {
                echo "Erreur" . $e->getMessage();
            }
        }

        public function getByName():bool|null{
                        //Requête
            $requete = "SELECT id_category, `name` FROM category WHERE `name`=?";
            try {
                //Préparation de la requête
                $bdd = $this->getBdd()->connexion();
                $req = $bdd->prepare($requete);
                //Associer les paramètres (?)
                $req->bindParam(1, $this->name, PDO::PARAM_STR);
                //Exécuter la requête
                $req->execute();
                $data = $req->fetch(PDO::FETCH_ASSOC);
                return $data ? true : false;
            } catch (Exception $e) {
                return "Erreur" . $e->getMessage();
            }
        }

        public function update():void{
            $requete = "UPDATE category SET name=? WHERE name=?";
            try {
                //Préparation de la requête
                $bdd = $this->getBdd()->connexion();
                $req = $bdd->prepare($requete);
                //Associer les paramètres (?)
                $req->bindParam(1, $this->name, PDO::PARAM_STR);
                $req->bindParam(2, $this->name, PDO::PARAM_STR);
                //Exécuter la requête
                $req->execute();
            } catch (Exception $e) {
                echo "Erreur" . $e->getMessage();
            }
        }

        public function getId(): ?int { return $this->id; }
        public function setId(?int $id): self { $this->id = $id; return $this; }

        public function getName(): ?string { return $this->name; }
        public function setName(?string $name): self { $this->name = $name; return $this; }
}